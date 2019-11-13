@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-8">
			<img src="/storage/{{$post->image}}" alt="{{$post->caption}}" class="w-100">
		</div>
		<div class="col-4">
			<div class="d-flex align-items-center">
				<div>
					<img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100" style="max-width: 40px">
				</div>
				<div class="pl-3">
					<div class="font-weight-bold"><a href="/profile/{{$post->user->id}}">{{ $post->user->username }}</a></div>
				</div>
			</div>
			<hr />
			<p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}">{{ $post->user->username }}</a></span> {{ $post->caption }}</p>
		</div>
	</div>
</div>
@endsection
