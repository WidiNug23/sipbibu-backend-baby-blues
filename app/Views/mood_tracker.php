<!-- mood_tracker.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
    <style>
        /* Menambahkan sedikit CSS untuk tata letak */
        body {
            display: flex;
            justify-content: space-around;
        }

        /* .column {
            width: 30%;
        } */

        /* Menambahkan gaya untuk teks yang diklik */
        .selected {
            color: red; /* Ganti warna sesuai keinginan Anda */
        }
    </style>
</head>
<body>
    <h1>Data Mood Tracker</h1>

    <?php if (!empty($moods)): ?>
        <div class="column">
            <h2>Positif</h2>
            <ul>
                <?php foreach ($moods as $mood): ?>
                    <?php if ($mood['jenis_emosi'] == 'Positif'): ?>
                        <li onclick="toggleColor(this)">
                            <?= esc($mood['nama_emosi']); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="column">
            <h2>Negatif</h2>
            <ul>
                <?php foreach ($moods as $mood): ?>
                    <?php if ($mood['jenis_emosi'] == 'Negatif'): ?>
                        <li onclick="toggleColor(this)">
                            <?= esc($mood['nama_emosi']); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="column">
            <h2>Penyebab</h2>
            <ul>
                <?php foreach ($moods as $mood): ?>
                    <?php if ($mood['jenis_emosi'] == 'Alasan'): ?>
                        <li onclick="toggleColor(this)">
                            <?= esc($mood['nama_emosi']); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        
       <!-- Menambahkan tombol "Lihat Grafik" -->
<form action="<?= site_url('/mood-tracker/lihat-grafik'); ?>" method="post">
    <!-- Pilih emosi di sini -->
    <!-- Pastikan ada input dengan nama 'selected_emotions' yang berisi id_emosi yang dipilih -->
    <button type="submit" name="lihat_grafik">Lihat Grafik</button>
</form>



    <?php else: ?>
        <p>Tidak ada data mood tracker.</p>
    <?php endif; ?>

    <script>
        function toggleColor(element) {
            element.classList.toggle('selected');
        }

        function lihatGrafik() {
            // Logika untuk menampilkan grafik atau mengarahkan ke halaman lain
            alert('Menampilkan Grafik!');
        }
    </script>
</body>
</html>
