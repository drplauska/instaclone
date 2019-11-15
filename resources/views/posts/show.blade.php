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
					<a href="/profile/{{$post->user->id}}">
						<img src="{{$post->user->profile->profileImage()}}" alt="Profile image" class="rounded-circle w-100" style="max-width: 40px">
					</a>
				</div>
				<div class="pl-3 d-flex">
					<div class="font-weight-bold">
						<a href="/profile/{{$post->user->id}}">
							<span class="text-dark">{{ $post->user->username }}</span>
						</a>
					</div>
					<follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
				</div>
			</div>
			<hr />
			<div>
				<span class="font-weight-bold">
					<a href="/profile/{{$post->user->id}}">
						<span class="text-dark">{{ $post->user->username }}</span>
					</a>
				</span> {{ $post->caption }}
			</div>
		</div>
	</div>
</div>
@endsection
