@extends('main')
@section('content')
@include('_partials/errors')
<div class="container">
    <h2 class="mt-4">HELP REQUEST</h2>
        <div class="card" style="width: 30rem;">
            <div class="card-body" >
                <div style="color: darkgreen">
                @if($user_request->helped == 1)
                    <p class="card-text">QUESTION: SOLWED</p>
                @else
                    <p class="card-text">QUESTION: UNSOLWED</p>
                @endif
                <p class="card-text">Problem name: {{$user_request->request}}</p>
                <p class="card-text">Created at: {{$user_request->created_at}}</p>
                <p class="card-text"></p>
                        @if(count($user_request->answer))
                            <div style="color:RED">
                                <h3>ANSWER</h3>
                                    @foreach($user_request->answer as $answer)
                                        {{$answer->user->name}}(worker):
                                        {{$answer->body}}
                                
                                    @endforeach
                            </div>
                        @endif
                </div>
            </div>
        </div>
        @if($user_request->helped == 0 && Auth::check()== '')
        <form action="/updateHelped/{{ $user_request->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-none">
                <input type="text" class="form-control" name="helped" placeholder="helped" value="1">
              </div>
            <button type="submit" class="btn btn-primary" >HELPED</button>
        </form>
        @endif
        @if(Auth::check())
        <form action="/update/{{$user_request->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-none">
                <input type="text" class="form-control" name="status" placeholder="status" value="1">
              </div>
            <button type="submit" class="btn btn-primary" >UPDATE STATUS</button>
        </form>
        <form action="/get-help/{{$user_request->id}}/answer" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="answer"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ANSWER</button>
            </div>
        </form>
        @endif

</div>
    </div>
</div>
@endsection