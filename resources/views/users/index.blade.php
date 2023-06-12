@extends('includes.app')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header">

                    <div class="row">

                        <div class="col-4">
                            <div class="input-group input-group-outline">
                                <label class="form-label">Global Search</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>

                        <div class="col-8 justify-content-end">
                            <button  data-bs-toggle="modal" data-bs-target="#users-modal" class="btn btn-icon btn-2 btn-outline-success " type="button">
                                <span class="btn-inner--icon"><i class="material-icons">add</i></span>
                            </button>
                        </div>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                User
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Role
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Is Active
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Created at
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Actions
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-1.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{$user->name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$user->role_name}}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <a title="Inactivate?" href="#"> <span class="badge bg-gradient-faded-success">Active</span>
                                    </a>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-normal">{{$user->created_at?->toFormattedDateString() ?? 'N/A'}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-warning font-weight-normal text-xs"
                                       data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                    <a href="javascript:;" class="font-weight-normal text-xs text-danger"
                                       data-toggle="tooltip" data-original-title="Edit user">
                                        Delete
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('users.modals')

    @include('users.scripts')

@endsection
