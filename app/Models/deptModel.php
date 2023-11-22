<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deptModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_departement', 'nama_departement', 'desc_departement'];
    protected $table = 'departement';
    protected $primaryKey = 'id_departement';
    public $timestamps = true;
}
