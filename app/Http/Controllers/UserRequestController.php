<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserRequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index','storeHelp','allRequest','showRequest','updateRequestHelped']]);
    }

    public function index(){
        return view ('pages.get-help');
    }
    
    public function storeHelp(Request $request){
        $validated = $request->validate([
            'request' => 'required|min:8|max:255',
        ]);

        UserRequest::create([
            'request'=>request('request'),
        ]);
        return redirect('/get-help');
    }

    public function allRequest(Request $request){
        $search = $request->input('q');
        if($search!="" || $request->company || $request->date){
            $user_request = UserRequest::where(function ($query) use ($search){
                $query->where('request', 'like', '%'.$search.'%');
            })->when($request->company, function($query, $company){
                return $query->where('id', 'like', '%'.$company.'%');
            })->when($request->date, function($query, $date){
                return $query->orderBy('status', $date);
            })->paginate(10);
            $user_request->appends(['q' =>$search]);
        }
        else{
            $user_request = UserRequest::paginate(6);
        }
        //$user_request = UserRequest::paginate(10);
        return view ('pages.get-help')->with('data', $user_request);
    }

    public function showRequest(UserRequest $user_request){
        return view('pages.show-request', compact('user_request'));
    }

    public function helpRequest(Request $request){
        $user_request = UserRequest::paginate(10);
        return view ('pages.help-request', compact('user_request'));
    }

    public function updateRequest(UserRequest $user_request, Request $request){
        UserRequest::where('id', $user_request->id)->update($request->only(['status']));
        return redirect('/get-help/'.$user_request->id);
    }
    public function updateRequestHelped(UserRequest $user_request, Request $request){
        UserRequest::where('id', $user_request->id)->update($request->only(['helped']));
        return redirect('/get-help/'.$user_request->id);

    }
}
