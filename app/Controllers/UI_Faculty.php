<?php

namespace App\Controllers;

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

    $data = [
      'page' => $uri->getSegment(2)
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
