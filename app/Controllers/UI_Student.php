<?php

namespace App\Controllers;

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
   * show the schedule page
   *
   * @return mixed
   */
  public function schedule()
  {
    helper("form");
    $uri = service('uri');

    $data = [
      'page' => $uri->getSegment(1)
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
