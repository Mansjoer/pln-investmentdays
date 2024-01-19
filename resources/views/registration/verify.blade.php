@extends('master')

@section('content')
    <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
        <div class="card col-8 p-2">
            <div class="app-brand justify-content-center ">
                <a class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img src="https://i.imgur.com/FRLa22C.png" alt="" style="width: 150px">
                    </span>
                    {{-- <span class="app-brand-text demo text-heading fw-bold">Materialize</span> --}}
                </a>
            </div>
            <div class="card-body">
                <div class="w-px-400 mx-auto pt-5 pt-lg-0">
                    <div class="text-center mb-2">
                        <i class="mdi mdi-check-circle-outline mdi-48px text-success"></i>
                    </div>
                    <div class="text-center mt-0">
                        <h4><b>SEE YOU SOON!</b></h4>
                    </div>
                    <div class="text-center mb-5">
                        <span><b>Thank you for participating on PLN Investment Day. </b></span>
                        <p><b>Generating Ticket.</b></p>
                    </div>
                    <p class="text-center">
                        You should be automatically redirected in <span id="countdown"></span> seconds.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cscript')
    <script>
        var seconds = 3;
        var foo;

        function redirect() {
            document.location.href = 'https://investment-day.pln.test/ticket/{{ $ticket->code }}';
        };

        function updateSecs() {
            document.getElementById("countdown").innerHTML = seconds;
            seconds--;
            if (seconds == -1) {
                clearInterval(foo);
                redirect();
            }
        }

        function countdownTimer() {
            foo = setInterval(function() {
                updateSecs()
            }, 1000);
        }

        countdownTimer();
    </script>
@endsection
