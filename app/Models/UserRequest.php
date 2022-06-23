<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class UserRequest extends Model
{
    use HasFactory;
    protected $fillable = ['request'];

    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
