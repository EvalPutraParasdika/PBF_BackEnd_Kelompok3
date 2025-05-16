<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;

class MahasiswaController extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MahasiswaModel();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $query = $this->model->query(
            "SELECT m.*, p.nama AS nama_prodi
            FROM mahasiswa m
            JOIN prodi p ON p.id_prodi = m.id_prodi"
        );
        $data = $query->getResultArray();
        return $this->respond([
            'message' => 'success',
            'data_mahasiswa' => $data
        ], 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($NIM = null)
    {
        $data = $this->model->find($NIM);
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
            'status' => 'required',
            'id_prodi' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'NIM' => $this->request->getVar('NIM'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'semester' => $this->request->getVar('semester'),
            'status' => $this->request->getVar('status'),
            'id_prodi' => $this->request->getVar('id_prodi')
        ];

        $this->model->tambahMahasiswa($data);
        return $this->respondCreated(
            'Messege : Mahasiswa Berhasil Ditambahkan'
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
    public function update($NIM = null)
    {
        $rules = [
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'status' => 'required',
            'id_prodi' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'NIM' => $this->request->getVar('NIM'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'semester' => $this->request->getVar('semester'),
            'status' => $this->request->getVar('status'),
            'id_prodi' => $this->request->getVar('id_prodi')
        ];

        $this->model->updateMahasiswa($NIM, $data);
        return $this->respondUpdated([
            'Message' => 'Mahasiswa Berhasil Diubah'
        ]);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($NIM = null)
    {
        $this->model->hapusMahasiswa($NIM);
        return $this->respondDeleted([
            'Message ' => ' Mahasiswa Berhasil Dihapus'
        ]);
    }
}
