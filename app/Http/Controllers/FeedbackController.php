<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::with('professorAsFeedback')->where('id', $id)->first();
        $likes = $user->professorAsFeedback->where('like', '>=', 1)->count();
        $unlikes = $user->professorAsFeedback->where('dislike', '>=', 1)->count();

        return view('feedbacks.index', ['user' => $user, 'likes' => $likes, 'unlikes' => $unlikes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('feedbacks.feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'feedback_action' => ['required', 'string', 'in:like,dislike'],
            'comment' => ['required', 'string'],
            'teacher_id' => ['required', 'int'],
        ], ['feedback_action.in' => 'erro']);

        $fields = collect(['like', 'dislike']);
        $fieldAdded = $fields->filter(function ($field) use ($request) {
            return $field === $request->feedback_action;
        })->first();
        $fieldRemove = $fields->filter(function ($field) use ($request) {
            return $field !== $request->feedback_action;
        })->first();

        $feedback = new Feedback();

        $feedback[$fieldAdded] = 1;
        $feedback[$fieldRemove] = 0;
        $feedback['comment'] = $request->comment;
        $feedback['user_id'] = $request->teacher_id;
        $feedback['user_email'] = Auth::user()->email;
        $feedback->save();

        return redirect()
            ->back()
            ->with('msg', 'Feedback Com Sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
