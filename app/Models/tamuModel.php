<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class tamuModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_tamu', 'nama', 'notelp', 'dept', 'tujuan', 'jadwal', 'sendTo', 'status'];
    protected $table = 'bukutamu';
    protected $primaryKey = 'id_tamu';
    public $timestamps = true;
    public function tamu(){

    }
}
