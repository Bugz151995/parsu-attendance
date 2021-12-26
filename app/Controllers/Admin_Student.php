<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Admin_Student extends BaseController
{
    /**
     * create a new student
     *
     * @return mixed
     */
    public function create()
    {
        $u_model = new UserModel();
        $f_model = new StudentModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');
        helper("form");

        $user_data = [
            'username' => esc($this->request->getPost('uname')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $user_id = $u_model->insert($user_data);

        $faculty_data = [
            'suser_no' => $myTime->getTimestamp(), 
            'fname'    => esc($this->request->getPost('fname')), 
            'lname'    => esc($this->request->getPost('lname')),
            'class_id' => esc($this->request->getPost('class')),
            'user_id'  => $user_id
        ];

        $f_model->insert($faculty_data);
        session()->setTempdata('success', 'A new data successfully created!', 1);
        return redirect()->back();
    }

    /**
     * update the student
     *
     * @return mixed
     */
    public function update()
    {
        $model = new StudentModel();
        helper("form");

        $data = [
            'student_id' => esc($this->request->getPost('student_id')),
            'program_id' => esc($this->request->getPost('program')),
            'level'      => esc($this->request->getPost('level')),
            'section'    => esc($this->request->getPost('section'))
        ];

        $model->save($data);
        session()->setTempdata('success', 'The data was successfully updated!', 1);
        return redirect()->back();
    }

    /**
     * delete a student
     *
     * @return mixed
     */
    public function delete()
    {
        $model = new StudentModel();
        helper("form");

        $data = [
            'student_id' => esc($this->request->getPost('student_id')),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}
