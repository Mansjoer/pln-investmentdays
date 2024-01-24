@extends('admin.master')

@section('pageTitle')
    Tickets
@endsection

@section('content')
    @livewire('ticket-widget')
    @livewire('ticket-table')
@endsection
