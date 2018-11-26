@extends('layouts.app')



@section('content')

<form method="POST" action="{{ route('news.update', $n->id) }}">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">

	Title:
	<input type="text" name="title" value="{{ $n->title }}"><br><br>

	FullStory:
	<textarea name="fullStory">{{ $n->fullStory }}</textarea><br><br>

	<input type="submit">
</form>

@endsection





