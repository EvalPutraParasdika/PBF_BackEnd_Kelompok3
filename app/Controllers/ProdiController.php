<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProdiModel;

class ProdiController extends ResourceController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ProdiModel();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $query = $this->model->query(
            "SELECT p.*, j.nama AS nama_jurusan
            FROM prodi p
            JOIN jurusan j ON p.id_jurusan = j.id_jurusan"
        );
        $data = $query->getResultArray();
        return $this->respond([
            'message' => 'success',
            'data_prodi' => $data
        ], 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id_prodi = null)
    {
        $data = $this->model->find($id_prodi);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('Prodi not found');
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
            'id_prodi' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'id_prodi' => $this->request->getVar('id_prodi'),
            'nama' => $this->request->getVar('nama'),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
        ];

        $this->model->tambahProdi($data);
        return $this->respondCreated(
            'Messege : Prodi Berhasil Ditambahkan'
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
    public function update($id_prodi = null)
    {
        $rules = [
            'id_prodi' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'id_prodi' => $this->request->getVar('id_prodi'),
            'nama' => $this->request->getVar('nama'),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
        ];

        $this->model->updateProdi($id_prodi, $data);
        return $this->respondUpdated(
            'Messege : Prodi Berhasil Diupdate'
        );
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id_prodi = null)
    {
        if (!$this->model->find($id_prodi)) {
            return $this->failNotFound('Prodi tidak ditemukan');
        }
    
        if ($this->model->hapusProdi($id_prodi)) {
            return $this->respondDeleted([
                'message' => 'Prodi Berhasil Dihapus'
            ]);
        } else {
            return $this->failServerError('Gagal menghapus Prodi');
        }
    }
}
