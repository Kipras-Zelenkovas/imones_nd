<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name', 'code', 'pvm_code', 'adress', 'telephone', 
                           'email', 'CEO', 'users_id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(Users::class);
    }
}
