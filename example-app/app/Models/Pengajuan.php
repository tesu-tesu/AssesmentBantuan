<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    
    protected $table = 'pengajuans';

    public function lembagas(){
        return $this->belongsTo(Lembaga::class, 'id_lembaga');
    }

    public function lembagas_(){
        return $this->belongsTo(Lembaga::class, 'id_lembaga');
    }

    public function users(){
        return $this->belongsTo(Users::class, 'id_user');
    }

    public function users_(){
        return $this->belongsTo(Users::class, 'id_user');
    }
}
