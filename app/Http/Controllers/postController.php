<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function ourFilestore(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|unique:posts|max:255',
        'email' => 'required',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

     // Create a new post instance and save it
        // Ensure the image is saved with a unique name
        // and the current timestamp to avoid conflicts
        $imageName = null;
     if($request->image){
           $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
        } else {
            $imageName = 'Null'; // Default image if none is uploaded
     }
        
    
        $post = new Post();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->image = $imageName;         
        $post->save();
        return redirect()->route('home')->with('message', 'Post created successfully!');       
    }

    public function editStore($id)
    {
        $post = Post::find($id);
       return view('edit', ['post' => $post]);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Update the specified post in storage.
    // Validate the request data and update the post
    // Redirect back to the home route with a success message
    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStore(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $post = Post::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->image =$request->image;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image');
            $request->file('image')->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        return redirect()->route('home')->with('message', 'Post updated successfully!');
    }


    public function deleteData($id)
    {
        $post = Post::find($id);
        if ($post) {
            
            $post->delete();
            return redirect()->route('home')->with('message', 'Post deleted successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Post not found!');
        }
    }
    public function viewData($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('view', ['post' => $post]);
        } else {
            return redirect()->route('home')->with('error', 'Post not found!');
        }
    }






}