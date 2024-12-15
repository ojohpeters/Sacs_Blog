<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MainBlog;
use App\Models\User;
use Mews\Purifier\Facades\Purifier;



class BlogController extends Controller
{
    //
    public function index (){
        $posts = MainBlog::all();
        
        return view('home', compact('posts'));
    }

    public function ViewPost(Request $request, $post){
        
        try {
            $post = MainBlog::find($post);
            return view('Post', ['post'=>$post]);
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('home')->with('Error', 'Error ' .$e->getMessage());
        }
       

       
    }

    public function create(){
        return view('users.register');
    }

    public function store(Request $request)
{
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'email|required|max:255|min:4|unique:users,email', 
            'password' => 'required|min:8', ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('home')->with('Success', 'Account Created Successfully');

}


    public function loginform(){
        return view('users.login');
    }

    public function login(Request $request){
        $validatedform = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        try {
            if (Auth::attempt($request->only('email', 'password'))){
                return redirect()->route('home')->with('Success', 'Logged In successfully');
            }    
            else{
                return redirect()->back()-with('Error', 'Invalid Creds');
            }       
        } catch (\Exception $e) {
            return redirect()->back()->with('Error', 'Critical Error occured'.$e->getMessage());
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function viewaddpost(){
        return view('addpost');
    }
    public function addpost(Request $request){
        $validated = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $validated['MainPost'] = Purifier::clean($validated['content']);
        $validated['Title'] = Purifier::clean($validated['title']);
       try {
        auth()->user()->posts()->create($validated);
        return redirect()->route('home')->with('Success', "Post Created");
       } catch (\Exception $e) {
       return redirect()->back()->with('Error', 'Erro occured '.$e->getMessage());
       }
    }

    public function deletepost($post){
       try {
        $post = MainBlog::findOrFail($post);
        if ($post){
            if ($post->user_id != auth()->id()) {
                return redirect()->route('home')->with('Error', 'You are not authorized to delete this post.');
            }
            else{
    
                $post->delete();
                return redirect()->route('home')->with('Success', 'Post Deleted!');
            }
        }
        return redirect()->route('home')->with('Error', 'Post Not Found!');       
    
       } catch (\Exception $e) {
        return redirect()->route('home')->with('Error', $e->getMessage());  
       }
    }
}