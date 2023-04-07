<?php
use Illuminate\Support\Carbon;
?>
@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('update_user') }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <h1>Личный кабинет</h1>
        <p><input type="text" name="id" value="{{ auth()->user()->id}}"></p>
        <p><input type="text" name="name" value="{{ auth()->user()->name}}"></p>
        <p><input type="text" name="year_of_birth" value="{{auth()->user()->year_of_birth }}"></p>
        <p>{{Carbon::parse(auth()->user()->year_of_birth)->diffInYears()}}</p>
        <p><input type="text" name="email" value="{{auth()->user()->email}}"></p>
        <p><input type="file" name="avatar"></p>
        <img src="storage/{{auth()->user()->avatar}}" alt="avatar">
        <p><input type="submit"></p>
    </form>
@endsection
