@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    @if(session()->has('flash'))
                        <div class="alert alert-success text-center">
                            <h5 class="text-center font-weight-bolder"><i
                                    class="fas fa-check-circle text-success mr-2"></i><small>Success!</small></h5>
                            <p class="text-center">{{ session()->get('flash') }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Choices</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Department</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="d-flex justify-content-between">
                                <h3>List of questions</h3>
                                <p>
                                    <a href="{{ action([\App\Http\Controllers\Backend\QuestionController::class, 'create']) }}"
                                       class="btn btn-outline-secondary my-4">Add new question.</a></p>
                            </div>
                            @forelse($questions as $question)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ action( [\App\Http\Controllers\Backend\QuestionController::class, 'show'], $question) }}"
                                           class="nav-link"> {{ ucfirst($question->question) }}
                                        </a>
                                       </th>
                                    <td>
                                        @foreach($question->choices as $key => $choice)
                                            <span class="nav-link" href="">{{ ucfirst($choice) }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ ucfirst($question->answer) }}</td>
                                    <td>
                                        @foreach($question->departments as $department)
                                            <span class="nav-link" href="">{{ ucfirst($department) }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="3">No questions yet.</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>



                    </div>
                </div>


            </div>
        </div>
        <div class="col-12">
            {{ $questions->links() }}
        </div>
    </div>
@endsection
