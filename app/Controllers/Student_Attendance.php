<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\AttendanceModel;

class Student_Attendance extends BaseController
{
    /**
     * time in  to the subject
     *
     * @return mixed
     */
    public function timein()
    {
        helper("form");
        $model = new AttendanceModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');

        $timeIn = date('H:i:s', strtotime($myTime));
        $startTime = esc($this->request->getPost('start_time'));
        $lateTimePoint = date('H:i:s', strtotime(`$startTime + 5 minute`));

        if ($timeIn > $lateTimePoint) {
            $status = "L";
        } else {
            $status = "P";
        }

        $data = [
            'class_schedule_id' => esc($this->request->getPost('class_schedule_id')),
            'time_in'           => $timeIn,
            'time_out'          => null,
            'status'            => $status,
            'student_id'        => session()->get('student_id')
        ];

        $model->insert($data);
        session()->setTempdata('success', 'You have successfully logged your time in!', 1);
        return redirect()->back();
    }

    /**
     * time out to the subject
     */
    public function timeout()
    {
        helper("form");
        $model = new AttendanceModel();
        $myTime = new Time('now', 'Asia/Manila', 'en_US');

        $timeIn = date('H:i:s', strtotime($myTime));
        $endTime = esc($this->request->getPost('end_time'));
        $timeOutPoint = date('H:i:s', strtotime(`$endTime - 15 minute`));

        if ($timeIn < $timeOutPoint) {
            session()->setTempdata('warning', 'The time out is not yet available! Try again later.', 1);
            return redirect()->back();
        } 

        $data = [
            'student_attendance_id' => esc($this->request->getPost('student_attendance_id')),
            'time_out'              => $timeIn,
            'student_id'            => session()->get('student_id')
        ];

        $model->save($data);
        session()->setTempdata('success', 'You have successfully logged your time out!', 1);
        return redirect()->back();
    }
}
