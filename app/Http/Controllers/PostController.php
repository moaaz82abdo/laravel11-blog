<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Artisan;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use function Laravel\Prompts\confirm;

class PostController extends Controller
{
    public function firstAction(){
        $namename='ahmed';
        $booksbooks=['java','laravel','flutter','reactjs','django'];
        return view('test2',['name'=>$namename,'books'=>$booksbooks]);
    }
    public function great(){
        return 'this is great action';
    }
    
    public function index(){
        $postsfromdb = Post::all();
        
        return view('posts.index',["posts"=>$postsfromdb]);
    }
    public function show(Post $post){
        $users=User::all();
       
        // dd($user['email']);
        if(is_null($post)){
            return alert('not found');
        }
        return view('posts.show',['post'=>$post,'users'=>$users]);
    }
    public function create()
    {
        //select * from users;
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }
    public function store(){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

//        $request = request();
//
//        dd($request->title, $request->all());

        //1- get the user data
        $data = request()->all();

        $title = request()->title;
        $posted_by = request()->posted_by;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        dd($data, $title, $description, $postCreator);

        //2- store the submitted data in database
//        $post = new Post;
//
//        $post->title = $title;
//        $post->description = $description;
//
//        $post->save();// insert into posts ('t','d')

        Post::create([
            'title' => $title,
            'posted_by'=>$posted_by,
            'description' => $description,
            'xyz' => 'some value', //ignore,
            'user_id' => $postCreator,
        ]);

        //3- redirection to posts.index
        return to_route('posts.index');
    }

    public function edit(Post $post ){
        $users = User::all();

        return view('posts.edit', ['users' => $users,'post'=>$post]);
    }
    public function update($postId)
    {
        // dd($postId);
        //1- get the user data
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        $title = request()->title;
        $posted_by = request()->posted_by;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        dd($title, $description, $postCreator);

        //2- update the submitted data in database
            //select or find the post
            //update the post data
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'posted_by'=>$posted_by,
            'user_id' => $postCreator,
        ]);

    //    dd($singlePostFromDB);

        //3- redirection to posts.show

        return to_route('posts.show', $postId);
    }
    public function destroy($postId){

        $post = Post::find($postId);
        $post->delete();
      
        return to_route('posts.index');
    }
}
