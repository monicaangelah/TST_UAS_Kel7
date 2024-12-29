<?php

namespace App\Controllers;

use App\Models\StudentsModel;
use App\Models\TeachersModel;

class AdminController extends BaseController
{
    public function inputMahasiswaView()
    {
        $studentsModel = new StudentsModel();
        $students = $studentsModel->findAll();
    
        return view('admin/input_mahasiswa', ['students' => $students]);
    }

    public function simpanMahasiswa()
    {
        $studentsModel = new StudentsModel();

        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'semester' => $this->request->getPost('semester'),
        ];

        if ($studentsModel->insert($data)) {
            return redirect()->back()->with('success', 'Data mahasiswa berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data mahasiswa.');
        }
    }

    public function inputDosenView()
    {
        $teachersModel = new TeachersModel();
        $teachers = $teachersModel->findAll();
    
        return view('admin/input_dosen', ['teachers' => $teachers]);
    }

    public function simpanDosen()
    {
        $teacherModel = new TeachersModel();

        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
        ];

        if ($teacherModel->insert($data)) {
            return redirect()->back()->with('success', 'Data dosen berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data dosen.');
        }

    }
}
