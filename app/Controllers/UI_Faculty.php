<?php

namespace App\Controllers;

use App\Models\ClassScheduleModel;

/**
 * this controls the navigation of the faculty UI
 */
class UI_Faculty extends BaseController
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
    $model = new ClassScheduleModel();

    $data = [
      'page' => $uri->getSegment(2),
      'schedules' => $model->join('courses', 'courses.course_id = class_schedules.course_id')
        ->join('class', 'class.class_id = class_schedules.class_id')
        ->join('programs', 'programs.program_id = class.program_id')
        ->where('faculty_id', session()->get('faculty_id'))
        ->findAll(),
      's_count' => $model->selectCount('class.class_id', 'numrows')
        ->join('class', 'class.class_id = class_schedules.class_id')
        ->join('students', 'students.class_id = class.class_id')
        ->where('faculty_id', session()->get('faculty_id'))
        ->groupBy('students.student_id')
        ->groupBy('class.class_id')
        ->first(),
      'c_count' => $model->selectCount('class.class_id', 'numrows')
        ->join('class', 'class.class_id = class_schedules.class_id')
        ->where('faculty_id', session()->get('faculty_id'))
        ->first()
    ];

    return view('UI_Faculty/home', $data);
  }

  /**
   * show the class page
   *
   * @return mixed
   */
  public function class()
  {
    helper("form");
    $uri = service('uri');

    $data = [
      'page' => $uri->getSegment(2)
    ];

    return view('UI_Faculty/class', $data);
  }

  /**
   * show the check_attendance page
   *
   * @return mixed
   */
  public function check_attendance()
  {
    helper("form");
    $uri = service('uri');

    $data = [
      'page' => $uri->getSegment(2)
    ];

    return view('UI_Faculty/check_attendance', $data);
  }

  /**
   * show the report page
   *
   * @return mixed
   */
  public function report()
  {
    helper("form");
    $uri = service('uri');

    $data = [
      'page' => $uri->getSegment(2)
    ];

    return view('UI_Faculty/report', $data);
  }
}
