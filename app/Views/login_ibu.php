<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Ibu</title>
</head>

<body>
    <h1>Login Ibu</h1>
    <?php if (session()->has('error')) : ?>
        <div><?= session('error') ?></div>
    <?php endif; ?>
    <form action="/login" method="post">
        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
    <a href="/signup">Signup</a>
</body>

</html>
