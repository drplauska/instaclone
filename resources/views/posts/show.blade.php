@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-8">
			<img src="{{$user->profile->profileImage()}}" alt="{{$post->caption}}" class="w-100">
		</div>
		<div class="col-4">
			<a href="/profile/{{$post->user->id}}">
				<div class="d-flex align-items-center">
					<div>
						<img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px">
					</div>
					<div class="pl-3">
						<div class="font-weight-bold">
							<span class="text-dark">{{ $post->user->username }}</span>
							<span class="pl-3"><a href="#">Follow</a></span>
						</div>
					</div>
				</div>
			</a>
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
