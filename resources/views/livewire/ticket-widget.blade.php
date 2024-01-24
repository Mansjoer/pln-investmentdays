<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="me-1">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">{{ $tickets->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Total Tickets</p>
                    </div>
                    <div class="avatar">
                        <div class="avatar-initial bg-label-info rounded">
                            <div class="mdi mdi-ticket-confirmation-outline mdi-24px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="me-1">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">{{ $participants->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Total Participant</p>
                    </div>
                    <div class="avatar">
                        <div class="avatar-initial bg-label-primary rounded">
                            <div class="mdi mdi-account-outline mdi-24px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
