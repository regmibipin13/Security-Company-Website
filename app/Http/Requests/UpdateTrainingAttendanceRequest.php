<?php

namespace App\Http\Requests;

use App\Models\TrainingAttendance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrainingAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('training_attendance_edit');
    }

    public function rules()
    {
        return [
            'employee_id' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
