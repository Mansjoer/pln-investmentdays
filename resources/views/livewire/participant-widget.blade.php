<div class="row g-4 mb-4">
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
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="me-1">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">{{ $media->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Total Media</p>
                    </div>
                    <div class="avatar">
                        <div class="avatar-initial bg-label-info rounded">
                            <div class="mdi mdi-video-outline mdi-24px"></div>
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
                            <h4 class="mb-2 me-1 display-6">{{ $presents->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Total Present</p>
                    </div>
                    <div class="avatar">
                        <div class="avatar-initial bg-label-success rounded">
                            <div class="mdi mdi-check-outline mdi-24px"></div>
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
                            <h4 class="mb-2 me-1 display-6">{{ $notPresents->count() }} </h4>
                            {{-- <p class="text-success mb-2">(+29%)</p> --}}
                        </div>
                        <p class="mb-0">Total Not Present</p>
                    </div>
                    <div class="avatar">
                        <div class="avatar-initial bg-label-danger rounded">
                            <div class="mdi mdi-close-outline mdi-24px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
