<?php

namespace App\Validation;

use App\Models\UserModel;

class LoginRules {
  public function check_username(string $str, string $fields, array $data) : bool {
    $model = new UserModel();

    $user = $model->where('username', $data['username'])->first();

    if(!$user) 
      return false;
    
    return true;
  }

  public function auth(string $str, string $fields, array $data) : bool {
    $model = new UserModel();

    $user = $model->where('username', $data['username'])->first();

    if(!$user) 
      return false;

    $isVerified = password_verify($data['password'], $user['password']);

    if($isVerified) {
      session()->set('user_id', $user['user_id']); 
      session()->set('role', $user['role']); 
    }
    
    return $isVerified;
  }
}