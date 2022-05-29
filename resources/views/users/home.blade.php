@extends('layouts.app2')

@section('content')
<div class="container">
    <h3>{{ __('Successfully Registerd') }}</h3>
    <p>{{ 'Welcome '. Auth::user()->fname }}</p>
</div>
@endsection