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
        <div class="col-md-10 col-md-offset-1">
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
