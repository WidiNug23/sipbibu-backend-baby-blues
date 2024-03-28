kuisioner.php
<!-- kuisioner.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuisioner</title>
    <style>
        /* CSS untuk mengubah warna tombol saat dipilih */
        .option-btn.selected {
            background-color: green; /* Warna yang dipilih (misalnya, hijau) */
            color: white; /* Warna teks yang sesuai */
        }
    </style>
</head>

<body>
    <h1>Kuisioner</h1>
    <form action="<?= base_url('kuisioner/simpanHasil') ?>" method="post">
         <!-- Pertanyaan 1 -->
         <p>I have been able to laugh and see the funny side of things:</p>
        <button type="button" class="option-btn" data-value="0" data-group="0">As much as I always could</button>
        <button type="button" class="option-btn" data-value="1" data-group="0">Not quite so much now</button>
        <button type="button" class="option-btn" data-value="2" data-group="0">Definitely not so much now</button>
        <button type="button" class="option-btn" data-value="3" data-group="0">Not at all</button>
        <input type="hidden" name="jawaban[]" id="jawaban0" value="0">
        <br><br>

        <!-- Pertanyaan 2 -->
        <p>I have looked forward with enjoyment to things:</p>
        <button type="button" class="option-btn" data-value="0" data-group="1">As much as I ever did</button>
        <button type="button" class="option-btn" data-value="1" data-group="1">Rather less than I used to</button>
        <button type="button" class="option-btn" data-value="2" data-group="1">Definitely less than I used to</button>
        <button type="button" class="option-btn" data-value="3" data-group="1">Hardly at all</button>
        <input type="hidden" name="jawaban[]" id="jawaban1" value="0">
        <br><br>

        <!-- Pertanyaan 3 -->
        <p>I have blamed myself unnecessarily when things went wrong:</p>
        <button type="button" class="option-btn" data-value="3" data-group="2">Yes, most of the time</button>
        <button type="button" class="option-btn" data-value="2" data-group="2">Yes, some of the time</button>
        <button type="button" class="option-btn" data-value="1" data-group="2">Not very often</button>
        <button type="button" class="option-btn" data-value="0" data-group="2">No, never</button>
        <input type="hidden" name="jawaban[]" id="jawaban2" value="0">
        <br><br>

        <!-- Pertanyaan 4 -->
        <p>I have been anxious or worried for no good reason:</p>
        <button type="button" class="option-btn" data-value="0" data-group="3">No, not at all</button>
        <button type="button" class="option-btn" data-value="1" data-group="3">Hardly ever</button>
        <button type="button" class="option-btn" data-value="2" data-group="3">Yes, sometimes</button>
        <button type="button" class="option-btn" data-value="3" data-group="3">Yes, very often</button>
        <input type="hidden" name="jawaban[]" id="jawaban3" value="0">
        <br><br>

        <!-- Pertanyaan 5 -->
        <p>I have felt scared or panicky for no good reason:</p>
        <button type="button" class="option-btn" data-value="3" data-group="4">Yes, quite a lot</button>
        <button type="button" class="option-btn" data-value="2" data-group="4">Yes, sometimes</button>
        <button type="button" class="option-btn" data-value="1" data-group="4">No, not much</button>
        <button type="button" class="option-btn" data-value="0" data-group="4">No, not at all</button>
        <input type="hidden" name="jawaban[]" id="jawaban4" value="0">
        <br<br>

         <!-- Pertanyaan 6 -->
         <p>Things have been getting to me:</p>
        <button type="button" class="option-btn" data-value="3" data-group="5">Yes, most of the time I haven’t been able to cope at all</button>
        <button type="button" class="option-btn" data-value="2" data-group="5">Yes, sometimes I haven’t been coping as well as usual</button>
        <button type="button" class="option-btn" data-value="1" data-group="5">No, most of the time I have coped quite well</button>
        <button type="button" class="option-btn" data-value="0" data-group="5">No, I have been coping as well as ever</button>
        <input type="hidden" name="jawaban[]" id="jawaban5" value="0">
        <br><br>

        <!-- Pertanyaan 7 -->
        <p>I have been so unhappy that I have had difficulty sleeping:</p>
        <button type="button" class="option-btn" data-value="3" data-group="6">Yes, most of the time</button>
        <button type="button" class="option-btn" data-value="2" data-group="6">Yes, sometimes</button>
        <button type="button" class="option-btn" data-value="1" data-group="6">No, not very often</button>
        <button type="button" class="option-btn" data-value="0" data-group="6">No, not at all</button>
        <input type="hidden" name="jawaban[]" id="jawaban6" value="0">
        <br><br>

        <!-- Pertanyaan 8 -->
        <p>I have felt sad or miserable:</p>
        <button type="button" class="option-btn" data-value="3" data-group="7">Yes, most of the time</button>
        <button type="button" class="option-btn" data-value="2" data-group="7">Yes, quite often</button>
        <button type="button" class="option-btn" data-value="1" data-group="7">Not very often</button>
        <button type="button" class="option-btn" data-value="0" data-group="7">No, not at all</button>
        <input type="hidden" name="jawaban[]" id="jawaban7" value="0">
        <br><br>

        <!-- Pertanyaan 9 -->
        <p>I have been so unhappy that I have been crying:</p>
        <button type="button" class="option-btn" data-value="3" data-group="8">Yes, most of the time</button>
        <button type="button" class="option-btn" data-value="2" data-group="8">Yes, quite often</button>
        <button type="button" class="option-btn" data-value="1" data-group="8">Only occasionally</button>
        <button type="button" class="option-btn" data-value="0" data-group="8">No, never</button>
        <input type="hidden" name="jawaban[]" id="jawaban8" value="0">
        <br><br>

        <!-- Pertanyaan 10 -->
        <p>The thought of harming myself has occurred to me:</p>
        <button type="button" class="option-btn" data-value="3" data-group="9">Yes, quite often</button>
        <button type="button" class="option-btn" data-value="2" data-group="9">Sometimes</button>
        <button type="button" class="option-btn" data-value="1" data-group="9">Hardly ever</button>
        <button type="button" class="option-btn" data-value="0" data-group="9">Never</button>
        <input type="hidden" name="jawaban[]" id="jawaban9" value="0">
        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <script>
        // JavaScript untuk menangani klik tombol dan mengubah warnanya
        const optionBtns = document.querySelectorAll('.option-btn');

        optionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const value = parseInt(this.getAttribute('data-value'));
                const group = this.getAttribute('data-group');

                // Hapus kelas 'selected' dari semua tombol dalam grup yang sama
                optionBtns.forEach(btn => {
                    if (btn.getAttribute('data-group') === group) {
                        btn.classList.remove('selected');
                    }
                });

                // Tambahkan kelas 'selected' ke tombol yang dipilih
                this.classList.add('selected');

                // Perbarui nilai pada input tersembunyi
                document.getElementById(`jawaban${group}`).value = value;

                // Perbarui total skor
                updateTotalScore();
            });
        });

        // Fungsi untuk menghitung dan memperbarui total skor
        function updateTotalScore() {
            let totalScore = 0;

            // Loop melalui semua input tersembunyi
            document.querySelectorAll('input[type="hidden"]').forEach(input => {
                const value = parseInt(input.value);
                totalScore += value;
            });

            // Tampilkan total skor pada konsol (opsional)
            console.log('Total Skor:', totalScore);
        }
    </script>
</body>

</html>
