<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuisioner</title>
</head>

<body>
    <h1>Hasil Kuisioner</h1>
    <?php if (!empty($hasil_kuis)) : ?>
        <?php $latest_result = end ($hasil_kuis); ?>
        <p>ID: <?= $latest_result['id'] ?></p>
        <p>Total Skor: <?= $latest_result['total_skor'] ?></p>
        <p>Hasil Kesimpulan: <?= $latest_result['hasil_kesimpulan'] ?></p>
    <?php else : ?>
        <p>Tidak ada data hasil kuisioner.</p>
    <?php endif; ?>
</body>

</html>
