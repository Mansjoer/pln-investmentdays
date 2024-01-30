<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="me-1">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">{{ $reservations->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Total Reservation</p>
                    </div>
                    <div class="avatar">
                        <div class="avatar-initial bg-label-dark rounded">
                            <div class="mdi mdi-email-heart-outline mdi-24px"></div>
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
                        <p class="mb-0">Total Guest</p>
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
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="me-1">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">{{ $isBilaterals->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Accepted For Bilateral</p>
                    </div>
                    <a role="button">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded">
                                <div class="mdi mdi-check-outline mdi-24px"></div>
                            </div>
                        </div>
                    </a>
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
                            <h4 class="mb-2 me-1 display-6">{{ $isNotBilaterals->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Declined For Bilateral</p>
                    </div>
                    <a role="button">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-danger rounded">
                                <div class="mdi mdi-close-outline mdi-24px"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
