<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\EnrollmentsModel;

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
        $s_model = new StudentModel();
        $e_model = new EnrollmentsModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');
        helper("form");

        $user_data = [
            'username' => esc($this->request->getPost('uname')),
            'password' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT)
        ];

        $user_id = $u_model->insert($user_data);

        $student_data = [
            'suser_no' => $myTime->getTimestamp(), 
            'fname'    => esc($this->request->getPost('fname')), 
            'lname'    => esc($this->request->getPost('lname')),
            'class_id' => esc($this->request->getPost('class')),
            'user_id'  => $user_id
        ];

        $student_id = $s_model->insert($student_data);

        $enrollment_data = [
            'enrollment_code' => 'E-REG-'.$myTime->getTimestamp(),
            'enrollment_type' => 'REG',
            'student_id'      => $student_id
        ];

        $e_model->insert($enrollment_data);
        session()->setTempdata('success', 'A new data successfully created!', 1);
        return redirect()->back();
    }

    /**
     * generate enrollment code for student
     *
     * @return mixed
     */
    public function generateCode()
    {
        $e_model = new EnrollmentsModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');
        helper("form");

        $student_id = esc($this->request->getPost('student_id'));

        $enrollment_data = [
            'enrollment_id'   => esc($this->request->getPost('enrollment_id')),
            'enrollment_code' => 'E-REG-'.$myTime->getTimestamp(),
            'enrollment_type' => 'REG',
            'academic_year'   => null,
            'semester'        => null,
            'isVerified'      => '0',
            'student_id'      => $student_id
        ];

        $e_model->save($enrollment_data);
        session()->setTempdata('success', 'A new enrollment code has been generated!', 1);
        return redirect()->back();
    }

    /**
     * update the student
     *
     * @return mixed
     */
    public function update()
    {
        $u_model = new UserModel();
        $s_model = new StudentModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');
        helper("form");

        $user_data = [
            'user_id'  => esc($this->request->getPost('user_id')),
            'username' => esc($this->request->getPost('uname')),
        ];

        if($this->request->getPost('pass')) {
            $user_data['password'] = password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT);
        }

        $u_model->save($user_data);

        $student_data = [
            'student_id' => esc($this->request->getPost('student_id')),
            'suser_no'   => $myTime->getTimestamp(), 
            'fname'      => esc($this->request->getPost('fname')), 
            'lname'      => esc($this->request->getPost('lname')),
            'class_id'   => esc($this->request->getPost('class')),
            'user_id'    => esc($this->request->getPost('user_id'))
        ];

        $s_model->save($student_data);
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
