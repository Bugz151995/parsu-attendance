<?php 

namespace App\Models;

use CodeIgniter\Model;

class ClassScheduleModel extends Model
{
  protected $table      = 'class_schedules';
  protected $primaryKey = 'class_schedule_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'class_id', 
    'course_id', 
    'start_time', 
    'end_time', 
    'day', 
    'room', 
    'faculty_id', 
    'semester', 
    'academic_year'
  ];
}