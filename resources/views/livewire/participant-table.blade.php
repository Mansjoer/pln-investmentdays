<div class="card">
    <div class="card-header">
        <h5 class="card-title">Participants List</h5>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-12 participant-search">
                <div class="row">
                    <div class="col-1">
                        <select id="FilterTransaction" class="form-select text-capitalize" wire:model.live="pagination">
                            <option value="5"> 5 </option>
                            <option value="10"> 10 </option>
                            <option value="15"> 15 </option>
                            <option value="20"> 20 </option>
                            <option value="25"> 25 </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Search Participant" wire:model.live="search" spellcheck="false" />
                    </div>
                    <div class="col-4 export-excel">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                            <span class="tf-icons mdi mdi-microsoft-excel me-2"></span>Export
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 20%">Name</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 20%">Phone</th>
                    <th style="width: 20%">Company</th>
                    <th style="width: 15%">Job Title</th>
                    <th class="text-center" style="width: 5%">Presence</th>
                    <th class="text-center" style="width: 5%">Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($participants as $participant)
                    <tr>
                        <td>{{ $participant->firstName }} {{ $participant->lastName }}</td>
                        <td>{{ $participant->email }}</td>
                        <td>{{ $participant->phone }}</td>
                        <td>{{ Str::limit($participant->company, 10) }}</td>
                        <td>{{ $participant->jobTitle }}</td>
                        @if ($participant->isComing == 1)
                            <td class="text-center"><span class="badge bg-label-success">Present</span></td>
                        @else
                            <td class="text-center"><span class="badge bg-label-danger">Not Present</span></td>
                        @endif
                        <td class="text-center">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a role="button" href="{{ route('admin-participant-details', $participant->id) }}"><i class="mdi mdi-eye-outline me-1"></i></a>
                                </div>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="7">
                            No matching records found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($participants->count() >= 1)
            <div class="d-flex justify-content-end mt-3 p-3">
                @if (method_exists($participants, 'links'))
                    {{ $participants->links() }}
                @endif
            </div>
        @endif
    </div>
</div>
