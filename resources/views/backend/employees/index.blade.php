@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    @if(session()->has('flash'))
                        <div class="alert alert-success text-center">
                            <h5 class="text-center font-weight-bolder"><i class="fas fa-check-circle text-success mr-2"></i><small>Success!</small></h5>
                            <p class="text-center">{{ session()->get('flash') }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="d-flex justify-content-between">
                                <h3>List of employees</h3>
                                <p> <a href="{{ action([\App\Http\Controllers\Backend\EmployeeController::class, 'create']) }}"
                                       class="btn btn-outline-secondary my-4">Add new employee.</a></p>
                            </div>
                            @forelse($employees as $employee)
                                <tr>
                                    <th scope="row">{{$employee->name}}</th>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->department}}</td>
                                    <td>{{$employee->job_title}}</td>
                                    <td>
                                        <a href="{{ action( [\App\Http\Controllers\Backend\EmployeeController::class, 'show'], $employee) }}"
                                           class="btn btn-outline-secondary">View</a>
                                        <a href="{{ action( [\App\Http\Controllers\Backend\EmployeeController::class, 'edit'], $employee) }}"
                                           class="btn btn-outline-secondary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="3">No employees yet.</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
