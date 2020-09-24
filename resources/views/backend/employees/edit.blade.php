@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ action( [\App\Http\Controllers\Backend\EmployeeController::class, 'update'], $employee) }}" method="post">
                            @csrf @method('PUT')

                            <h3 class="my-3">Edit details of {{ $employee->name }}</h3>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') ? old('name') : $employee->name}}">
                                </div>
                                @if( $errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           id="staticEmail"
                                           name="email"
                                           value="{{ old('email') ? old('email') : $employee->email}}">
                                </div>
                                @if( $errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Department</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-lg" name="department">
                                        <option>Select department</option>
                                        @forelse ($departments as $department)
                                            <option value="{{  old('department') ? old('department') : $department->name }}" selected="{{ $department->name === $employee->department ? 'selected' : '' }}">
                                                {{ $department->name }}
                                            </option>
                                        @empty
                                            <option value="">No departments yet</option>
                                        @endforelse
                                    </select>
                                    @if( $errors->has('department'))
                                        <div class="text-danger">{{ $errors->first('department') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-lg" name="job_title">
                                        <option>Select Job Title</option>
                                        @forelse ($titles as $title)
                                            <option value="{{   old('title') ? old('title') : $title->name }}" selected="{{ $title->name === $employee->job_title ? 'selected' : '' }}">
                                            {{ $title->name }}
                                        @empty
                                            <option value="">No job titles yet</option>
                                        @endforelse
                                    </select>
                                </div>
                                @if( $errors->has('title'))
                                    <div class="text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
