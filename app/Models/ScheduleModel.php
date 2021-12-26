<?php 

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
  protected $table      = 'schedules';
  protected $primaryKey = 'schedule_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'start_time', 
    'end_time', 
    'day', 
    'room', 
    'semester',  
    'academic_year'
  ];
}