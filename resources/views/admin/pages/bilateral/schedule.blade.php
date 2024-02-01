@extends('admin.master')

@section('pageTitle')
    Bilateral Schedule
@endsection

@section('content')
    @livewire('bilateral-schedule-table')
@endsection

@section('cscript')
    <script>
        window.addEventListener('closeModal', () => {
            $('#addScheduleModal').modal('hide');
        });

        var flatpickrDateTime = document.querySelector("#date");

        flatpickrDateTime.flatpickr({
            enableTime: true,
            altInput: true,
            time_24hr: true,
            altFormat: 'D, j F Y H:i',
            dateFormat: "Y-m-d H:i"
        });
    </script>
@endsection
