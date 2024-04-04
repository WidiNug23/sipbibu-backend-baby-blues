<!-- Implementasikan logika untuk menampilkan grafik mood -->
<h2>Data Grafik Mood</h2>
<ul>
    <?php
    // Mengurutkan hasilMood secara descending berdasarkan ID
    usort($hasilMood, function ($a, $b) {
        return $b['id'] <=> $a['id'];
    });

    // Mengambil hanya hasil mood yang pertama
    $latestResult = reset($hasilMood);
    ?>
    <li><?= $latestResult['hasil']; ?></li>
</ul>

