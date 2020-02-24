<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nama'];
    public $timestamps = true;
    public function Mahasiswa() {
        return  $this->hasMany('App\Mahasiswa' , 'id_dosen');
    }
}
