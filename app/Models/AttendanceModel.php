<?php 

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
  protected $table      = 'students_attendance';
  protected $primaryKey = 'student_attendance_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'class_schedule_id',
    'time_in',
    'time_out',
    'status',
    'student_id'
  ];
}