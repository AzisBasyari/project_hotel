<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservasiRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'jumlah_kamar' => 'required',
            'total_harga' => 'required',
            'kamar_id' => 'required',
        ];
    }
}
