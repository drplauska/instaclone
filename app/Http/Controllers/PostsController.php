<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;


class PostsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$users = auth()->user()->following()->pluck('profiles.user_id');

		$posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
		return view('posts.index', compact('posts'));
	}

	public function create(){
		return view('posts.create');
	}

	public function store(){

		$data = request()->validate([
			'caption' => 'required',
			'image' => ['required', 'image'],
		]);

		$cache = Cache::get('user.post.timer.' . auth()->user()->id);
		
		if(isset($cache) && $cache == 'true'){
			return back()->withInput()->with('timer', 'You are posting too often, wait a minute.');
		}

		$imagePath = request('image')->store('uploads', 'public');

		$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
		$image->save();	

		auth()->user()->posts()->create([
			'caption' => $data['caption'],
			'image' => $imagePath,
		]);
		
		$expiresAt = now()->addMinute();

		//$cache = Cache::get('user.post.timer.' . auth()->user()->id);

		Cache::put('user.post.timer.' . auth()->user()->id, 'true', $expiresAt);
		
		return redirect('/profile/' . auth()->user()->id);
	}

	public function show(\App\Post $post){
		$follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;
		return view('posts.show', compact('post', 'follows'));
	}

	public function recent(){
		$posts = Post::latest()->paginate(5);
		return view('posts.recent', compact('posts'));
	}
}
