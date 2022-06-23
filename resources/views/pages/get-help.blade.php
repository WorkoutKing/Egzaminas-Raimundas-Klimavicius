@extends('main')
@section('content')
@include('_partials/errors')
<div class="container">
<form action="/storeHelp" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>GET HELP FROM WORKER </label>
        <input type="text" class="form-control" name="request" placeholder="What help you need...">
    </div>
    <button type="submit" class="btn btn-primary">Send Request</button>
  </form>
    <div class="row">
        <div class="col-md-12">
           <form action=""> 
            <div class="input-group">
            <select name="date" class="form-control">
                <option value="" selected disabled>--Sort by registration date--</option>
                <option value="asc">ANSWERED</option>
                <option value="desc">NOT ANSWERED</option>
            </select>
            <input type="submit" class="btn btn-primary" value="Search"/>
            </div>
        </form>
    </div>

  {{$data->links()}}
  <table class="table table-bordered table-responsive">
    <tr>
        <th>Status</th>
        <th>Request</th>
        <th>Answer</th>
        <th>Data</th>
    </tr>
    @foreach($data as $help)
        @if($help->status != 0)
        <tr style='color:green'>
            <th><i class="fa-solid fa-person-circle-check"></i></th>
            <th>{{$help->request}}</th>
            <th><a href="/get-help/{{ $help->id }}" style='color:green'>ANSWER</a></th>
            <th>{{$help->created_at->format('Y-m-d')}}</th>
        </tr>
        @else
        <tr style='color:grey'>
            <th><i class="fa-solid fa-lock"></i></th>
            <th>{{$help->request}}</th>
            <th><a href="/get-help" style='color:grey'>WAITING</a></th>
            <th>{{$help->created_at->format('Y-m-d')}}</th>
        </tr>
    @endif
    
    @endforeach
</table>

</div>
@endsection