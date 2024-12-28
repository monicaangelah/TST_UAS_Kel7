<?php
namespace App\Models;
use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'nilai_mahasiswa';
    protected $allowedFields = ['mahasiswa_id', 'mata_kuliah_id', 'nilai', 'sks'];
}