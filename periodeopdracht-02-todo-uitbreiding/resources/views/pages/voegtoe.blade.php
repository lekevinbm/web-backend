@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Voeg een TODO-item toe</div>

                <div class="panel-body">
                    <a href="{{ action ('Controller@todo')}}">Terug naar mijn TODO's</a>
    
    

    {!! Form::open(array('route' => 'store'))!!}

        
        <div class="form-group">
            {!! Form::label('item','Wat moet er gedaan worden?')!!}
            
            {!! Form::text('item',null,['class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Voeg item toe',['class' => 'btn btn-primary form-control'])!!}
           
        </div>
    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>    

        
@stop