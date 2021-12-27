<?php

namespace App\Validation;

use App\Models\EnrollmentsModel;

class CheckEnrollmentCode
{
  public function check_code(string $str, string $fields, array $data): bool
  {
    $model = new EnrollmentsModel();

    $student = [
      'student_id'      => session()->get('student_id'),
      'enrollment_code' => esc($data['code'])
    ];

    // get student enrollment
    $enrollment_id = $model->where($student)->first();

    session()->setFlashdata('enrollment_id', $enrollment_id['enrollment_id']);
    return (!$enrollment_id) ? FALSE : TRUE ;
  }
}
