@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($posts as $post)
	<div class="row d-flex justify-content-center">
		<div class="col-6">
			<a href="/p/{{$post->id}}">
				<img src="{{$post->user->profile->profileImage()}}" alt="{{$post->caption}}" class="w-100">
			</a>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-6 pt-1 pb-5">
			<div>
				<span class="font-weight-bold">
					<a href="/profile/{{$post->user->id}}">
						<span class="text-dark">{{ $post->user->username }}</span>
					</a>
				</span> {{ $post->caption }}
			</div>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-12 d-flex justify-content-center">
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection
