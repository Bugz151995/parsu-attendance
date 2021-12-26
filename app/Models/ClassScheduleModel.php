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
    'schedule_id', 
    'faculty_id'
  ];
}