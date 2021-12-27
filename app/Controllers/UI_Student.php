<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\EnrollmentsModel;
use App\Models\ScheduleModel;
use App\Models\ClassScheduleModel;

/**
 * this controls the navigation of the student UI
 */
class UI_Student extends BaseController
{
  /**
   * show the home page
   *
   * @return mixed
   */
  public function index()
  {
    helper("form");
    $uri = service('uri');

    $data = [
      'page' => $uri->getSegment(1)
    ];

    return view('UI_Student/home', $data);
  }

  /**
   * show the enrollment page
   *
   * @return mixed
   */
  public function enrollment()
  {
    helper("form");
    $uri = service('uri');
    $time = new Time('now');
    $model = new EnrollmentsModel();

    $enrollment = [
      'student_id' => session()->get('student_id'),
      'isVerified' => '1'
    ];

    $isEnrolled = $model->where($enrollment)->first();

    $data = [
      'page' => $uri->getSegment(1),
      'Time' => $time
    ];

    if($isEnrolled) {
      return redirect()->to('home');
    }

    return view('UI_Student/enrollment', $data);
  }

  /**
   * show the schedule page
   *
   * @return mixed
   */
  public function schedule()
  {
    helper("form");
    $uri = service('uri');
    $model = new ClassScheduleModel();

    $data = [
      'page' => $uri->getSegment(1),
      'my_schedules' => $model
    ];

    return view('UI_Student/schedule', $data);
  }

  /**
   * show the overview page
   *
   * @return mixed
   */
  public function overview()
  {
    helper("form");
    $uri = service('uri');

    $data = [
      'page' => $uri->getSegment(1)
    ];

    return view('UI_Student/overview', $data);
  }
}
