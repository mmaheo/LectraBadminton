@extends('layout')

@section('title')
    Modification du n° {{ $court }}
@stop

@section('content')
    @include('court.form')
@stop