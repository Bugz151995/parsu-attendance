<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\ScheduleModel;
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
        $s_model = new ScheduleModel();
        $cs_model = new ClassScheduleModel();
        helper("form");

        $schedule_data = [
            'start_time' => esc($this->request->getPost('start_time')), 
            'end_time' => esc($this->request->getPost('end_time')), 
            'day' => esc($this->request->getPost('day')), 
            'room' => esc($this->request->getPost('room')), 
            'semester' => esc($this->request->getPost('semester')),  
            'academic_year' => esc($this->request->getPost('ay'))
        ];

        $schedule_id = $s_model->insert($schedule_data);

        $class_schedule_data = [
            'class_id' => esc($this->request->getPost('class')), 
            'course_id' => esc($this->request->getPost('course')), 
            'schedule_id' => $schedule_id, 
            'faculty_id' => esc($this->request->getPost('faculty'))
        ];

        $cs_model->insert($class_schedule_data);
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
        $model = new ScheduleModel();
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
     * delete a schedule
     *
     * @return mixed
     */
    public function delete($id)
    {
        $model = new ScheduleModel();
        helper("form");

        $data = [
            'class_id' => esc($id),
        ];

        $model->delete($data);
        session()->setTempdata('success', 'The data was successfully deleted!', 1);
        return redirect()->back();
    }
}
