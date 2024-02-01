@extends('admin.master')

@section('title')
    Email Blasting
@endsection

@section('content')
    @livewire('email-table')
@endsection

@section('cscript')
    <script>
        window.addEventListener('closeModal', () => {
            $('#importModal').modal('hide');
        });
    </script>
@endsection
