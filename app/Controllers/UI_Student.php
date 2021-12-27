<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\EnrollmentsModel;
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
    $myTime = new Time("now", 'Asia/Manila');
    $model = new ClassScheduleModel();

    $select = 'class_schedules.class_schedule_id,	class_id,	class_schedules.course_id,	start_time,	end_time,	day,	room, class_schedules.faculty_id,	semester,	academic_year,	class_schedules.created_at,	fuser_no,	fname,	lname,	user_id,	course,	description,	student_attendance_id, time_in,	time_out,	status,	student_id';
    
    $data = [
      'page'      => $uri->getSegment(1),
      'Time'      => $myTime,
      'schedules' => $model->select($select)
                           ->join('faculty', 'faculty.faculty_id = class_schedules.faculty_id')
                           ->join('courses', 'courses.course_id = class_schedules.course_id')
                           ->join('students_attendance', 'students_attendance.class_schedule_id = class_schedules.class_schedule_id', 'left')
                           ->where('class_schedules.class_id', session()->get('class_id'))
                           ->where('day', $myTime->toLocalizedString('EEEEE'))
                           ->findAll()
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

    if ($isEnrolled) {
      return redirect()->to('dashboard');
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
      'page'      => $uri->getSegment(1),
      'schedules' => $model->join('faculty', 'faculty.faculty_id = class_schedules.faculty_id')
        ->join('courses', 'courses.course_id = class_schedules.course_id')
        ->where('class_schedules.class_id', session()->get('class_id'))->findAll()
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
