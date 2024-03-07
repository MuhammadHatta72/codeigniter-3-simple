<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <div class="container my-5 d-flex justify-content-center">
        <div class="card" style="width: 80%;">
            <div class="card-header">
                <h2>Form Mahasiswa</h2>
            </div>
            <div class="card-body">
                <img src="<?= base_url('assets/uploads/' . $student['profile_picture']) ?>" class="img-thumbnail" alt="Profile Picture" style="width: 200px; margin-bottom:20px;">
                <form action="<?= base_url('students/update/' . $student['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Masukkan Nama Lengkap" value="<?= $student['full_name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= $student['nim'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" <?= $student['gender'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= $student['gender'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Masukkan Tempat Lahir" value="<?= $student['place_of_birth'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= $student['date_of_birth'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Nama Lengkap" value="<?= $student['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan Nomor HP" value="<?= $student['phone_number'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required><?= $student['address'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('students') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>