<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:255|alpha_num',
            'email' => 'required|email',
            'texte' => 'required|max:255|alpha_num',
            'EventName' => 'max:255|alpha_num',
            'EventAddr' => 'alpha_num',
            'EventBeginDate' => 'date_format:d/m/Y|after:today',
            'EventEndDate' => 'date_format:d/m/Y|after:EventBeginDate',
            'EventPicture' => 'image'
        ];
    }
}
