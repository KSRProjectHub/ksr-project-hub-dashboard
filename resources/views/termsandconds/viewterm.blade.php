@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('userterms.index') }}">Terms and Conditions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('V')}}{{ $term->version }}</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container-fluid bg-light vh-100 p-5">
    {!! $term->editor !!}
</div>
@endsection