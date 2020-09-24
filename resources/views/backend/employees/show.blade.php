@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                           <h3 class="my-3">Details of {{ $employee->name }}</h3>
                           <div class="btn-group" role="group" aria-label="Basic example">
                               <p><a href="{{ action( [\App\Http\Controllers\Backend\EmployeeController::class, 'edit'], $employee) }}" class="btn btn-outline-secondary">Edit</a></p>
                               <form action="{{ action( [\App\Http\Controllers\Backend\EmployeeController::class, 'destroy'], $employee) }}" method="post">
                                   @csrf @method('DELETE')
                                   <button href="{{ action( [\App\Http\Controllers\Backend\EmployeeController::class, 'destroy'], $employee) }}" class="btn btn-outline-secondary">Delete</button>
                               </form>
                           </div>
                       </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10 font-weight-bolder">
                                <h5>{{ $employee->name }}</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 font-weight-bolder">
                                <h5>{{ $employee->email }}</h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10 font-weight-bolder">
                                <h5>{{ $employee->department }}</h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Job Title</label>
                            <div class="col-sm-10 font-weight-bolder">
                                <h5>{{ $employee->job_title }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
