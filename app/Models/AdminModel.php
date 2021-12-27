<?php 

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
  protected $table      = 'admins';
  protected $primaryKey = 'admin_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'fname', 'lname', 'created_at', 'user_id'
  ];
}