<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Emails List</h5>

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
                            <input type="text" class="form-control" placeholder="Search Email" wire:model.live="search" spellcheck="false" />
                        </div>
                        <div class="col-4 export-excel">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#importModal">
                                <span class="tf-icons mdi mdi-microsoft-excel me-2"></span>Import
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                    <button type="submit" class="btn btn-primary" form="addUserForm" wire:ignore.self>Import</button>
                </div>
            </div>
        </div>
    </div>

</div>
