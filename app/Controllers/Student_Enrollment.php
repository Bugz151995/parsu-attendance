<?php

namespace App\Controllers;

use App\Models\EnrollmentsModel;

class Student_Enrollment extends BaseController
{
    /**
     * update the student
     *
     * @return mixed
     */
    public function update()
    {
        helper("form");
        $uri = service('uri');
        $model = new EnrollmentsModel();
        $validation = \Config\Services::validation();

        if (!$this->validate($validation->getRuleGroup('enrollmentRules'))) {
            $data = [
                'page' => $uri->getSegment(1),
                'validation' => $this->validator
            ];
            return view('UI_Student/enrollment', $data);
        }

        $enrollment = [
            'enrollment_id' => session()->getFlashdata('enrollment_id'),
            'academic_year' => esc($this->request->getPost('ay')),
            'semester'      => esc($this->request->getPost('semester')),
            'isVerified'    => 1
        ];

        $model->save($enrollment);
        session()->setTempdata('info', 'Welcome Dear Student!', 1);
        return redirect()->to('home');
    }
}
