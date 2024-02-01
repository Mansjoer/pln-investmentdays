<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tickets List</h5>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-12 participant-search">
                <div class="row">
                    <div class="col-1">
                        <select id="FilterTransaction" class="form-select text-capitalize" wire:change="resetPage" wire:model.live="pagination">
                            <option value="5">5</option>
                            <option value="10">10 </option>
                            <option value="15">15 </option>
                            <option value="20">20 </option>
                            <option value="25">25 </option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Search Ticket" wire:model.live="search" spellcheck="false" />
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
                    <th style="width: 20%">Code</th>
                    <th style="width: 25%">Name</th>
                    <th style="width: 5%" class="text-center">Exhibition Zone</th>
                    <th style="width: 5%" class="text-center">Plenary Zone</th>
                    <th style="width: 5%" class="text-center">Bilateral Zone</th>
                    <th style="width: 5%" class="text-center">Claimed</th>
                    <th class="text-center" style="width: 5%">Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->code }}</td>
                        <td>{{ $ticket->participant->firstName }} {{ $ticket->participant->lastName }}</td>
                        <td class="text-success text-center"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                        @if ($ticket->zone->isPlenary == 1)
                            <td class="text-success text-center"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                        @else
                            <td class="text-danger text-center"><i class="mdi mdi-close-circle mdi-20px"></i></td>
                        @endif
                        @if ($ticket->zone->isBilateral == 1)
                            <td class="text-success text-center"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                        @else
                            <td class="text-danger text-center"><i class="mdi mdi-close-circle mdi-20px"></i></td>
                        @endif
                        @if ($ticket->isClaimed == 1)
                            <td class="text-success text-center"><i class="mdi mdi-check-circle mdi-20px"></i></td>
                        @else
                            <td class="text-danger text-center"><i class="mdi mdi-close-circle mdi-20px"></i></td>
                        @endif
                        <td class="text-center">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a class="text-primary" role="button" href="{{ route('app-ticket', $ticket->code) }}"><i class="mdi mdi-eye-outline me-1"></i></a>
                                </div>
                                <div>
                                    <a class="text-danger" role="button" wire:click.self="delete({{ $ticket->code }})"><i class="mdi mdi-trash-can-outline me-1"></i></a>
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
        @if ($tickets->count() >= 1)
            <div class="d-flex justify-content-end mt-3 p-3">
                @if (method_exists($tickets, 'links'))
                    {{ $tickets->links() }}
                @endif
            </div>
        @endif
    </div>
</div>
