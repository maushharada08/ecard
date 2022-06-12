<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('posts/show', compact('post'));
    }

    public function search()
    {
        $keyword = request()->input('keyword');
        $query = Post::query();
        $query_user = User::query();
        $query_profile = Profile::query();

        if(!empty($keyword)) {
            $query->where('message', 'LIKE', "%{$keyword}%");
        }

        if(!empty($keyword)) {
            $query_user->where('name','LIKE', "%{$keyword}%");
        }

        if(!empty($keyword)) {
            $query_profile->where('com_name', 'LIKE', "%{$keyword}%")
                            ->where('occupation', 'LIKE', "%{$keyword}%")
                            ->where('username', 'LIKE', "%{$keyword}%")
                            ->where('username_sm', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();
        $users = $query_user->get();
        $profiles = $query_profile->get();
        return view('posts/search', compact('keyword', 'query', 'posts', 'users', 'profiles'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(20);
        return view('posts/index', compact('posts'));
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'message' => 'required',
            'image' => 'image'
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200);

            $imageArray = [ 'image' => $imagePath ];
        }

        auth()->user()->posts()->create(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/" . auth()->user()->id );
    }
}
