@extends('admin.master')

@section('pageTitle')
    Participants
@endsection

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-2">Session</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">21,459</h4>
                                <p class="text-success mb-2">(+29%)</p>
                            </div>
                            <p class="mb-0">Total Users</p>
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
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role">
                    <select id="UserRole" class="form-select text-capitalize">
                        <option value=""> Select Role </option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-4 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize">
                        <option value=""> Select Status </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th class="text-center" style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
