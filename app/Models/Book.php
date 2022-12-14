<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        //return $this->belongsTo(User::class);
        return $this->belongsTo(User::class)->withDefault(["name"=>"【該当者無し】"]);
    }
}
