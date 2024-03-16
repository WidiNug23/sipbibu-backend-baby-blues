<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Ibu</title>
</head>

<body>
    <h1>Signup Ibu</h1>
    <?php if (session()->has('errors')) : ?>
        <div>
            <?php foreach (session('errors') as $error) : ?>
                <?= esc($error) ?><br>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <div><?= session('error') ?></div>
    <?php endif; ?>
    <form action="/signup" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= old('nama') ?>"><br>
        <input type="text" name="no_telp" placeholder="Nomor Telepon" value="<?= old('no_telp') ?>"><br>
        <input type="text" name="alamat" placeholder="Alamat" value="<?= old('alamat') ?>"><br>
        <input type="text" name="usia" placeholder="Usia" value="<?= old('usia') ?>"><br>
        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Signup</button>
    </form>
    <a href="/login">Login</a>
</body>

</html>
