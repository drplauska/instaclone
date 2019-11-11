@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-3 p-5">
			<img src="https://instagram.fkun1-1.fna.fbcdn.net/vp/b46482524493fd815f359bb9e8476c44/5E5B7374/t51.2885-19/s150x150/60407999_2314832532124082_8838214569638756352_n.jpg?_nc_ht=instagram.fkun1-1.fna.fbcdn.net" class="rounded-circle">
		</div>
		<div class="col-9 pt-5">
			<div class="d-flex justify-content-between align-items-baseline">
				<h1>{{ $user->username }}</h1>
				<a href="#">Add new post</a>
			</div>
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
