<?php

namespace App\Controllers;

use App\Models\ClassScheduleModel;
use App\Models\StudentModel;

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
    $model = new ClassScheduleModel();

    $data = [
      'page'  => $uri->getSegment(2),
      'class' => $model->select('class.class_id, program, level, section, course, class_schedules.course_id')
        ->join('courses', 'courses.course_id = class_schedules.course_id')
        ->join('class', 'class.class_id = class_schedules.class_id')
        ->join('programs', 'programs.program_id = class.program_id')
        ->where('faculty_id', session()->get('faculty_id'))
        ->groupBy('class_schedules.course_id')
        ->findAll(),
    ];


    return view('UI_Faculty/class', $data);
  }

  /**
   * show the students list in a selected course
   *
   * @param int $class_id [selected class_id]
   * @return mixed
   */
  public function students($class_id)
  {
    helper("form");
    $uri = service('uri');
    $model = new StudentModel();

    $data = [
      'page'       => $uri->getSegment(2),
      'subsegment' => $uri->getSegment(3),
      'students'   => $model->select('students.student_id, suser_no, fname, lname')
        ->where('class_id', esc($class_id))
        ->findAll(),
      'present'    => $model->select('students.student_id, COUNT(students_attendance.status) as count')
        ->join('students_attendance', 'students_attendance.student_id = students.student_id', 'left')
        ->where('class_id', esc($class_id))
        ->where('students_attendance.status', 'P')
        ->groupBy('students.student_id')
        ->get()->getResultArray(),
      'absent'    => $model->select('students.student_id, COUNT(students_attendance.status) as count')
        ->join('students_attendance', 'students_attendance.student_id = students.student_id', 'left')
        ->where('class_id', esc($class_id))
        ->where('students_attendance.status', 'A')
        ->orWhere('students_attendance.status', null)
        ->groupBy('students.student_id')
        ->get()->getResultArray(),
      'late'    => $model->select('students.student_id, COUNT(students_attendance.status) as count')
        ->join('students_attendance', 'students_attendance.student_id = students.student_id', 'left')
        ->where('students_attendance.status', 'L')
        ->where('class_id', esc($class_id))
        ->groupBy('students.student_id')
        ->get()->getResultArray()
    ];

    return view('UI_Faculty/students', $data);
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
    $model = new ClassScheduleModel();

    $data = [
      'page' => $uri->getSegment(2),
      'class' => $model->join('courses', 'courses.course_id = class_schedules.course_id')
        ->join('class', 'class.class_id = class_schedules.class_id')
        ->join('programs', 'programs.program_id = class.program_id')
        ->where('faculty_id', session()->get('faculty_id'))
        ->findAll(),
    ];

    return view('UI_Faculty/report', $data);
  }
}
