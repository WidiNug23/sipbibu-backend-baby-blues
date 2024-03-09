<!-- grafik_mood.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Mood</title>
    <!-- Tambahkan pustaka Chart.js untuk membuat grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Grafik Mood</h1>

    <?php if (!empty($emosi)): ?>
        <p>Tanggal: <?= esc(old('tanggal')); ?></p>
        <p>Emosi: <?= esc(implode(', ', old('emosi'))); ?></p>

        <?php
        $jumlahPositif = 0;
        $jumlahNegatif = 0;
        $jumlahNetral = 0;

        foreach ($emosi as $dataEmosi) {
            if ($dataEmosi['jenis_emosi'] == 'Positif') {
                $jumlahPositif++;
            } elseif ($dataEmosi['jenis_emosi'] == 'Negatif') {
                $jumlahNegatif++;
            } elseif ($dataEmosi['jenis_emosi'] == 'Netral') {
                $jumlahNetral++;
            }
        }

        $persentasePositif = ($jumlahPositif / count($emosi)) * 100;

        if ($persentasePositif > 60) {
            $labelGrafik = "Sangat Bagus";
        } elseif ($persentasePositif > 30) {
            $labelGrafik = "Bagus";
        } else {
            $labelGrafik = "Netral";
        }
        ?>

        <canvas id="myChart" width="400" height="200"></canvas>

        <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Positif', 'Negatif', 'Netral'],
            datasets: [{
                data: [<?= $jumlahPositif; ?>, <?= $jumlahNegatif; ?>, <?= count($emosi) - ($jumlahPositif + $jumlahNegatif); ?>],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(255, 255, 0, 0.8)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: '<?= session('labelGrafik'); ?>'
            }
        }
    });
</script>

    <?php else: ?>
        <p>Data emosi tidak tersedia.</p>
    <?php endif; ?>
</body>
</html>
