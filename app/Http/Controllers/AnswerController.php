<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRequest;


class AnswerController extends Controller
{
    public function create(UserRequest $user_request)
    {
        Answer::create([
            'body'=>request('body'),
            'user_request_id'=> $user_request->id,
            'user_id'=>Auth::id()
        ]);
        return redirect()->back();
    }
}
