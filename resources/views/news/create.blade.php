@extends('layouts.app')



@section('content')

<form method="POST" action="{{ route('news.store') }}">
	{{ csrf_field() }}
	Title:
	<input type="text" name="title"><br><br>

	FullStory:
	<textarea name="fullStory"></textarea><br><br>

	<input type="submit">
</form>

@endsection

