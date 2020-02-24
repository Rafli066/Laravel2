<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $fillable = ['nama' , 'id_mahasiswa'];
    public $timestamps = true;
    public function Mahasiswa() {
        return $this->belongTo('App\Mahasiswa' , 'id_mahasiswa');
    }
}
