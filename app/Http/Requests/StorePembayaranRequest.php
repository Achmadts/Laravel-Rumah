<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembayaranRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'nisn' => 'required|exists:siswas,nisn',
            'tgl_bayar' => 'required|date',
            'bulan_dibayar' => 'required|max:9|regex:/^[a-zA-Z\s]+$/',
            'tahun_dibayar' => 'required|max:4',
            'id_spp' => 'required|exists:siswas,id_spp',
            'jumlah_bayar' => 'required|min:6|numeric',
        ];
    }
}
