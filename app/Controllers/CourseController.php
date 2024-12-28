<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CourseModel;
use App\Models\StudentCourseModel;

class CourseController extends BaseController
{
    public function index()
    {
        $model = new CourseModel();
        $data['courses'] = $model->findAll();
        return view('courses/index', $data);
    }

    public function register($id)
    {
        $studentId = session()->get('user_id');
        $courseModel = new CourseModel();
        $studentCourseModel = new StudentCourseModel();
    
        $course = $courseModel->find($id);
        $registeredCount = $studentCourseModel->where('mata_kuliah_id', $id)->countAllResults();
    
        if ($registeredCount >= $course['kuota']) {
            return redirect()->to('/courses')->with('error', 'Kuota mata kuliah sudah penuh.');
        }
    
        $studentCourseModel->insert([
            'mahasiswa_id' => $studentId,
            'mata_kuliah_id' => $id,
        ]);
    
        return redirect()->to('/courses')->with('message', 'Mata kuliah berhasil didaftarkan.');
    }    

    public function unregister($id)
    {
        $studentId = session()->get('user_id');
        $model = new StudentCourseModel();
    
        $model->where([
            'mahasiswa_id' => $studentId,
            'mata_kuliah_id' => $id,
        ])->delete();
    
        return redirect()->to('/courses')->with('message', 'Pendaftaran mata kuliah dibatalkan.');
    }    
}