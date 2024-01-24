@extends('admin.master')

@section('pageTitle')
    Participants
@endsection

@section('content')
    @livewire('participant-widget')
    @livewire('participant-table')
@endsection

@section('cscript')
    <script></script>
@endsection
