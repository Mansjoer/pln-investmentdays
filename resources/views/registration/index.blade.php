@extends('master')

@section('title')
    Registration
@endsection

@section('content')
    @livewire('register-form')
@endsection

@section('cscript')
    <script>
        new Cleave("#phoneInput", {
            phone: true,
        });
    </script>
@endsection
