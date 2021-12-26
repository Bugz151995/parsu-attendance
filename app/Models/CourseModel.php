<?php 

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
  protected $table      = 'courses';
  protected $primaryKey = 'course_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'course', 'description'
  ];
}