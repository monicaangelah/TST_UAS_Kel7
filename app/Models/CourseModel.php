<?php
namespace App\Models;
use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'mata_kuliah';
    protected $allowedFields = ['kode', 'nama', 'sks', 'jadwal', 'prasyarat', 'kuota'];
}