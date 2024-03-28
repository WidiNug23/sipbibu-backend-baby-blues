<!-- <?php

// namespace App\Controllers;

// use App\Models\HasilKuisionerModel;
// use App\Models\KuisionerModel;
// use CodeIgniter\RESTful\ResourceController;

// class KuisionerControl extends ResourceController
// {
//     protected $modelName = 'App\Models\KuisionerModel';
//     protected $format = 'json'; // Format response yang diinginkan (JSON)

//     // Menampilkan halaman kuisioner jika permintaan adalah HTTP biasa
//     public function index()
//     {
//         // Periksa jika ini adalah permintaan HTTP biasa
//         if (!$this->request->isAJAX() && !$this->request->isCLI()) {
//             // Ambil data kuisioner dari model
//             $kuisionerModel = new KuisionerModel();
//             $data['kuisioner'] = $kuisionerModel->findAll();

//             // Tampilkan halaman kuisioner dengan data kuisioner
//             return view('kuisioner', $data);
//         }
//     }

//     // Menyimpan jawaban kuisioner dan menampilkan hasil ke halaman hasil-kuisioner
//     public function simpanHasil()
//     {
//         $jawaban = $this->request->getPost('jawaban');
//         $totalSkor = array_sum($jawaban);

//         // Perhitungan hasil
//         $hasil = ($totalSkor > 12) ? 'Mungkin mengalami baby blues' : 'Tidak mengalami baby blues';

//         // Simpan hasil kuisioner
//         $hasilKuisionerModel = new HasilKuisionerModel();
//         $data = [
//             'total_skor' => $totalSkor,
//             'hasil_kesimpulan' => $hasil
//         ];
//         $hasilKuisionerModel->insert($data);

//         // Redirect ke halaman hasil-kuisioner
//         return redirect()->to('/hasil-kuisioner');
//     }
// }
