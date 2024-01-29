@extends('admin.master')

@section('pageTitle')
    Reservations
@endsection

@section('content')
    @livewire('reservation-widget')
    @livewire('reservation-table')
@endsection
