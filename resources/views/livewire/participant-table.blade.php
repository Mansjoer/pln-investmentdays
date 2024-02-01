<div class="card">
    <div class="card-header">
        <h5 class="card-title">Allowed Participants List</h5>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-12 participant-search">
                <div class="row">
                    <div class="col-1">
                        <select id="FilterTransaction" class="form-select text-capitalize" wire:change="resetPage" wire:model.live="pagination">
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
                        {{-- <td>{{ $participant->firstName }} {{ $participant->lastName }}</td> --}}
                        <td>{{ Str::limit($participant->firstName . ' ' . $participant->lastName, 15) }}</td>
                        <td>{{ Str::limit($participant->email, 25) }}</td>
                        <td>{{ $participant->phone }}</td>
                        <td>{{ Str::limit($participant->company, 10) }}</td>
                        <td>{{ Str::limit($participant->jobTitle, 15) }}</td>
                        @if ($participant->isComing == 1)
                            <td class="text-center"><span class="badge bg-label-success">Present</span></td>
                        @else
                            <td class="text-center"><span class="badge bg-label-danger">Not Present</span></td>
                        @endif
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <a class="text-primary" role="button" href="{{ route('admin-participant-details', $participant->id) }}"><i class="mdi mdi-eye-outline me-1"></i></a>
                                </div>
                                <div>
                                    <a class="text-danger" role="button" wire:click.self="delete({{ $participant->id }})"><i class="mdi mdi-trash-can-outline me-1"></i></a>
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
