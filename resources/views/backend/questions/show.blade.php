@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                           <h3 class="my-3">Details of Question ID {{ $question->id }}</h3>
                           <div class="btn-group" role="group" aria-label="Basic example">
                               <p><a href="{{ action( [\App\Http\Controllers\Backend\QuestionController::class, 'edit'], $question) }}" class="btn btn-outline-secondary">Edit</a></p>
                               <form action="{{ action( [\App\Http\Controllers\Backend\QuestionController::class, 'destroy'], $question) }}" method="post">
                                   @csrf @method('DELETE')
                                   <button href="{{ action( [\App\Http\Controllers\Backend\QuestionController::class, 'destroy'], $question) }}" class="btn btn-outline-secondary">Delete</button>
                               </form>
                           </div>
                       </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Question</label>
                            <div class="col-sm-10 font-weight-bolder">
                                <h5>{{ $question->question }}</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Choices</label>
                            <div class="col-sm-10 font-weight-bolder">
                                @foreach($question->choices as $key => $choice)
                                    <h5 href="">{{ $key }}. {{ $choice }}</h5>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10 font-weight-bolder">
                                <h5>{{ $question->answer }}</h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Departments</label>
                            <div class="col-sm-10 font-weight-bolder">
                                @foreach($question->departments as $department)
                                    <h5 href="">{{ $department }}</h5>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
