<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table            = 'prodi';
    protected $primaryKey       = 'id_prodi';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'id_jurusan'
    ];

    public function getProdi()
    {
        return $this->findAll();
    }

    public function getProdiById($id_prodi)
    {
        return $this->find($id_prodi);
    }

    public function tambahProdi($data)
    {
        return $this->insert($data);
    }

    public function updateProdi($id_prodi, $data)
    {
        return $this->update($id_prodi, $data);
    }

    public function hapusProdi($id_prodi)
    {
        return $this->delete($id_prodi);
    }
}
