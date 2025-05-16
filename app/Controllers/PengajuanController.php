<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PengajuanModel;

class PengajuanController extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PengajuanModel();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id_pengajuan = null)
    {
        $data = $this->model->find($id_pengajuan);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('Data Tidak Ditemukan');
        }
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = [
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'tgl_pengajuan' => 'required',
            'semester_cuti' => 'required',
            'tgl_mulai_cuti' => 'required',
            'tgl_selesai_cuti' => 'required',
            'alasan' => 'required',
            'dokumen' => 'required',
            'status_pengajuan' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'NIM' => $this->request->getVar('NIM'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'semester' => $this->request->getVar('semester'),
            'tgl_pengajuan' => $this->request->getVar('tgl_pengajuan'),
            'semester_cuti' => $this->request->getVar('semester_cuti'),
            'tgl_mulai_cuti' => $this->request->getVar('tgl_mulai_cuti'),
            'tgl_selesai_cuti' => $this->request->getVar('tgl_selesai_cuti'),
            'alasan' => $this->request->getVar('alasan'),
            'dokumen' => $this->request->getVar('dokumen'),
            'status_pengajuan' => $this->request->getVar('status_pengajuan')
        ];

        $this->model->tambahpengajuan($data);
        return $this->respondCreated(
            'Messege : Pengajuan Berhasil Ditambahkan'
        );
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id_pengajuan = null)
    {
        $data = $this->request->getJSON(true); // <- ini WAJIB
    
        if (!$data) {
            return $this->fail('Data tidak ditemukan / format salah');
        }
    
        $rules = [
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'tgl_pengajuan' => 'required',
            'semester_cuti' => 'required',
            'tgl_mulai_cuti' => 'required',
            'tgl_selesai_cuti' => 'required',
            'alasan' => 'required',
            'dokumen' => 'required',
            'status_pengajuan' => 'required'
        ];
    
        if (!$this->validateData($data, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
        if (!$this->model->update($id_pengajuan, $data)) {
            return $this->failServerError('Gagal update data.');
        }
    
        $this->model->updatePengajuan($id_pengajuan, $data);
        return $this->respondUpdated('Data berhasil diupdate');
    }
    

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id_pengajuan = null)
    {
        $this->model->hapusPengajuan($id_pengajuan);
        return $this->respondDeleted([
            'Messege ' => ' Pengajuan Berhasil Dihapus'
        ]);
    }
}
