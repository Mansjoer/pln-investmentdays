@extends('admin.master')

@section('title')
    Users List
@endsection

@section('content')
    @livewire('user-table')
@endsection

@section('cscript')
    <script>
        window.addEventListener('closeModal', () => {
            $('#addUserModal').modal('hide');
        });
    </script>
@endsection
