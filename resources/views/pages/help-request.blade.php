@extends('main')
@section('content')
@include('_partials/errors')
<div class="container">
  {{$user_request->links()}}
  <table class="table table-bordered table-responsive">
    <tr>
        <th>Request ID</th>
        <th>Request</th>
        <th>Data</th>
        <th>Answer</th>
    </tr>
    @foreach($user_request as $help)
        <tr style='color:green'>
            <th>{{$help->id}}</th>
            <th>{{$help->request}}</th>
            <th>{{$help->created_at->format('Y-m-d')}}</th>
            <th><a href="/get-help/{{ $help->id }}" style='color:green'>ANSWER</a></th>
        </tr>
    @endforeach
</table>

</div>
@endsection