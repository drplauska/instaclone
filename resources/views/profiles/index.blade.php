@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-3 p-5">
			<img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100">
		</div>
		<div class="col-9 pt-5">
			<div class="d-flex justify-content-between align-items-baseline">
				<h1>{{ $user->username }}</h1>
				@can('update', $user->profile)
					<a href="/p/create">Add new post</a>
				@endcan
			</div>
			@can('update', $user->profile)
				<a href="/profile/{{$user->id}}/edit">Edit profile</a>
			@endcan
			<div class="d-flex">
				<div class="pr-5"><strong>15</strong> posts</div>
				<div class="pr-5"><strong>23k</strong> followers</div>
				<div class="pr-5"><strong>153</strong> following</div>
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
				<img src="/storage/{{ $post->image }}" class="w-100">
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection
