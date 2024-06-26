<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelases extends Model
{
    use HasFactory;
    protected $table = 'kelases';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ["nama_kelas", "kompetensi_keahlian"];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
