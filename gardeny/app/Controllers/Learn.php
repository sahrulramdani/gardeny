<?php

namespace App\Controllers;

use App\Models\TanamanModel;
use App\Models\DetailTanamanModel;

class Learn extends BaseController
{
    protected $tanamanModel;
    protected $detailTanaman;
    
    public function __construct()
    {
        $this -> tanamanModel = new TanamanModel();
        $this -> detailTanaman = new DetailTanamanModel();

    }
    public function index()
    {
        $tanaman = $this->tanamanModel->findAll();

        $data = [
            'tanaman' => $tanaman,
        ];

        return view('learnpage/daftartanaman', $data);
    }
    
    public function detail($id_tanaman)
    {
        $dtanaman = $this->detailTanaman->find($id_tanaman);

        $data = [
            'dtanaman' => $dtanaman,
        ];
        return view('learnpage/tanaman',$data);
    }
}