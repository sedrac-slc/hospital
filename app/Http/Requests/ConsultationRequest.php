<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'patient_id' => ['required'],
            'employee_id' => ['required'],
            'consultation_type_id' => ['required'],
            'price' => ['required'],
            'marking_at' => ['required'],
        ];
    }
}
