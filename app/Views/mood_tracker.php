<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
    <style>
        .emotion-group {
            margin-bottom: 10px;
        }

        .emotion-group label {
            font-weight: bold;
        }

        .emotion-checkbox {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h1>Mood Tracker</h1>
    
    <form action="/simpan-hasil-mood" method="post">
        <div class="emotion-group">
            <label>Pilih Jenis Emosi Positif:</label>
            <?php foreach ($moods as $mood): ?>
                <?php if ($mood['jenis_emosi'] == 'positif'): ?>
                    <input class="emotion-checkbox" type="checkbox" name="id_emosi[]" value="<?= $mood['id_emosi']; ?>">
                    <?= $mood['nama_emosi']; ?><br>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="emotion-group">
            <label>Pilih Jenis Emosi Negatif:</label>
            <?php foreach ($moods as $mood): ?>
                <?php if ($mood['jenis_emosi'] == 'negatif'): ?>
                    <input class="emotion-checkbox" type="checkbox" name="id_emosi[]" value="<?= $mood['id_emosi']; ?>">
                    <?= $mood['nama_emosi']; ?><br>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="emotion-group">
            <label>Pilih Jenis Emosi Alasan:</label>
            <?php foreach ($moods as $mood): ?>
                <?php if ($mood['jenis_emosi'] == 'alasan'): ?>
                    <input class="emotion-checkbox" type="checkbox" name="id_emosi[]" value="<?= $mood['id_emosi']; ?>">
                    <?= $mood['nama_emosi']; ?><br>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <button type="submit">Simpan Hasil Mood</button>
    </form>
</body>
</html>
