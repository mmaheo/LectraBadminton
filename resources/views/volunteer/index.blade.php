@extends('layout')

@section('title')
    Gestion du set
@stop

@section('content')

    <h1 class="text-center">Gestion du set de la section </h1>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">
                Les personnes qui s’en occupent le plus souvent sont :
            </h2>
            <div class="row">

            </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                @foreach($biggestVolunteers as $index => $people)     
                                    <div class="text-center">          
                                        {{ $people->user->forname }} {{ $people->user->name }} : {{ $people->count }} fois
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <h1 class="text-center">Historique (30 derniers)</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped reservation">
            <thead>
            <tr>
                <th rowspan="1" class="text-center">Date</th>
                <th rowspan="1" class="text-center">Mis à jour le</th>
                <th class="text-center">Volontaire</th>
            </tr>
            </thead>

            <tbody>
            @foreach($latestVolunteers as $index => $people) 
                @if ($people[1] == 'Personne')
                    <tr class="text-left text-danger">
                        <td rowspan="1">
                            <strong>{{ $people[0] }}</strong>
                        </td>
                        <td>
                            <strong>{{ $people[2] }}</strong>
                        </td>
                        <td>
                            <strong>{{ $people[1] }}</strong>
                        </td>
                    </tr>
                @else
                    <tr class="text-left">
                        <td rowspan="1">
                            {{ $people[0] }}
                        </td>
                        <td>
                            {{ $people[2] }}
                        </td>
                        <td>
                            {{ $people[1] }}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@stop