<?php

namespace App\Controllers;

use App\Models\TanamanModel;
use App\Models\LokasiModel;
use App\Models\LaporanModel;
use App\Models\UserModel;
use App\Models\PerawatanModel;
use App\Models\SublokasiModel;

class Dashboard extends BaseController
{
    protected $tanamanModel;
    protected $lokasiModel;
    protected $laporanModel;
    protected $userModel;
    protected $perawatanModel;
    protected $sublokasiModel;

    public function __construct()
    {
        $this->tanamanModel = new TanamanModel();
        $this->lokasiModel = new LokasiModel();
        $this->laporanModel = new LaporanModel();
        $this->userModel = new UserModel();
        $this->perawatanModel = new PerawatanModel();
        $this->sublokasiModel = new SublokasiModel();
    }

    public function index()
    {
        $id = session()->get('id_user');
        $user = $this->userModel->find($id);

        $data = [
                'total_tanaman' => $this->tanamanModel->countAllResults(),
                'total_lokasi' => $this->lokasiModel->countAllResults(),
                'total_sublokasi' => $this->sublokasiModel->countAllResults(),
                'total_perawatan' => $this->perawatanModel->countAllResults(),
                'nama_penanggung' => $this->laporanModel->getLaporan(),
                'total_user' => $this->userModel->getUser(),
                'laporan_user' => $this->laporanModel->getUserLapor($id),
                'laporan_harian' => $this->laporanModel->getHarian(),
                'laporan_bulanan' => $this->laporanModel->getBulanan(),
                'uri' => 'dashboard',
                'user' => $user,
                'level' => session()->get('level')
        ];
        
        return view('dashboard/index', $data);
    }
}