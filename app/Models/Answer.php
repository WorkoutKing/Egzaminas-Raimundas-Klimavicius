<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserRequest;
use App\Models\User;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'user_id', 'user_request_id'];

    public function user_request(){
        return $this->belongsTo(UserRequest::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
