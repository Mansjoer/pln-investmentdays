<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Emails List</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-8 participant-search">
                    <div class="row">
                        <div class="col-2">
                            <select id="FilterTransaction" class="form-select text-capitalize" wire:change="resetPage" wire:model.live="pagination">
                                <option value="5"> 5 </option>
                                <option value="10"> 10 </option>
                                <option value="15"> 15 </option>
                                <option value="20"> 20 </option>
                                <option value="25"> 25 </option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Search Email" wire:model.live="search" spellcheck="false" />
                        </div>
                    </div>
                </div>
                <div class="col-4 export-excel d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                        <span class="tf-icons mdi mdi-microsoft-excel me-2"></span>Import
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light" wire:click="blastEmail">
                        <span class="tf-icons mdi mdi-rocket-outline me-2" wire:loading.attr="disabled"></span>Blast Email
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%">Name</th>
                        <th style="width: 25%">Company</th>
                        <th style="width: 20%">Position</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 15%">Cc</th>
                        <th class="text-center" style="width: 5%">Status</th>
                        <th class="text-center" style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($emails as $email)
                        <tr>
                            <td>{{ Str::limit($email->name, 15) }}</td>
                            <td>{{ Str::limit($email->company, 20) }}</td>
                            <td>{{ Str::limit($email->position, 20) }}</td>
                            <td>{{ Str::limit($email->email, 20) }}</td>
                            <td>{{ Str::limit($email->cc, 20) }}</td>
                            @if ($email->isSend == 1)
                                <td>true</td>
                            @else
                                <td>false</td>
                            @endif
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <a class="text-primary" role="button" href="{{ route('admin-participant-details', $email->id) }}"><i class="mdi mdi-eye-outline me-1"></i></a>
                                    </div>
                                    <div>
                                        <a class="text-danger" role="button" wire:click.self="delete({{ $email->id }})"><i class="mdi mdi-trash-can-outline me-1"></i></a>
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
            {{-- @if ($participants->count() >= 1)
                <div class="d-flex justify-content-end mt-3 p-3">
                    @if (method_exists($participants, 'links'))
                        {{ $participants->links() }}
                    @endif
                </div>
            @endif --}}
        </div>
    </div>

    <div class="modal fade" id="importModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModal">Import Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.self="modalClose" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <form wire:submit.prevent="importExcel" spellcheck="false" id="addUserForm" enctype="multipart/form-data">
                            <div class="col-12 mb-2">
                                <label for="formFile" class="form-label">Upload .xls</label>
                                <input class="form-control" type="file" id="formFile" wire:model="file">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" wire:click.self="modalClose">Close</button>
                    <button type="submit" class="btn btn-primary" form="addUserForm" wire:ignore.self wire:loading.attr="disabled">Import</button>
                </div>
            </div>
        </div>
    </div>

</div>
