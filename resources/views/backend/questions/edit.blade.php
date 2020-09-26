@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form
                            action="{{ action( [\App\Http\Controllers\Backend\QuestionController::class, 'update'], $question) }}"
                            method="post">
                            @csrf @method('PUT')

                            <h3 class="my-3">Edit details of {{ $question->question }}</h3>
                            <div class="form-group row">
                                <label for="question" class="col-sm-2 col-form-label">Question</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           id="question"
                                           name="question"
                                           value="{{ old('question') ? old('question') : $question->question}}">
                                </div>
                                @if( $errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Choices</label>
                                <div class="col-sm-10">
                                    @foreach($question->choices as $key => $choice)
                                        <input type="text"
                                               class="form-control"
                                               id="staticEmail"
                                               name="choices[{{$key}}]"
                                               value="{{ old('choice') ? old('choice') : $choice}}"
                                              >
                                    @endforeach

                                </div>
                                @if( $errors->has('choices'))
                                    <div class="text-danger">{{ $errors->first('choices') }}</div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Answer</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           id="answer"
                                           name="answer"
                                           value="{{ old('answer') ? old('answer') : $question->answer}}">
                                </div>
                                @if( $errors->has('answer'))
                                    <div class="text-danger">{{ $errors->first('answer') }}</div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Departments</label>
                                <div class="col-sm-10">
                                    @foreach($question->departments as $key => $department)
                                        <input type="text"
                                               class="form-control"
                                               id="departments"
                                               name="departments[{{ $key }}]"
                                               value="{{ old('departments') ? old('departments') : $department}}">
                                    @endforeach
                                    @if( $errors->has('departments'))
                                        <div class="text-danger">{{ $errors->first('departments') }}</div>
                                    @endif
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
