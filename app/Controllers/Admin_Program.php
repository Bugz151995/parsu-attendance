<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class Admin_Program extends BaseController
{
    /**
     * create a new program
     *
     * @return mixed
     */
    public function create()
    {
        $model = new ProgramModel();
        helper("form");

        $data = [
            'program'     => esc($this->request->getPost('program')),
            'description' => esc($this->request->getPost('description'))
        ];

        $model->insert($data);
        session()->setTempdata('success', 'A new data was successfully created!', 1);
        return redirect()->back();
    }

    /**
     * update the program
     *
     * @return mixed
     */
    public function update()
    {
        $model = new ProgramModel();
        helper("form");

        $data = [
            'program_id'  => esc($this->request->getPost('program_id')),
            'program'     => esc($this->request->getPost('program')),
            'description' => esc($this->request->getPost('description'))
        ];

        $model->save($data);
        session()->setTempdata('success', 'The data was successfully updated!', 1);
        return redirect()->back();
    }

    /**
     * delete a program
     *
     * @return mixed
     */
    public function delete()
    {
        $model = new ProgramModel();
        helper("form");

        $data = [
            'program_id' => esc($this->request->getVar('program_id')),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}