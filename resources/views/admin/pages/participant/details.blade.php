@extends('admin.master')

@section('pageTitle')
    Participant Details
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h6>Participant Details:</h6>
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
                <hr class="my-0">
                <div class="card-body">
                    <h6>Zone Accessibility:</h6>
                    <div class="text-center">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Exhibition</th>
                                        <th>Plenary</th>
                                        <th>Bilateral</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if ($participant->ticket)
                                        <tr class="text-center">
                                            <td class="text-success"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                                            @if ($ticket->zone->isPlenary == 1)
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
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                This participant doesn't have ticket.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-outline-success d-grid w-100 waves-effect waves-light">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-check me-1"></i>Allow Participant</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
