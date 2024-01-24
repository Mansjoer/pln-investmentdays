@extends('admin.master')

@section('pageTitle')
    Participant Details
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {{ $participant->ticket->zone }}
        </div>
    </div>
@endsection
