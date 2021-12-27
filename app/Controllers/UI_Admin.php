<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use \App\Models\UserModel;
use \App\Models\ProgramModel;
use \App\Models\CourseModel;
use \App\Models\ClassModel;
use \App\Models\FacultyModel;
use \App\Models\StudentModel;
use \App\Models\ClassScheduleModel;

/**
 * this controls the navigation of the admin UI
 */
class UI_Admin extends BaseController
{
  /**
   * show the dashboard page
   *
   * @return mixed
   */
  public function index()
  {
    helper("form");
    $uri = service('uri');
    $f = new FacultyModel();
    $s = new StudentModel();
    $sc = new ClassScheduleModel();
    $c = new ClassModel();
    $p = new ProgramModel();
    $co = new CourseModel();

    $data = [
      'page' => $uri->getSegment(2),
      'f_count' => $f->countAll(),
      's_count' => $s->countAll(),
      'sc_count' => $sc->countAll(),
      'c_count' => $c->countAll(),
      'p_count' => $p->countAll(),
      'co_count' => $co->countAll(),
    ];

    return view('UI_Admin/dashboard', $data);
  }

  /**
   * show the programs page
   *
   * @return mixed
   */
  public function programs()
  {
    helper("form");
    $uri = service('uri');
    $model = new ProgramModel();

    $data = [
      'page'     => $uri->getSegment(2),
      'programs' => $model->findAll()
    ];

    return view('UI_Admin/programs', $data);
  }

  /**
   * show the course page
   *
   * @return mixed
   */
  public function courses()
  {
    helper("form");
    $uri = service('uri');
    $model = new CourseModel();

    $data = [
      'page'    => $uri->getSegment(2),
      'courses' => $model->findAll()
    ];

    return view('UI_Admin/courses', $data);
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
    $model = new ClassModel();
    $program = new ProgramModel();

    $data = [
      'page' => $uri->getSegment(2),
      'class' => $model->join('programs', 'programs.program_id = class.program_id')->findAll(),
      'programs' => $program->findAll()
    ];

    return view('UI_Admin/class', $data);
  }

  /**
   * show the faculty page
   *
   * @return mixed
   */
  public function faculty()
  {
    helper("form");
    $uri = service('uri');
    $f_model = new FacultyModel();
    $c_model = new ClassModel();

    $data = [
      'page' => $uri->getSegment(2),
      'faculty' => $f_model->join('users', 'faculty.user_id = users.user_id')->findAll(),
      'class'    => $c_model->join('programs', 'programs.program_id = class.program_id')->findAll()
    ];

    return view('UI_Admin/faculty', $data);
  }

  /**
   * show the students page
   *
   * @return mixed
   */
  public function students()
  {
    helper("form");
    $uri = service('uri');
    $time = new Time('now');
    $s_model = new StudentModel();
    $c_model = new ClassModel();

    $students = $s_model->join('users', 'students.user_id = users.user_id')
      ->join('class', 'class.class_id = students.class_id')
      ->join('programs', 'programs.program_id = class.program_id')
      ->join('enrollments', 'enrollments.student_id = students.student_id', 'left')
      ->findAll();

    $data = [
      'page'     => $uri->getSegment(2),
      'students' => $students,
      'class'    => $c_model->join('programs', 'programs.program_id = class.program_id')->findAll(),
      'Time'     => $time
    ];

    return view('UI_Admin/students', $data);
  }

  /**
   * show the schedules page
   *
   * @return mixed
   */
  public function schedules()
  {
    helper(["form", "date"]);
    $uri = service('uri');
    $time = new Time('now');
    $s_model = new ClassScheduleModel();
    $c_model = new ClassModel();
    $co_model = new CourseModel();
    $f_model = new FacultyModel();

    $schedules = $s_model->join('faculty', 'faculty.faculty_id = class_schedules.faculty_id')
      ->join('courses', 'courses.course_id = class_schedules.course_id')
      ->join('class', 'class.class_id = class_schedules.class_id')
      ->join('programs', 'programs.program_id = class.program_id')
      ->findAll();
    $class =  $c_model->join('programs', 'programs.program_id = class.program_id')->findAll();
    $course =  $co_model->findAll();
    $faculty =  $f_model->findAll();

    $data = [
      'page'      => $uri->getSegment(2),
      'schedules' => $schedules,
      'class'     => $class,
      'course'    => $course,
      'faculty'   => $faculty,
      'Time'      => $time
    ];

    return view('UI_Admin/schedules', $data);
  }

  /**
   * show the users page
   *
   * @return mixed
   */
  public function users()
  {
    helper("form");
    $uri = service('uri');
    $model = new UserModel();

    $students = $model->join('students', 'students.user_id = users.user_id')
      ->findAll();
    $faculty = $model->join('faculty', 'faculty.user_id = users.user_id')
      ->findAll();

    $data = [
      'page'     => $uri->getSegment(2),
      'students' => $students,
      'faculty'  => $faculty,
    ];

    return view('UI_Admin/users', $data);
  }
}