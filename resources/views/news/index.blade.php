@extends('layouts.app')



@section('content')

<a href="{{ route('news.create') }}">Add news</a>

<ul>

@foreach($news as $n)

	<li>
		<a href="{{ route('news.show', $n->id) }}">
			{{ $n->title }}
		</a> - 
		<a href="{{ route('news.edit', $n->id) }}">
			Edit
		</a> / 

		<form action="{{ route('news.destroy', $n->id) }}" method="POST">

			{{ csrf_field() }}
			<input type="hidden" name="_method" value="DELETE">

			<input type="submit" value="Remove">
		</form>
	</li>

@endforeach

</ul>


@endsection

