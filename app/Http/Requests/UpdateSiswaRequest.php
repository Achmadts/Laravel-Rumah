<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nisn' => 'required|min:10|numeric',
            'nis' => 'required|min:10|numeric',
            'nama' => 'required|min:6|max:35|regex:/^[a-zA-Z\s]+$/',
            'id_kelas' => 'required|exists:kelases,id_kelas',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|min:11|numeric',
            'id_spp' => 'required|exists:spps,id_spp',
        ];
    }
}
