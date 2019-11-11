@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-8">
			<img src="/storage/{{$post->image}}" alt="{{$post->caption}}" class="w-100">
		</div>
	</div>
</div>
@endsection
