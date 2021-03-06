<?php 

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
  protected $table      = 'students';
  protected $primaryKey = 'student_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'suser_no', 
    'fname', 
    'lname', 
    'class_id', 
    'user_id'
  ];
}