<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $id = session()->get('id_user');
        $user = $this->userModel->find($id);
        $data = [
            'user' => $user,
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level'),
            'uri' => 'profil'
        ];
        return view('dashboard/profil', $data);
    }

    public function edit(){
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
            'id_user'           => $this->request->getVar('id_user'),
            'nama'              => $this->request->getVar('nama'),
            'email'             => $this->request->getVar('email'),
            'no_telp'           => $this->request->getVar('no_telp'),
            'foto'              => $namaFoto,
        ];

        $save = $this->userModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Kamu Telah Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/profil');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }
}