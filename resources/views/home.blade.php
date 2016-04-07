@extends('layouts.app')
<style type="text/css">
        .punch{
            margin: 5px;
        }
</style>

@section('content')
@if(Auth::check())

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                
                <div class="flash-message">
                 
                      @if(Session::has('warning'))

                      <p class="alert alert-warning">{{ Session::get('warning') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                  
                  </div>


                <form method="POST" role="form" action="{{url('/punch')}}">
                {{ csrf_field() }}
                <textarea class="form-control" rows="3" name="punch_note"></textarea>
                   <button type="submit" class="btn btn-success punch">Punch In</button>
                </form>
                </div>
            </div>
    </div>
</div>
   
<div class="container">
<div class="row">

<div class="bs-example" data-example-id="bordered-table"> 
<table class="table table-bordered"> 
<thead> 
  <tr> 
    <th>S.N</th> 
    <th>Date</th> 
    <th>Day</th> 
    <th>Punched In</th> 
    <th>Punched Out</th> 
    <th>Total Minutes</th>
    <th>Notes</th>
  </tr> 
</thead> 
    <tbody>
    @if($data)
    @foreach($data as $dt) 
      <tr> 
        <td>1</td>  
        <td>{{$dt->punch_date}}</td>
        <td>{{$dt->marked_day}}</td>
        <td>{{$dt->punch_in}}</td>
        <td>{{$dt->punch_out}}</td>
        <td>{{$dt->total_hours}}</td>
        <td>{{$dt->punch_note}}</td>
      </tr> 
    @endforeach
  @endif
   </tbody> 
</table> 
    

</div>

</div>
</div>

@else
<div class="container">
<div class="jumbotron">
  <h1>Icarus Solutions HRM SYSTEM</h1>
   <p><a class="btn btn-primary btn-lg" href="{{url('/login')}}" role="button">Login</a></p>
</div>
</div>
@endif
@endsection
