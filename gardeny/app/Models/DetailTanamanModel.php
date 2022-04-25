<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTanamanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_tanaman';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tanaman', 'nama_tanaman', 'ciri_tanaman', 'perawatan_khusus', 'foto', 'nama_spesies', 'keterangan_spesies', 'nama_genus', 'keterangan_genus', 'nama_famili', 'keterangan_famili'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function search($search)
    {
        return $this->table('detail_perawatan_tanaman')->like('nama', $search)->orLike('nama_tanaman', $search)->orLike('nama_lokasi', $search);
    }
}