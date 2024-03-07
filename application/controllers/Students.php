<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Student');
    }

    public function index()
    {
        $data['students'] = $this->M_Student->getAll();
        $this->load->view('students/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah'
        ];
        $this->load->view('students/create', $data);
    }

    public function store()
    {
        $full_name = $this->input->post('full_name');
        $nim = $this->input->post('nim');
        $gender = $this->input->post('gender');
        $place_of_birth = $this->input->post('place_of_birth');
        $date_of_birth = $this->input->post('date_of_birth');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $address = $this->input->post('address');

        if (!empty($_FILES['profile_picture']['name'])) {
            $config['upload_path'] = FCPATH . 'assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 10000;
            $config['file_name'] = $_FILES['profile_picture']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile_picture')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('students/create', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $profile_picture = $data['upload_data']['file_name'];
            }
        }

        $data = [
            'full_name' => $full_name,
            'nim' => $nim,
            'gender' => $gender,
            'place_of_birth' => $place_of_birth,
            'date_of_birth' => $date_of_birth,
            'email' => $email,
            'phone_number' => $phone_number,
            'address' => $address,
            'profile_picture' => $profile_picture ?? null
        ];
        $this->M_Student->insert($data);
        redirect('students');
    }

    public function edit($id)
    {
        $data['student'] = $this->M_Student->getById($id);
        $this->load->view('students/edit', $data);
    }

    public function update($id)
    {
        $full_name = $this->input->post('full_name');
        $nim = $this->input->post('nim');
        $gender = $this->input->post('gender');
        $place_of_birth = $this->input->post('place_of_birth');
        $date_of_birth = $this->input->post('date_of_birth');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $address = $this->input->post('address');

        if (!empty($_FILES['profile_picture']['name'])) {
            $config['upload_path'] = FCPATH . 'assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 10000;
            $config['file_name'] = $_FILES['profile_picture']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile_picture')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('students/edit', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $profile_picture = $data['upload_data']['file_name'];
            }

            //delete old image
            $student = $this->M_Student->getById($id);
            if ($student['profile_picture'] != null) {
                if (file_exists(FCPATH . 'assets/uploads/' . $student['profile_picture'])) {
                    unlink(FCPATH . 'assets/uploads/' . $student['profile_picture']);
                }
            }
        }

        $data = [
            'full_name' => $full_name,
            'nim' => $nim,
            'gender' => $gender,
            'place_of_birth' => $place_of_birth,
            'date_of_birth' => $date_of_birth,
            'email' => $email,
            'phone_number' => $phone_number,
            'address' => $address,
            'profile_picture' => $profile_picture ?? null
        ];
        $this->M_Student->update($id, $data);
        redirect('students');
    }

    public function delete($id)
    {
        $student = $this->M_Student->getById($id);
        if ($student['profile_picture'] != null) {
            if (file_exists(FCPATH . 'assets/uploads/' . $student['profile_picture'])) {
                unlink(FCPATH . 'assets/uploads/' . $student['profile_picture']);
            }
        }
        $this->M_Student->delete($id);
        redirect('students');
    }
}
