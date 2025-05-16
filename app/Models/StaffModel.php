<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table            = 'staff';
    protected $primaryKey       = 'NIP';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'jabatan'
    ];

    public function getStaff()
    {
        return $this->findAll();
    }

    public function getStaffById($NIP)
    {
        return $this->find($NIP);
    }

    public function tambahStaff($data)
    {
        return $this->insert($data);
    }

    public function updateStaff($NIP, $data)
    {
        return $this->update($NIP, $data);
    }

    public function hapusStaff($NIP)
    {
        return $this->delete($NIP);
    }
}
