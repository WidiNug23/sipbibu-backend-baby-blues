<?php
// kuisioner.php

// Menghubungkan ke database
$db = \Config\Database::connect();
// Mendapatkan data pertanyaan dari tabel kuis
$query = $db->query("SELECT * FROM kuis");
$results = $query->getResultArray();

// Mengumpulkan data pertanyaan dan jawaban ke dalam array
$data = [];
foreach ($results as $index => $result) {
    $data[] = [
        'pertanyaan' => $result['pernyataan'],
        'jawaban1' => $result['jawaban1'],
        'jawaban2' => $result['jawaban2'],
        'jawaban3' => $result['jawaban3'],
        'jawaban4' => $result['jawaban4']
    ];
}

// Mengkonversi array menjadi format JSON
$jsonData = json_encode($data);
?>

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
    <div id="kuisioner-data" style="display: none;">
        <?= $jsonData ?>
    </div>

    <script>
        // Mendapatkan data pertanyaan dan jawaban dari HTML
        const jsonData = document.getElementById('kuisioner-data').textContent;
        const data = JSON.parse(jsonData);

        // Fungsi untuk membangun form kuisioner dari data JSON
        function buildForm(data) {
            const form = document.createElement('form');
            form.setAttribute('action', '<?= base_url('kuisioner/simpanHasil') ?>');
            form.setAttribute('method', 'post');

            data.forEach((question, index) => {
                const questionElement = document.createElement('p');
                questionElement.textContent = question.pertanyaan;

                for (let i = 1; i <= 4; i++) {
                    const label = document.createElement('label');
                    const input = document.createElement('input');
                    input.setAttribute('type', 'radio');
                    input.setAttribute('name', `jawaban[${index}]`);
                    input.setAttribute('class', 'option-btn');
                    input.setAttribute('value', i - 1);
                    input.setAttribute('data-group', index);

                    label.appendChild(input);
                    label.appendChild(document.createTextNode(` ${question['jawaban' + i]}`));
                    label.appendChild(document.createElement('br'));

                    questionElement.appendChild(label);
                }

                form.appendChild(questionElement);
            });

            const submitButton = document.createElement('button');
            submitButton.setAttribute('type', 'submit');
            submitButton.textContent = 'Simpan';
            form.appendChild(submitButton);

            return form;
        }

        // Menambahkan form kuisioner ke dalam dokumen
        document.body.appendChild(buildForm(data));

        // JavaScript untuk menangani klik tombol dan mengubah nilai
const optionBtns = document.querySelectorAll('.option-btn');

optionBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const value = parseInt(this.value);
        const group = this.getAttribute('data-group');
        const questionNumber = parseInt(group) + 1; // Nomor pernyataan

        // Hapus kelas 'selected' dari semua tombol dalam grup yang sama
        optionBtns.forEach(btn => {
            if (btn.getAttribute('data-group') === group) {
                btn.classList.remove('selected');
            }
        });

        // Tambahkan kelas 'selected' ke tombol yang dipilih
        this.classList.add('selected');

        // Set nilai jawaban sesuai dengan aturan yang diinginkan
        if (questionNumber === 1 || questionNumber === 2 || questionNumber === 4) {
            // Periksa nomor pernyataan, hanya ubah nilai jika pernyataan nomor 1, 2, atau 4
            if (this.value === '0') {  // jika jawaban1 dipilih
                this.value = '0'; // ubah nilai menjadi 0
            } else if (this.value === '1') { // jika jawaban2 dipilih
                this.value = '1'; // ubah nilai menjadi 1
            } else if (this.value === '2') { // jika jawaban3 dipilih
                this.value = '2'; // ubah nilai menjadi 2
            } else if (this.value === '3') { // jika jawaban4 dipilih
                this.value = '3'; // ubah nilai menjadi 3
            }
        } else {
            // Jika nomor pernyataan bukan 1, 2, atau 4, atur nilai sesuai dengan kebutuhan
            if (this.value === '0') {  // jika jawaban1 dipilih
                this.value = '3'; // ubah nilai menjadi 3
            } else if (this.value === '1') { // jika jawaban2 dipilih
                this.value = '2'; // ubah nilai menjadi 2
            } else if (this.value === '2') { // jika jawaban3 dipilih
                this.value = '1'; // ubah nilai menjadi 1
            } else if (this.value === '3') { // jika jawaban4 dipilih
                this.value = '0'; // ubah nilai menjadi 0
            }
        }

        // Perbarui total skor
        updateTotalScore();
    });
});

        // Fungsi untuk menghitung dan memperbarui total skor
        function updateTotalScore() {
            let totalScore = 0;

            // Loop melalui semua tombol yang dipilih
            document.querySelectorAll('.option-btn.selected').forEach(btn => {
                const value = parseInt(btn.value);
                totalScore += value;
            });

            // Tampilkan total skor pada konsol (opsional)
            console.log('Total Skor:', totalScore);
        }
    </script>
</body>

</html>
