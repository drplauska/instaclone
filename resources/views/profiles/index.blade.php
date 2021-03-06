@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-3 p-5">
			<img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" alt="Profile image">
		</div>
		<div class="col-9 pt-5">
			<div class="d-flex justify-content-between align-items-baseline">
				<div class="d-flex pb-3 align-items-center">
					<div class="h4">{{ $user->username }}</div>

					@unless($user->id == $authId)
						<follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
					@endunless
				</div>

				@can('update', $user->profile)
					<a href="/p/create">Add new post</a>
				@endcan
			</div>
			@can('update', $user->profile)
				<a href="/profile/{{$user->id}}/edit">Edit profile</a>
			@endcan
			<div class="d-flex">
				<div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
				<div class="pr-5"><strong>{{ $followerCount }}</strong> followers</div>
				<div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
			</div>
			<div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
			<div>
				{{ $user->profile->description }}
			</div>
			<div><a href="#">{{ $user->profile->url }}</a></div>
		</div>
	</div>
	<div class="row pt-1">
		@foreach($user->posts as $post)
		<div class="col-4">
			<a href="/p/{{$post->id}}">
				<img src="/storage/{{ $post->image }}" class="w-100" alt="Post image {{$post->id}}">
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection
