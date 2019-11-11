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
		<div class="col-4">
			<img src="https://instagram.fkun1-1.fna.fbcdn.net/vp/5e591294dc6c96d06d6a891eeb89537c/5E5CB28B/t51.2885-15/sh0.08/e35/c135.0.810.810a/s640x640/56418404_997257637133976_7632637632742178736_n.jpg?_nc_ht=instagram.fkun1-1.fna.fbcdn.net&_nc_cat=100" class="w-100">
		</div>
		<div class="col-4">
			<img src="https://instagram.fkun1-1.fna.fbcdn.net/vp/5e591294dc6c96d06d6a891eeb89537c/5E5CB28B/t51.2885-15/sh0.08/e35/c135.0.810.810a/s640x640/56418404_997257637133976_7632637632742178736_n.jpg?_nc_ht=instagram.fkun1-1.fna.fbcdn.net&_nc_cat=100" class="w-100">
		</div>
		<div class="col-4">
			<img src="https://instagram.fkun1-1.fna.fbcdn.net/vp/5e591294dc6c96d06d6a891eeb89537c/5E5CB28B/t51.2885-15/sh0.08/e35/c135.0.810.810a/s640x640/56418404_997257637133976_7632637632742178736_n.jpg?_nc_ht=instagram.fkun1-1.fna.fbcdn.net&_nc_cat=100" class="w-100">
		</div>
	</div>
</div>
@endsection
