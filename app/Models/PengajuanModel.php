<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id_pengajuan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NIM',
        'nama',
        'kelas',    
        'semester',
        'tgl_pengajuan',
        'semester_cuti',
        'tgl_mulai_cuti',
        'tgl_selesai_cuti',
        'alasan',
        'dokumen',
        'status_pengajuan'
    ];

    public function getPengajuan($id_pengajuan = false)
    {
        return $this->findAll();
    }

    public function getPengajuanById($id_pengajuan)
    {
        return $this->find($id_pengajuan);
    }

    public function tambahpengajuan($id_pengajuan)
    {
        return $this->insert($id_pengajuan);
    }

    public function updatePengajuan($id_pengajuan, $data)
    {
        return $this->update($id_pengajuan, $data);
    }

    public function hapusPengajuan($id_pengajuan)
    {
        return $this->delete($id_pengajuan);
    }
}
