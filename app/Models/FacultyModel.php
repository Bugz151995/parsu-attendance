<?php 

namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model
{
  protected $table      = 'faculty';
  protected $primaryKey = 'faculty_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'fuser_no', 
    'fname', 
    'lname',
    'user_id'
  ];
}