<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Ibu</title>
</head>

<body>
    <h1>Edit Data Ibu</h1>
    <!-- Form untuk mengedit data ibu -->
    <form action="/update" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= $user['nama'] ?>"><br>
        <input type="text" name="no_telp" placeholder="Nomor Telepon" value="<?= $user['no_telp'] ?>"><br>
        <input type="text" name="alamat" placeholder="Alamat" value="<?= $user['alamat'] ?>"><br>
        <input type="text" name="usia" placeholder="Usia" value="<?= $user['usia'] ?>"><br>
        <input type="email" name="email" placeholder="Email" value="<?= $user['email'] ?>" disabled><br>
        <!-- Gunakan tombol submit untuk mengirim data edit -->
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
