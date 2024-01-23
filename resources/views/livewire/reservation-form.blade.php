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
                        <h4><b>RESERVATION COMPLETE</b></h4>
                    </div>
                    <div class="text-center mb-5">
                        <span><b>Thank you for your confirmation on PLN Investment Days</b></span>
                        <br>
                        @if ($isJoin == 1)
                            We will announce your spot for 1-1 Bilateral Business Meeting on
                            <br>
                            <b>16 February 2024</b>
                        @endif
                    </div>
                    <p class="text-center">
                        @if ($isComing == 1)
                            Your ticket has been sent to your email. Please check your inbox or spam/junk.
                        @endif
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
                        <img src="https://i.imgur.com/FRLa22C.png" style="width: 150px">
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="{{ $currentStep != 1 ? 'd-none' : '' }}">
                    <div class="row mb-3">
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon" wire:ignore.self>
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                    <span class="custom-option-body">
                                        <i class="mdi mdi-account-outline"></i>
                                        <span class="custom-option-title">Participant</span>
                                        <small> Register as a participant.</small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input @error('isMedia') is-invalid @enderror" type="radio" value="0" wire:model.live="isMedia" id="customRadioIcon1" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-icon" wire:ignore.self>
                                <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                    <span class="custom-option-body">
                                        <i class="mdi mdi-video-outline"></i>
                                        <span class="custom-option-title"> Media </span>
                                        <small> Register as a media. </small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input @error('isMedia') is-invalid @enderror" type="radio" value="1" wire:model.live="isMedia" id="customRadioIcon2" />
                                </label>
                            </div>
                        </div>
                    </div>
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
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="Enter your first name" wire:model.live="firstName" />
                            @error('firstName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" placeholder="Enter your last name" wire:model.live="lastName" />
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
                    <div class="mb-3">
                        <label for="isComing" class="form-label">Will you be attending PLN Investment Days?</label>
                        <select id="isComing" class="form-select @error('isComing') is-invalid @enderror" wire:model.live="isComing">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('isComing')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 {{ $isComing == 0 ? 'd-none' : '' }}">
                        <label for="selectAccompany" class="form-label text-nowrap d-inline-flex position-relative me-3">This invitation is valid for 2 people, will you register your accompany? </label>
                        <select id="selectAccompany" class="form-select" wire:model.live="hasAccompany">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select>
                        <div id="floatingInputHelp" class="form-text">If you want to register more than 2 participants, please contact <a href="mailto:investmentdays@pln.co.id"><u>investmentdays@pln.co.id</u></a></div>
                    </div>
                    <div class="{{ $hasAccompany == 0 ? 'd-none' : '' }}">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="defaultFormControlInput" class="form-label">Company</label>
                                <input type="text" class="form-control @error('accompanyCompany') is-invalid @enderror" placeholder="Enter your accompany company" wire:model="accompanyCompany" />
                                @error('accompanyCompany')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="defaultFormControlInput" class="form-label">Job Title</label>
                                <input type="text" class="form-control @error('accompanyJobTitle') is-invalid @enderror" placeholder="Enter your accompany job title" wire:model="accompanyJobTitle" />
                                @error('accompanyJobTitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="defaultFormControlInput" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('accompanyFirstName') is-invalid @enderror" placeholder="Enter your accompany first name" wire:model.live="accompanyFirstName" />
                                @error('accompanyFirstName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="defaultFormControlInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('accompanyLastName') is-invalid @enderror" placeholder="Enter your accompany last name" wire:model.live="accompanyLastName" />
                                @error('accompanyLastName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Email</label>
                            <input type="text" class="form-control @error('accompanyEmail') is-invalid @enderror" placeholder="Enter your accompany email" wire:model="accompanyEmail" />
                            @error('accompanyEmail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Phone Number</label>
                            <input type="number" class="form-control @error('accompanyPhone') is-invalid @enderror" id="phoneInput" placeholder="Enter your accompany phone number" wire:model="accompanyPhone" />
                            @error('accompanyPhone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- @if ($isMedia != 1)
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">The Plenary Session is limited for one person only. Please select the participant who will attend </label>
                                <select id="defaultSelect" class="form-select" wire:model.live="selectParticipant">
                                    <option value="1" selected>{{ $firstName }} {{ $lastName }}</option>
                                    @if ($hasAccompany == 1)
                                        <option value="0">{{ $accompanyFirstName }} {{ $accompanyLastName }}</option>
                                    @endif
                                </select>
                            </div>
                        @else
                        @endif --}}
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="firstStepSubmit" disabled>Previous</button>
                        </div>
                        @if ($isComing != 0 && $isMedia != 1)
                            <div class="col-6">
                                <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="firstStepSubmit" wire:loading.attr="disabled">Next</button>
                            </div>
                        @else
                            <div class="col-6">
                                <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="firstStepSubmit" wire:loading.attr="disabled">Next</button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="{{ $currentStep != 2 ? 'd-none' : '' }}">
                    <div class="mb-3">
                        The 1-1 bilateral business meetings will be held between 27 – 29 February 2024 with time allocation of 60 minutes per session. It aims to provide platform for potential and existing partners to engage on potential project opportunities and to initiate the collaboration with PLN executive level representatives.

                    </div>
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Are you interested to join 1-1 bilateral meeting session?</label>
                        <select id="defaultSelect" class="form-select @error('isJoin') is-invalid @enderror" wire:model.live="isJoin">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('isJoin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="floatingInputHelp" class="form-text">Spot is guaranteed after receiving confirmation from PLN Investment Days 2024 committee.</div>
                    </div>
                    <div class="{{ $isJoin != 1 ? 'd-none' : '' }}">
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Topic of interest of 1-1 bilateral business meeting</label>
                            <div class="form-check">
                                <input class="form-check-input @error('topic') is-invalid @enderror" wire:model="topic" type="checkbox" value="Generation" id="check1" />
                                <label class="form-check-label" for="check1">
                                    Generation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('topic') is-invalid @enderror" wire:model="topic" type="checkbox" value="Transmission" id="check2" />
                                <label class="form-check-label" for="check2">
                                    Transmission
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('topic') is-invalid @enderror" wire:model="topic" type="checkbox" value="Distributon & Retail" id="check3" />
                                <label class="form-check-label" for="check3">
                                    Distributon & Retail
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('topic') is-invalid @enderror" wire:model="topic" type="checkbox" value="Primary Enegry" id="check4" />
                                <label class="form-check-label" for="check4">
                                    Primary Enegry
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('topic') is-invalid @enderror" wire:model="topic" type="checkbox" value="Beyond kWh" id="check5" />
                                <label class="form-check-label" for="check5">
                                    Beyond kWh
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('topic') is-invalid @enderror" wire:model="topic" type="checkbox" value="Financing" id="check6" />
                                <label class="form-check-label" for="check6">
                                    Financing
                                </label>
                            </div>
                            @error('topic')
                                <small class="text-danger">
                                    Please select at least 1 topic.
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="textArea1">Potential collaboration opportunities</label>
                            <textarea class="form-control h-px-150 @error('isPotential') is-invalid @enderror" id="textArea1" placeholder="Please write down the details of your proposed project/s, offers, or inquiry consisting of project name, duration, investment value, size, collaboration scheme (e.g., capacity, volume, etc.), business requirements, and any relevant information to help us understand the opportunity or inquiry." wire:model="isPotential" spellcheck="false"></textarea>
                            @error('isPotential')
                                <small class="text-danger">
                                    This field is required and cannot be empty.
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="textArea2">Project credentials</label>
                            <textarea class="form-control h-px-150 @error('projectFootprint') is-invalid @enderror" id="textArea2" placeholder="Please write down project credentials of your company (projects in Indonesia are preferred) if applicable." wire:model="projectFootprint" spellcheck="false"></textarea>
                            @error('projectFootprint')
                                <small class="text-danger">
                                    This field is required and cannot be empty.
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="textArea3">Anything else you’d like us to know?</label>
                            <textarea class="form-control h-px-150 @error('anythingElse') is-invalid @enderror" id="textArea3" placeholder="" wire:model="note" spellcheck="false"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Add supporting documents</label>
                            <input class="form-control" type="file" id="formFileMultiple" wire:model="attachment" multiple="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="back(1)">Previous</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="secondStepSubmit">Next</button>
                        </div>
                    </div>
                </div>

                <div class="{{ $currentStep != 3 ? 'd-none' : '' }}">
                    <div class="mb-3 text-center">
                        <p class="">
                            <b>Contact person for hospitality purposes.</b>
                            <br>
                            <small>Please write down contact information of your contact person if different from yourself e.g., executive assistant, personal assistant, etc.</small>
                        </p>
                        <p class="mt-0 mb-3">

                        </p>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input " wire:model.live="isHospitalitySame" type="checkbox" id="isHospitalitySame" />
                            <label class="form-check-label" for="isHospitalitySame">
                                Contact person is same with attendee contact details.
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">

                    </div>
                    <div class="{{ $isHospitalitySame ? 'd-none' : '' }}">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="defaultFormControlInput" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('hospitalityFirstName') is-invalid @enderror" placeholder="Enter your first name" wire:model="hospitalityFirstName" />
                                @error('hospitalityFirstName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="defaultFormControlInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('hospitalityLastName') is-invalid @enderror" placeholder="Enter your last name" wire:model="hospitalityLastName" />
                                @error('hospitalityLastName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Email</label>
                            <input type="text" class="form-control @error('hospitalityEmail') is-invalid @enderror" placeholder="Enter your email" wire:model="hospitalityEmail" />
                            @error('hospitalityEmail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Phone Number</label>
                            <input type="number" class="form-control @error('hospitalityPhone') is-invalid @enderror" id="phoneInput" placeholder="Enter your phone number" wire:model="hospitalityPhone" />
                            @error('hospitalityPhone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="{{ !$isHospitalitySame ? 'd-none' : '' }}  ">
                        <div class="mb-3">
                            <label for="selectHospitality" class="form-label">Please select the attendee</label>
                            <select id="selectHospitality" class="form-select" wire:model.live="selectHospitalityParticipant">
                                <option value="1" selected>{{ $firstName }} {{ $lastName }}</option>
                                @if ($hasAccompany != 0)
                                    <option value="0">{{ $accompanyFirstName }} {{ $accompanyLastName }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="back(2)">Previous</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="thirdStepSubmit">Next</button>
                        </div>
                    </div>
                </div>
                <div class="{{ $currentStep != 4 ? 'd-none' : '' }}">
                    <div class="mx-auto pt-lg-0 mb-3">
                        <div class="text-center mt-0">
                            <h4><b>YOU'RE ALMOST DONE</b></h4>
                        </div>
                        <div class="row">
                            <div>
                                <p class="fw-medium mb-2">Participant Details</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <b>Registered As :</b>
                                        <p>{{ $isMedia != 1 ? 'Participant' : 'Media' }}</p>
                                    </li>
                                    <li>
                                        <b>Company :</b>
                                        <p>{{ ucfirst($company) }}</p>
                                    </li>
                                    <li>
                                        <b>Job Title :</b>
                                        <p>{{ ucwords($jobTitle) }}</p>
                                    </li>
                                    <li>
                                        <b>Name :</b>
                                        <p>{{ ucfirst($firstName) }} {{ ucfirst($lastName) }}</p>
                                    </li>
                                    <li>
                                        <b>Email :</b>
                                        <p>{{ $email }}</p>
                                    </li>
                                    <li>
                                        <b>Phone :</b>
                                        <p>{{ $phone }}</p>
                                    </li>
                                    <li>
                                        <b>Will you be attending :</b>
                                        @if ($isComing)
                                            <p><span class="text-success">Yes</span></p>
                                        @else
                                            <p><span class="text-danger">No</span></p>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="{{ $hasAccompany != 1 ? 'd-none' : '' }}">
                                <p class="fw-medium mb-2">Participant Accompany Details</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <b>Company :</b>
                                        <p>{{ ucfirst($accompanyCompany) }}</p>
                                    </li>
                                    <li>
                                        <b>Job Title :</b>
                                        <p>{{ ucwords($accompanyJobTitle) }}</p>
                                    </li>
                                    <li>
                                        <b>Name :</b>
                                        <p>{{ ucfirst($accompanyFirstName) }} {{ ucfirst($accompanyLastName) }}</p>
                                    </li>
                                    <li>
                                        <b>Email :</b>
                                        <p>{{ $accompanyEmail }}</p>
                                    </li>
                                    <li>
                                        <b>Phone :</b>
                                        <p>{{ $accompanyPhone }}</p>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                            @if ($isMedia != 1 && $isComing != 0)
                                <div>
                                    <p class="fw-medium mb-2">Bilateral Meeting Session Details</p>
                                    <ul class="list-unstyled">
                                        <li><b>Are you joining 1-1 bilateral meeting session :</b>
                                            @if ($isJoin)
                                                <p><span class="text-success">Yes</span></p>
                                            @else
                                                <p><span class="text-danger">No</span></p>
                                            @endif
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled {{ $isJoin != 1 ? 'd-none' : '' }}">
                                        <li>
                                            <b>Topic of interest :</b>
                                            <p>{{ implode(', ', $topic) }}</p>
                                        </li>
                                        <li>
                                            <b>Potential collaboration opportunities :</b>
                                            <p>{{ $isPotential }}</p>
                                        </li>
                                        <li>
                                            <b>Project credentials :</b>
                                            <p>{{ $projectFootprint }}</p>
                                        </li>
                                    </ul>
                                    <hr>
                                </div>
                            @endif
                            @if ($isHospitalitySame)
                                @if ($selectHospitalityParticipant == 1)
                                    <div>
                                        <p class="fw-medium mb-2">Hospitality Purposes Contact Person Details</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <b>Name :</b>
                                                <p>{{ ucfirst($firstName) }} {{ ucfirst($lastName) }}</p>
                                            </li>
                                            <li>
                                                <b>Email :</b>
                                                <p>{{ $email }}</p>
                                            </li>
                                            <li>
                                                <b>Phone :</b>
                                                <p>{{ $phone }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <div>
                                        <p class="fw-medium mb-2">Hospitality Purposes Contact Person Details</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <b>Name :</b>
                                                <p>{{ ucfirst($accompanyFirstName) }} {{ ucfirst($accompanyLastName) }}</p>
                                            </li>
                                            <li>
                                                <b>Email :</b>
                                                <p>{{ $accompanyEmail }}</p>
                                            </li>
                                            <li>
                                                <b>Phone :</b>
                                                <p>{{ $accompanyPhone }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @elseif($isMedia != 1 && $isComing != 0)
                                <div>
                                    <p class="fw-medium mb-2">Hospitality Purposes Contact Person Details</p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <b>Name :</b>
                                            <p>{{ ucfirst($hospitalityFirstName) }} {{ ucfirst($hospitalityLastName) }}</p>
                                        </li>
                                        <li>
                                            <b>Email :</b>
                                            <p>{{ $hospitalityEmail }}</p>
                                        </li>
                                        <li>
                                            <b>Phone :</b>
                                            <p>{{ $hospitalityPhone }}</p>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        @if ($isMedia == 1 || $isComing == 0)
                            <div class="col-6">
                                <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="back(1)">Previous</button>
                            </div>
                        @else
                            <div class="col-6">
                                <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="back(3)">Previous</button>
                            </div>
                        @endif
                        <div class="col-6">
                            <button class="btn btn-primary d-grid w-100 waves-effect waves-light" id="btnSubmit" wire:click="submit" wire:loading.attr="disabled">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
