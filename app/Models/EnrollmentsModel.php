<?php 

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentsModel extends Model
{
  protected $table      = 'enrollments';
  protected $primaryKey = 'enrollment_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'enrollment_code',
    'enrollment_type',
    'academic_year',
    'semester',
    'isVerified',
    'student_id'
  ];
}