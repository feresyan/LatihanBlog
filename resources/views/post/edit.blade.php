@extends('layouts.app')

@section('title','Edit Post')

@section('content')
	<div class="container">
		<form action=" {{ route('post.update', $post->id) }} " method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label for="">Title</label>
				<input type="text" class="form-control" name="title" placeholder="post title" value="{{ $post->title }}">
			</div>

			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" id="" class="form-control">
					@foreach ($categories as $category)
						<option value=" {{ $category->id }} ">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="">Content</label>
				<textarea name="content" cols="30" rows="5" class="form-control" placeholder="Write Your Content Here.."> {{$post->content}} </textarea>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="edit">	
			</div>
		</form>
	</div>	
@endsection