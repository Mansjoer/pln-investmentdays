<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Bilateral Schedule List</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-9">
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
                            <input type="text" class="form-control" placeholder="Search Schedule" wire:model.live="search" spellcheck="false" />
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                        <span class="tf-icons mdi mdi-plus me-2"></span>Add Schedule
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%">Name</th>
                        <th class="text-center" style="width: 20%">Quantity Left</th>
                        <th class="text-center" style="width: 20%">Max Quantity</th>
                        <th class="text-center" style="width: 20%">Date & Time </th>
                        <th class="text-center" style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td>1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">3</td>
                            <td class="text-center">4</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <a class="text-primary" role="button" href=""><i class="mdi mdi-eye-outline me-1"></i></a>
                                    </div>
                                    <div>
                                        <a class="text-danger" role="button" wire:click.self="delete()"><i class="mdi mdi-trash-can-outline me-1"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">No matching records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addScheduleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addScheduleModal" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScheduleModal">Add New Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.self="modalClose" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <form wire:submit.prevent="createSchedule" spellcheck="false" id="addScheduleForm">
                            <div class="col-12 mb-2">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="name" class="form-control" placeholder="" wire:model="name">
                                    <label for="name">Schedule Name</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating form-floating-outline" wire:ignore>
                                    <input type="text" class="form-control" placeholder="" id="date" />
                                    <label for="date">Select Date & Time</label>
                                </div>
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
