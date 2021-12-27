<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\ClassScheduleModel;

class Admin_Schedule extends BaseController
{
    /**
     * create a new schedule
     *
     * @return mixed
     */
    public function create()
    {
        $model = new ClassScheduleModel();
        helper("form");

        $data = [
            'start_time'    => esc($this->request->getPost('start_time')), 
            'end_time'      => esc($this->request->getPost('end_time')), 
            'day'           => esc($this->request->getPost('day')), 
            'room'          => esc($this->request->getPost('room')), 
            'semester'      => esc($this->request->getPost('semester')),  
            'academic_year' => esc($this->request->getPost('ay')),
            'class_id'      => esc($this->request->getPost('class')), 
            'course_id'     => esc($this->request->getPost('course')),
            'faculty_id'    => esc($this->request->getPost('faculty'))
        ];

        $model->insert($data);
        session()->setTempdata('success', 'A new data successfully created!', 1);
        return redirect()->back();
    }

    /**
     * update the schedule
     *
     * @return mixed
     */
    public function update()
    {
        $model = new ClassScheduleModel();
        helper("form");

        $data = [
            'class_schedule_id' => esc($this->request->getPost('class_schedule_id')), 
            'start_time'        => esc($this->request->getPost('start_time')), 
            'end_time'          => esc($this->request->getPost('end_time')), 
            'day'               => esc($this->request->getPost('day')), 
            'room'              => esc($this->request->getPost('room')), 
            'semester'          => esc($this->request->getPost('semester')),  
            'academic_year'     => esc($this->request->getPost('ay')),
            'course_id'         => esc($this->request->getPost('course')),
            'class_id'          => esc($this->request->getPost('class')),
            'faculty_id'        => esc($this->request->getPost('faculty'))
        ];

        $model->save($data);
        session()->setTempdata('success', 'The data was successfully updated!', 1);
        return redirect()->back();
    }

    /**
     * delete a schedule
     *
     * @return mixed
     */
    public function delete()
    {
        $model = new ClassScheduleModel();
        helper("form");

        $data = [
            'class_schedule_id' => esc($this->request->getPost('class_schedule_id')),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}
