<?php

namespace App\Controllers;

use App\Models\ClassModel;

class Admin_Class extends BaseController
{
    /**
     * create a new class
     *
     * @return mixed
     */
    public function create()
    {
        $model = new ClassModel();
        helper("form");

        $data = [
            'program_id' => esc($this->request->getPost('program')),
            'level'      => esc($this->request->getPost('level')),
            'section'    => esc($this->request->getPost('section'))
        ];

        $model->insert($data);
        session()->setTempdata('success', 'A new data successfully created!', 1);
        return redirect()->back();
    }

    /**
     * update the class
     *
     * @return mixed
     */
    public function update()
    {
        $model = new ClassModel();
        helper("form");

        $data = [
            'class_id'   => esc($this->request->getPost('class_id')),
            'program_id' => esc($this->request->getPost('program')),
            'level'      => esc($this->request->getPost('level')),
            'section'    => esc($this->request->getPost('section'))
        ];

        $model->save($data);
        session()->setTempdata('success', 'The data was successfully updated!', 1);
        return redirect()->back();
    }

    /**
     * delete a class
     *
     * @return mixed
     */
    public function delete($id)
    {
        $model = new ClassModel();
        helper("form");

        $data = [
            'class_id' => esc($id),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}
