<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\GradeModel;

class StudentStatusController extends BaseController
{
    public function index()
    {
        $studentId = session()->get('user_id');
        $model = new GradeModel();

        $grades = $model->where('mahasiswa_id', $studentId)->findAll();
        $data['grades'] = $grades;

        $data['ip'] = $this->calculateIP($grades);
        $data['ipk'] = $this->calculateIPK($grades);

        return view('status/index', $data);
    }

    private function calculateIP($grades)
    {
        $totalPoints = 0;
        $totalSks = 0;

        foreach ($grades as $grade) {
            $point = match ($grade['nilai']) {
                'A' => 4,
                'B' => 3,
                'C' => 2,
                'D' => 1,
                'E' => 0,
            };

            $totalPoints += $point * $grade['sks'];
            $totalSks += $grade['sks'];
        }

        return $totalSks ? $totalPoints / $totalSks : 0;
    }

    private function calculateIPK($grades)
    {
        return $this->calculateIP($grades);
    }
}