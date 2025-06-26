<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
public function search(Request $request)
{
    $query = $request->input('name');
    $posts = Post::where('name', 'like', "%{$query}%")
                ->orWhere('id', $query)
                ->paginate(3);
if ($posts->isEmpty()) {
        return redirect()->route('home')->with('message', 'No results found for your search.');
    }else {
        return view('welcome', compact('posts'));
    }
    
}
}
