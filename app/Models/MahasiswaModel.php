<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'NIM';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'kelas',
        'semester',
        'status',
        'id_prodi'
    ];

    public function getMahasiswa($NIM = false)
    {
        return $this->findAll();
    }

    public function getMahasiswaByNIM($NIM)
    {
        return $this->find($NIM);
    }

    public function tambahMahasiswa($data)
    {
        return $this->insert($data);
    }

    public function updateMahasiswa($NIM, $data)
    {
        return $this->update($NIM, $data);
    }

    public function hapusMahasiswa($NIM)
    {
        return $this->delete($NIM);
    }
}
