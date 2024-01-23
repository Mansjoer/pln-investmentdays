<div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
    @if ($isSuccess)
        <div class="card col-lg-8 p-2">
            <div class="app-brand justify-content-center ">
                <a class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img src="https://i.imgur.com/FRLa22C.png" alt="" style="width: 150px">
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="mx-auto pt-0 pt-lg-0">
                    <div class="text-center mb-2">
                        <i class="mdi mdi-check-circle-outline mdi-48px text-success"></i>
                    </div>
                    <div class="text-center mt-0">
                        <h4><b>REGISTRATION COMPLETE</b></h4>
                    </div>
                    <div class="text-center mb-5">
                        <span><b>Thank you for registering on PLN Investment Days.</b></span>
                    </div>
                    <p class="text-center">
                        Your ticket has been sent to your email. Please check your inbox or spam/junk.
                    </p>
                    <br>
                    <p class="text-center">
                        For more information, please contact our
                        <br>
                        <b>Email :</b> <a href="mailto:investmentdays@pln.co.id">investmentdays@pln.co.id</a>
                        <br>
                        <b>Whatsapp :</b> <a href="https://api.whatsapp.com/send?phone=6285210068470" target="_blank">+62 852-1006-8470</a>
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="card col-lg-8 p-2">
            <div class="app-brand justify-content-center ">
                <a class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img src="https://i.imgur.com/FRLa22C.png" alt="" style="width: 150px">
                    </span>
                    {{-- <span class="app-brand-text demo text-heading fw-bold">Materialize</span> --}}
                </a>
            </div>
            <div class="card-body">
                <form id="formAuthentication" wire:submit.prevent="submit" spellcheck="false" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" placeholder="Enter your company" wire:model="company" />
                            @error('company')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">Job Title</label>
                            <input type="text" class="form-control @error('jobTitle') is-invalid @enderror" placeholder="Enter your job title" wire:model="jobTitle" />
                            @error('jobTitle')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="Enter your first name" wire:model="firstName" />
                            @error('firstName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" placeholder="Enter your last name" wire:model="lastName" />
                            @error('lastName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" wire:model="email" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Phone Number</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phoneInput" placeholder="Enter your phone number" wire:model="phone" />
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:loading.attr="disabled"><span wire:loading.remove>REGISTER</span> <span class="spinner-border" role="status" aria-hidden="true" wire:loading></span></button>
                </form>

            </div>
        </div>
    @endif
</div>
