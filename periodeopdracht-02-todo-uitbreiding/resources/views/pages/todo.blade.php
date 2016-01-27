@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">De TODO-app</div>

                <div class="panel-body">
                    <h2>Wat moet er allemaal gebeuren?</h2>

    @if(($doneTodos->count() == 0)&&($notDoneTodos->count() == 0)  )
        <p>Nog geen todo-items.</p>
        <a href="{{ action ('Controller@voegtoe')}}">Voeg item toe</a>
    @else

        <a href="{{ action ('Controller@voegtoe')}}">Voeg item toe</a>

        <h3>Todo</h3>
        <ul>
            @if($notDoneTodos->count() != 0)        
                @foreach ($notDoneTodos as $notDoneTodo)
                    <li>
                        <a href="{{ action ('Controller@changeToDone',[$notDoneTodo->id]) }}">Done!</a>
                        <a href="{{ action ('Controller@delete',[$notDoneTodo->id]) }}">delete</a>
                        <p>
                        {{$notDoneTodo->item}}</p>
                    </li>
                @endforeach
            @else
                <p>Allright, all done!</p>
            @endif
        </ul>

        <h3>Done</h3>
        <ul>
            @if($doneTodos->count() != 0)
                @foreach ($doneTodos as $doneTodo)
                        <li>
                            <a href="{{ action ('Controller@changeToNotDone',[$doneTodo->id]) }}">XUndone</a>
                            <a href="{{ action ('Controller@delete',[$doneTodo->id]) }}">delete</a>
                            <p>{{$doneTodo->item}}</p>
                        </li>
                @endforeach
            @else
                <p>Damn, werk aan de winkel...</p>
            @endif

        </ul>
                </div>
            </div>
        </div>
    </div>
</div>    


    <h1></h1>
    
    
    @endif




@stop