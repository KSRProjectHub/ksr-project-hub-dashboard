@extends('layouts.appFront')

@section('content')
<section class="terms">
    <div class="term">
        {!! $terms->editor !!}
    </div>
    <p class="t">Read these terms <strong>carefully</strong> before handing over the project and if you have any problem regarding the terms&nbsp;<a href="contact" class="">Contact Us</a></p>
    <p>or</p>
    <p>Your can send your project details <a href="/details">click here..</a></p>
</section>
@endsection



