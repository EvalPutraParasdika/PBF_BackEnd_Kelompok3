<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id_jurusan';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama'];

    
    public function getJurusan()
    {
        return $this->findAll();
    }

    public function getJurusanById($id_jurusan)
    {
        return $this->find($id_jurusan);
    }

    public function tambahJurusan($data)
    {
        return $this->insert($data);
    }

    public function updateJurusan($id_jurusan, $data)
    {
        return $this->update($id_jurusan, $data);
    }

    public function hapusJurusan($id_jurusan)
    {
        return $this->delete($id_jurusan);
    }
}
