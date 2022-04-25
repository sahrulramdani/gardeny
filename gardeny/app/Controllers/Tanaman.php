<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TanamanModel;
use App\Models\SpesiesModel;
use App\Models\UserModel;
use CodeItNow\BarcodeBundle\Utils\QrCode;

class Tanaman extends BaseController
{
    protected $tanamanModel;
    protected $spesiesModel;
    protected $userModel;
    protected $qrCode;
    
    public function __construct()
    {
        $this->tanamanModel = new TanamanModel();
        $this->spesiesModel = new SpesiesModel();
        $this->userModel = new UserModel();
        $this->qrCode = new QrCode();
    }

    public function index()
    {


        $currentPage = $this->request->getVar('page_tanaman') ? $this->request->getVar('page_tanaman') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $tanaman = $this->tanamanModel->search($search);
        }else{
            $tanaman = $this->tanamanModel;
        }

        $spesies = $this->spesiesModel->findAll();

        $id = session()->get('id_user');
        $user = $this->userModel->find($id);
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Tanaman',
            'tanaman' => $tanaman->paginate(5, 'tanaman'),
            'pager' => $this->tanamanModel->pager,
            'spesies' => $spesies,
            'currentPage' => $currentPage,
            'uri' => 'tanaman',
            'user' => $user,
            'level' => session()->get('level')
        ];

        return view('dashboard/tanaman', $data);
    }

    public function tambah()
    {   

        if(!$this->validate([
            'id_spesies'        => 'required',
            'nama_tanaman'      => 'required',
            'ciri_tanaman'      => 'required',
            'perawatan_khusus'  => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/tanaman');
        }

        // $fileQr = $this->request->getFile('qr_code');

        // if ($fileQr->getError() == 4) {
        //     $namaQr = 'default.png';
        // } else {
        //     $namaQr = $fileQr->getRandomName();

        //     $fileQr->move('upload', $namaQr);
        // }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $foto->getRandomName();

            $foto->move('upload', $namaFoto);
        }

        $newIdTanaman = $this->tanamanModel->getNewId();

        foreach ($newIdTanaman as $newid);

        $valueQr = 'https://gardeny5.000webhostapp.com/learn/detail/'.$newid;

        $this->qrCode
        ->setText($valueQr)
        ->setSize(300)
        ->setPadding(10)
        ->setErrorCorrection('high')
        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        ->setLabelFontSize(16)
        ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ->save('qrcode/' . $newid . '.png');
        ;
        $this->qrCode->generate();

        $data_post = [
            'id_tanaman'        => $newid,
            'id_spesies'        => $this->request->getVar('id_spesies'),
            'nama_tanaman'      => $this->request->getVar('nama_tanaman'),
            'ciri_tanaman'      => $this->request->getVar('ciri_tanaman'),
            'jumlah'            => 0,
            'perawatan_khusus'  => $this->request->getVar('perawatan_khusus'),
            'qr_code'           => $newid . '.png',
            'foto'              => $namaFoto,
        ];

        $save = $this->tanamanModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Tanaman Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/tanaman');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getedit()
    {
            echo json_encode($this->tanamanModel->find($_POST['id']));
    }

    public function edit(){
        $fileQr = $this->request->getFile('qr_code');

        if ($fileQr->getError() == 4) {
            $namaQr = $this->request->getVar('qrLama');
            
        }else {
            $namaQr = $fileQr->getName();

            $fileQr->move('qrcode', $namaQr);

            if ($this->request->getVar('qrLama') != 'default.png') {
                unlink('qrcode/' . $this->request->getVar('qrLama'));
            }
            
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
            
        }else {
            $namaFoto = $foto->getName();

            $foto->move('upload', $namaFoto);

            if ($this->request->getVar('fotoLama') != 'default.png') {
                unlink('upload/' . $this->request->getVar('fotoLama'));
            }
        }

        $data_post = [
            'id_tanaman'        => $this->request->getVar('id_tanaman'),
            'id_spesies'        => $this->request->getVar('id_spesies'),
            'nama_tanaman'      => $this->request->getVar('nama_tanaman'),
            'ciri_tanaman'      => $this->request->getVar('ciri_tanaman'),
            'jumlah'            => $this->request->getVar('jumlah'),
            'perawatan_khusus'  => $this->request->getVar('perawatan_khusus'),
            'qr_code'           => $namaQr,
            'foto'              => $namaFoto,
        ];

        $save = $this->tanamanModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Tanaman Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/tanaman');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function getdetail()
    {
            echo json_encode($this->tanamanModel->find($_POST['id']));
    }

    public function hapus($id_tanaman)
    {
        if ($this->tanamanModel->delete($id_tanaman)) {
            session()->setFlashdata('gagal', 'Data Tanaman Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/tanaman');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}