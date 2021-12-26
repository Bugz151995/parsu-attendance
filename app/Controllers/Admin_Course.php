<?php

namespace App\Controllers;

use App\Models\CourseModel;

class Admin_Course extends BaseController
{
    /**
     * create a new course
     *
     * @return mixed
     */
    public function create()
    {
        $model = new CourseModel();
        helper("form");

        $data = [
            'course'      => esc($this->request->getPost('course')),
            'description' => esc($this->request->getPost('description'))
        ];

        $model->insert($data);
        session()->setTempdata('success', 'A new data successfully created!', 1);
        return redirect()->back();
    }

    /**
     * update the course
     *
     * @return mixed
     */
    public function update()
    {
        $model = new CourseModel();
        helper("form");

        $data = [
            'course_id'   => esc($this->request->getPost('course_id')),
            'course'      => esc($this->request->getPost('course')),
            'description' => esc($this->request->getPost('description'))
        ];

        $model->save($data);
        session()->setTempdata('success', 'The data was successfully updated!', 1);
        return redirect()->back();
    }

    /**
     * delete a course
     *
     * @return mixed
     */
    public function delete()
    {
        $model = new CourseModel();
        helper("form");

        $data = [
            'course_id' => esc($this->request->getPost('course_id')),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}
