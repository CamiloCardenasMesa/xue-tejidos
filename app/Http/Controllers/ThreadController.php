<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function edit(Thread $thread)
    {
        $forumCategories = ForumCategory::get();

        return view('thread.edit', compact('forumCategories', 'thread'));
    }
}
