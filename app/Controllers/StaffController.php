<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\StaffModel;

class StaffController extends ResourceController
{
    protected $model;
    public function __construct()
    {
        $this->model = new StaffModel();
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
    public function show($NIP = null)
    {
        $data = $this->model->find($NIP);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('Mahasiswa not found');
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
            'NIP' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'NIP' => $this->request->getVar('NIP'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
        ];

        $this->model->tambahStaff($data);
        return $this->respondCreated(
            'Messege : Staff Berhasil Ditambahkan'
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
    public function update($NIP = null)
    {
        $rules = [
            'NIP' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'NIP' => $this->request->getVar('NIP'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
        ];

        $this->model->updateStaff($NIP, $data);
        return $this->respondUpdated(
            'Messege : Staff Berhasil Diupdate'
        );
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($NIP = null)
    {
        $this->model->hapusStaff($NIP);
        return $this->respondDeleted([
            'Messege ' => ' Mahasiswa Berhasil Dihapus'
        ]);
    }
}
