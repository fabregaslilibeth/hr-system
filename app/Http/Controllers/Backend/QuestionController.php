<?php

namespace App\Http\Controllers\Backend;

use App\Models\Question;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $questions = Question::simplePaginate(10);

        return view('backend.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return RedirectResponse
     */
    public function store(Request $request, Question $question)
    {
        $question->create($request->all());

        return redirect()->action([self::class, 'index'], $question)
            ->with('flash', 'Question has been edited.');
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return Application|Factory|View
     */
    public function show(Question $question)
    {
        return view('backend.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return Application|Factory|View
     */
    public function edit(Question $question)
    {
        return view('backend.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->action([self::class, 'index'], $question)
            ->with('flash', 'Question has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->action([self::class, 'index'])
            ->with('flash', 'Question has been deleted.');
    }
}
