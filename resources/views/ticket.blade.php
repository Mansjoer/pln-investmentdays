@extends('master')

@section('content')
    <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-1">
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
                    <div class="d-flex align-items-center justify-content-center mt-0 mb-0">
                        <img class="img-fluid" src="https://i.imgur.com/JyG8ej0.jpeg" alt="">
                    </div>
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
                                    <tr>
                                        <td><b>Job Title</b></td>
                                        <td>{{ $ticket->participant->jobTitle }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <h6>Zone Accessibility :</h6>
                        <div class="text-center">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Exhibition</th>
                                            <th>Plenary</th>
                                            <th>Bilateral</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr class="text-center">
                                            <td class="text-success"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                                            @if ($ticket->zone->isPlanery == 1)
                                                <td class="text-success"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                                            @else
                                                <td class="text-danger"><i class="mdi mdi-close-circle mdi-20px"></i></td>
                                            @endif
                                            @if ($ticket->zone->isBilateral == 1)
                                                <td class="text-success"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                                            @else
                                                <td class="text-danger"><i class="mdi mdi-close-circle mdi-20px"></i></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if ($ticket->participant->reservation && $ticket->participant->reservation->isJoin == 1)
                        <hr class="my-0">
                        <div class="card-body">
                            <h6>Notes:</h6>
                            <div class="row">
                                <div class="col-12">
                                    <p>We will announce your spot for 1-1 Bilateral Business Meeting on <b>16 February 2024</b></p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr class="my-0">
                    <div class="card-body">
                        <p>For more information, you can contact our email : <a href="mailto:investmentdays@pln.co.id"> investmentdays@pln.co.id </a> or whatsApp: <a href="https://api.whatsapp.com/send?phone=6285210068470">+62 852-1006-8470.</a></p>
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
