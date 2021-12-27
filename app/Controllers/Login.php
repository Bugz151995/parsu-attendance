<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\AdminModel;
use App\Models\FacultyModel;

class Login extends BaseController
{
    /**
     * show the login form
     *
     * @return mixed
     */
    public function index()
    {
        //destroy the session when the user goes back w/o logout
        session()->destroy();
        helper("form");
        return view('login');
    }

    /**
     * authenticate the user
     * redirect to their respective UI
     *
     * @return mixed
     */
    public function auth()
    {
        helper("form");
        $student = new StudentModel();
        $faculty = new FacultyModel();
        $admin = new AdminModel();

        if (!$this->validate('loginRules')) {
            $validation = [
                'validation' => $this->validator
            ];

            return view('login', $validation);
        }

        session()->set('isLoggedIn', true);
        $role = session()->get('role');
        $user_id = session()->get('user_id');

        switch ($role) {
            case 1:
                $admin_id = $admin->select('admin_id')
                    ->where('admins.user_id', $user_id)
                    ->first();
                session()->set($admin_id);
                return redirect()->to('a/dashboard');
                break;
            case 2:
                $faculty_id = $faculty->select('faculty_id')
                    ->where('faculty.user_id', $user_id)
                    ->first();
                session()->set($faculty_id);
                return redirect()->to('f/dashboard');
                break;
            case 3:
                $student = $student->select('student_id, class_id')
                    ->where('students.user_id', $user_id)
                    ->first();
                session()->set('student_id', $student['student_id']);
                session()->set('class_id', $student['class_id']);
                return redirect()->to('enrollment');
                break;
        }
    }
}
