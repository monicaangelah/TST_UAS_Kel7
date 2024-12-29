<?php

namespace App\Controllers\Pendaftaran;

use App\Controllers\BaseController;
use App\Models\StudentsCoursesModel;
use App\Models\CoursesModel;

class IPController extends BaseController
{
    public function generate()
    {
        // Ambil input JSON
        $input = $this->request->getJSON(true);
        $grades = $input['grades'] ?? null;

        // Validasi input
        if (!$grades || !is_array($grades)) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Data nilai harus berupa array'
        ])->setStatusCode(400);
    }

    // Konversi nilai indeks ke angka
    $gradeValues = [
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
    ];

    $totalPoints = 0; // Total nilai (nilai angka * SKS)
    $totalSKS = 0;    // Total SKS

    foreach ($grades as $grade) {
        $courseId = $grade['course_id'];
        $gradeIndex = $grade['grade'];

        // Validasi grade
        if (!isset($gradeValues[$gradeIndex])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Nilai indeks '$gradeIndex' tidak valid"
            ])->setStatusCode(400);
        }

        // Ambil informasi mata kuliah
        $mataKuliahModel = new CoursesModel();
        $course = $mataKuliahModel->find($courseId);

        if (!$course) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Mata kuliah dengan ID '$courseId' tidak ditemukan"
            ])->setStatusCode(404);
        }

        $sks = $course['credits'];
        $nilaiAngka = $gradeValues[$gradeIndex];

        // Hitung total poin dan total SKS
        $totalPoints += $nilaiAngka * $sks;
        $totalSKS += $sks;
    }

    // Hitung IP
    $ip = $totalPoints / $totalSKS;

    return $this->response->setJSON([
        'status' => 'success',
        'ip' => round($ip, 2),
        'total_sks' => $totalSKS
    ]);
}
}