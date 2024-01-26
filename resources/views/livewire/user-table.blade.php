<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Users List</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-9 participant-search">
                    <div class="row">
                        <div class="col-2">
                            <select id="FilterTransaction" class="form-select text-capitalize" wire:model.live="pagination">
                                <option value="5"> 5 </option>
                                <option value="10"> 10 </option>
                                <option value="15"> 15 </option>
                                <option value="20"> 20 </option>
                                <option value="25"> 25 </option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Search User" wire:model.live="search" spellcheck="false" />
                        </div>
                        <div class="col-3 export-excel">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                                <span class="tf-icons mdi mdi-microsoft-excel me-2"></span>Export
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-3 export-excel d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <span class="tf-icons mdi mdi-plus-box-outline me-2"></span>New User
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 80%" class="text-center">Username</th>
                        {{-- <th style="width: 25%">Email</th> --}}
                        <th style="width: 5%" class="text-center">Admin</th>
                        <th class="text-center" style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{ Str::ucfirst($user->username) }}</td>
                            {{-- <td>{{ $user->email ? $user->email : 'null' }}</td> --}}
                            @if ($user->isAdmin == 1)
                                <td class="text-success text-center"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                            @else
                                <td class="text-danger text-center"><i class="mdi mdi-close-circle mdi-20px"></i></td>
                            @endif
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                        <a class="dropdown-item" role="button" wire:click="deleteUser({{ $user->id }})"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
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
            @if ($users->count() >= 1)
                <div class="d-flex justify-content-end mt-3 p-3">
                    @if (method_exists($users, 'links'))
                        {{ $users->links() }}
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModal">Add New user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.self="modalClose" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <form wire:submit.prevent="createUser" spellcheck="false" id="addUserForm">
                            <div class="col-12 mb-2">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" wire:model="username">
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {!! $message !!}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="email" class="form-control" placeholder="xxxxx@xx.xx" wire:model="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="switch switch-square switch-success">
                                    <input type="checkbox" class="switch-input" wire:model="isAdmin" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Set user as admin</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" wire:click.self="modalClose">Close</button>
                    <button type="submit" class="btn btn-primary" form="addUserForm" wire:ignore.self>Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
