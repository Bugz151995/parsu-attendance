<?php

namespace App\Controllers;

use App\Models\FacultyModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Admin_Faculty extends BaseController
{
    /**
     * create a new faculty
     *
     * @return mixed
     */
    public function create()
    {
        $u_model = new UserModel();
        $f_model = new FacultyModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');
        helper("form");

        $user_data = [
            'username' => esc($this->request->getPost('uname')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => '2'
        ];

        $user_id = $u_model->insert($user_data);

        $faculty_data = [
            'fuser_no' => $myTime->getTimestamp(), 
            'fname' => esc($this->request->getPost('fname')), 
            'lname' => esc($this->request->getPost('lname')),
            'user_id' => $user_id
        ];

        $f_model->insert($faculty_data);
        session()->setTempdata('success', 'A new data successfully created!', 1);
        return redirect()->back();
    }

    /**
     * update the faculty
     *
     * @return mixed
     */
    public function update()
    {
        $u_model = new UserModel();
        $f_model = new FacultyModel();
        helper("form");

        $user_data = [
            'user_id'  => esc($this->request->getPost('user_id')),
            'username' => esc($this->request->getPost('uname')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => '2'
        ];

        $u_model->save($user_data);

        $faculty_data = [
            'faculty_id' => esc($this->request->getPost('faculty_id')),
            'fname'      => esc($this->request->getPost('fname')), 
            'lname'      => esc($this->request->getPost('lname')),
            'user_id'    => esc($this->request->getPost('user_id'))
        ];

        $f_model->save($faculty_data);
        session()->setTempdata('success', 'The data was successfully updated!', 1);
        return redirect()->back();
    }

    /**
     * delete a faculty
     *
     * @return mixed
     */
    public function delete()
    {
        $model = new FacultyModel();
        helper("form");

        $data = [
            'faculty_id' => esc($this->request->getPost('faculty_id')),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}
