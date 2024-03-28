<?php

namespace App\Controllers;

use App\Models\HasilKuisionerModel;
use App\Models\KuisionerModel;
use CodeIgniter\RESTful\ResourceController;

class KuisionerControl extends ResourceController
{
    protected $modelName = 'App\Models\KuisionerModel';
    protected $format    = 'json';

    public function index()
    {
        if (!$this->request->isAJAX() && !$this->request->isCLI()) {
            $kuisionerModel = new KuisionerModel();
            $data['kuisioner'] = $kuisionerModel->findAll();
            return view('kuisioner', $data);
        }
    }

    public function simpanHasil()
    {
        $jawaban = $this->request->getPost('jawaban');
        $totalSkor = array_sum($jawaban);

        $hasil = ($totalSkor > 12) ? 'Mungkin mengalami baby blues' : 'Tidak mengalami baby blues';

        $hasilKuisionerModel = new HasilKuisionerModel();
        $data = [
            'total_skor' => $totalSkor,
            'hasil_kesimpulan' => $hasil
        ];

        // Coba untuk menyimpan hasil kuisioner
        try {
            $hasilKuisionerModel->insert($data);
            return $this->respondCreated([
                'message' => 'Jawaban kuisioner berhasil disimpan',
                'hasil' => $hasil,
                'total_skor' => $totalSkor
            ]);
        } catch (\Exception $e) {
            return $this->failServerError('Gagal menyimpan hasil kuisioner: ' . $e->getMessage());
        }
    }

    public function read($id = null)
    {
        
        $hasilKuisionerModel = new HasilKuisionerModel();
        if ($id === null) {
            $data = $hasilKuisionerModel->findAll();
        } else {
            $data = $hasilKuisionerModel->find($id);
            if ($data === null) {
                return $this->failNotFound('Data tidak ditemukan dengan ID ' . $id);
            }
        }

        return $this->respond($data);
    }
}
