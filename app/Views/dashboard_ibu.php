<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ibu</title>
</head>

<body>
    <h1>Dashboard Ibu</h1>
    <!-- Isi dari halaman dashboard -->
    <p>Selamat datang, <?= session()->get('user')['nama'] ?>!</p>
    <!-- Tampilkan pesan sukses jika ada -->
    <?php if (session()->has('success')) : ?>
        <div><?= session('success') ?></div>
    <?php endif; ?>
    <!-- Tambahkan tautan Edit -->
    <a href="/edit">Edit</a>
    <a href="/logout">Logout</a>
</body>

</html>
