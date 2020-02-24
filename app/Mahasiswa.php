<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama' , 'nim' , 'id_dosen'];
    public $timestamps = true;
    public function Wali() {
        return $this->hasone('App\Wali' , 'id_mahasiswa');
    }

    public function Dosen() {
        return $this->belongsTo('App\Dosen' , 'id_dosen');
    }

    public function Hobi() {
        return $this->belongsTomany('App\Hobi' , 'mahasiswa_hobi' , 'id_mahasiswa' , 'id_hobi');
    }
}
