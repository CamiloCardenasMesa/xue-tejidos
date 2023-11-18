<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function edit(Thread $thread)
    {
        $this->authorize('update', $thread);
        
        $forumCategories = ForumCategory::get();

        return view('thread.edit', compact('forumCategories', 'thread'));
    }

    public function create(Thread $thread)
    {
        $forumCategories = ForumCategory::get();

        return view('thread.create', compact('forumCategories', 'thread'));
    }

    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'forum_category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        auth()->user()->threads()->create($request->all());

        return redirect()->route('forum');
    }

    public function update(Request $request, Thread $thread)
    {
        $this->authorize('update', $thread);

        $request->validate([
            'forum_category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $thread->update($request->all());

        return redirect()->route('thread', $thread);
    }

}
