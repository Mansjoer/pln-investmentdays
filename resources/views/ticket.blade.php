@extends('master')

@section('content')
    <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                            <div class="mb-xl-0 pb-3">
                                <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
                                    <span class="app-brand-logo demo">
                                        <img src="https://i.imgur.com/FRLa22C.png" alt="" style="width: 150px">
                                    </span>
                                </div>
                                <h4 class="mb-0"><b>PLN Investment Days 2024</b></h4>
                                <h6 class="text-muted mb-0"><b>27 - 29 February 2024</b></h6>
                                <h6 class="text-muted"><b>Mulia Rosert Nusa Dua, Bali, Indonesia</b></h6>
                            </div>
                            <div class="text-center">
                                <span class="card-img-top">{!! QrCode::size(150)->generate($ticket->code) !!}</span>
                                <p class=""><b>{{ $ticket->code }}</b></p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                        <img class="img-fluid" src="https://i.imgur.com/JyG8ej0.jpeg" alt="">
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <h6>Ticket Information:</h6>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{ $ticket->participant->firstName }} {{ $ticket->participant->lastName }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{{ $ticket->participant->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>{{ $ticket->participant->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Company</b></td>
                                        <td>{{ $ticket->participant->company }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-medium text-heading">Note:</span>
                                <span>Note here</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <div class="card d-none d-lg-flex">
                    <div class="card-body">
                        <button class="btn btn-outline-danger d-grid w-100 mb-3 waves-effect">Download</button>
                        <button class="btn btn-outline-success d-grid w-100 mb-3 waves-effect" onclick="window.print()">
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
