@extends('layouts.app')
<style type="text/css">
        .punch{
            margin: 5px;
        }

</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                    <div class="flash-message">
                     
                          @if(Session::has('warning'))

                          <p class="alert alert-warning">{{ Session::get('warning') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                      
                      </div>
                <div class="panel-body">
                <h4>Your punch in time: 
                <span class="bg-primary">
                <?php  $data = DB::table('records')->where('user_id',Auth::id())->where('punch_date',date("Y-m-d"))->select('punch_in')->first();
                  echo $data->punch_in;
                ?> 
                </span>
                </h4> 
                <form method="" role="form" action="{{url('/punchout')}}">
                {{ csrf_field() }}
                   <button type="submit" class="btn btn-success punch">Punch out</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
