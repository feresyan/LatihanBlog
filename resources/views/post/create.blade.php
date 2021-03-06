@extends('layouts.app')

@section('title','Create Post')

@section('content')
	<div class="container">
		<form action=" {{ route('post.store') }} " method="post">
			{{ csrf_field() }}
			<div class="form-group {{ $errors->has('title') ? 'alert alert-danger' : '' }}">
				<label for="">Title</label>
				<input type="text" class="form-control" name="title" placeholder="post title" value=" {{ old('title') }} " >
				@if ($errors->has('title'))
					<span class="help-block">
						<p>{{ $errors->first('title') }}</p>
					</span>
				@endif
			</div>

			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" id="" class="form-control">
					@foreach ($categories as $category)
						<option value=" {{ $category->id }} ">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group  {{ $errors->has('content') ? 'alert alert-danger' : '' }}">
				<label for="">Content</label>
				<textarea name="content" cols="30" rows="5" class="form-control" placeholder="Write Your Content Here.."> {{ old('content') }} </textarea>
				@if ($errors->has('content'))
					<span class="help-block">
						<p>{{ $errors->first('content') }}</p>
					</span>
				@endif
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success btn-block" value="submit">	
			</div>
		</form>
	</div>	
@endsection