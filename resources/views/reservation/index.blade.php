@extends('master')

@section('title')
    Reservations
@endsection

@section('content')
    @livewire('reservation-form')
    <!-- Modal -->
@endsection

@section('cscript')
    <script>
        new Cleave("#phoneInput", {
            phone: true,
        });
    </script>
@endsection
