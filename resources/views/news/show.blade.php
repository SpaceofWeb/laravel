@extends('layouts.app')


@section('content')

<h1>{{ $n->title }}</h1>

<div>
	{{ $n->fullStory }}
</div>

@endsection

