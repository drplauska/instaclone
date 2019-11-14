<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user){
		$follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

		$postCount = Cache::remember('count.posts.' . $user->id,
			now()->addSeconds(10), 
			function () use ($user) {
				return $user->posts->count();
		});

		$followerCount = Cache::remember('count.follower.' . $user->id,
			now()->addSeconds(10), 
			function () use ($user) {
				return $user->profile->followers->count();
		});
		//$followerCount = $user->profile->followers->count();
		
		$followingCount = Cache::remember('count.following.' . $user->id,
			now()->addSeconds(10), 
			function () use ($user) {
				return $user->following->count();
		});
		//$followingCount = $user->following->count();

		return view('profiles.index', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));
	}

	public function edit(User $user){
		$this->authorize('update', $user->profile);
		return view('profiles.edit', compact('user'));
	}

	public function update(User $user){
		$this->authorize('update', $user->profile);

		$data = request()->validate([
			'title' => ['string', 'max:64', 'required'],
			'description' => ['nullable', 'string', 'max:256'],
			'url' => ['nullable', 'url', 'max:64'],
			'image' => ['image'],
		]);


		if(request('image')){
			$imagePath = request('image')->store('profile', 'public');
			
			$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
			$image->save();
			$data['image'] = $imagePath;
		}

		auth()->user()->profile->update($data);
		
		return redirect("/profile/{$user->id}");
	}
}
