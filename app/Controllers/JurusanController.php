<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\JurusanModel;

class JurusanController extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new JurusanModel();
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
    public function show($id_jurusan = null)
    {
        $data = $this->model->find($id_jurusan);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('Jurusan not found');
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
            'id_jurusan' => 'required',
            'nama' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'nama' => $this->request->getVar('nama'),

        ];

        $this->model->tambahJurusan($data);
        return $this->respondCreated(
            'Messege : Jurusan Berhasil Ditambahkan'
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
    public function update($id_jurusan = null)
    {
        $rules = [
            'id_jurusan' => 'required',
            'nama' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'nama' => $this->request->getVar('nama'),

        ];

        $this->model->updateJurusan($id_jurusan, $data);
        return $this->respondUpdated(
            'Messege : Jurusan Berhasil Diupdate'
        );
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id_jurusan = null)
    {
        $this->model->hapusJurusan($id_jurusan);
        return $this->respondDeleted([
            'Messege '=> ' Mahasiswa Berhasil Dihapus'
        ]);
    }
}
