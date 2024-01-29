@extends('admin.master')

@section('pageTitle')
    Participant Details
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-lg-9">
            <div class="card">
                @if ($reservation->participant->count() > 1)
                    @foreach ($reservation->participant as $participant)
                        <div class="card-body">
                            <h6>Participant {{ $loop->iteration }} Details:</h6>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>{{ $participant->firstName }} {{ $participant->lastName }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>{{ $participant->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone</b></td>
                                            <td>{{ $participant->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Company</b></td>
                                            <td>{{ $participant->company }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Job Title</b></td>
                                            <td>{{ $participant->jobTitle }}</td>
                                        </tr>
                                        @if ($participant->ticket)
                                            <tr>
                                                <td><b>Ticket Number</b></td>
                                                <td><a target="_blank" href="{{ route('app-ticket', $participant->ticket->code) }}">{{ $participant->ticket->code }}</a></td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td><b>Precense</b></td>
                                            @if ($participant->isComing == 1)
                                                <td><span class="badge bg-label-success">Present</span></td>
                                            @else
                                                <td><span class="badge bg-label-danger">Not Present</span></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card-body">
                        <h6>Participant Details:</h6>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{ $reservation->participant->firstName }} {{ $reservation->participant->lastName }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{{ $reservation->participant->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>{{ $reservation->participant->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Company</b></td>
                                        <td>{{ $reservation->participant->company }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Job Title</b></td>
                                        <td>{{ $reservation->participant->jobTitle }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Ticket</b></td>
                                        <td>{{ $reservation->participant->jobTitle }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Precense</b></td>
                                        @if ($reservation->participant->isComing == 1)
                                            <td><span class="badge bg-label-success">Present</span></td>
                                        @else
                                            <td><span class="badge bg-label-danger">Not Present</span></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @if ($reservation->isJoin == 1)
                    <hr>
                    <div class="card-body">
                        <h6>Bilateral Details:</h6>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><b>Topic of Interest</b></td>
                                        <td>
                                            @foreach ($reservation->topic as $topic)
                                                <span class="badge bg-label-primary">{{ $topic->name }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Potential collaboration opportunities</b></td>
                                        <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPotential">View</button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Project Credentials</b></td>
                                        <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalProject">View</button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Extra Information</b></td>
                                        <td>{{ $reservation->note }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @if ($reservation->hospitality)
                    <hr>
                    <div class="card-body">
                        <h6>Hospitality Contact Details:</h6>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{ $reservation->hospitality->firstName }} {{ $reservation->hospitality->lastName }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{{ $reservation->hospitality->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>{{ $reservation->hospitality->phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-outline-success d-grid w-100 waves-effect waves-light">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-check scaleX-n1-rtl me-1"></i>Approve</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPotential" tabindex="-1" aria-labelledby="modalPotential" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPotential">Potential collaboration opportunities</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    {!! $reservation->isPotential !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalProject" tabindex="-1" aria-labelledby="modalProject" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProject">Project Credentials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    {!! $reservation->projectFootprint !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
