@extends('layouts.app')

@section('title','Edit Post')

@section('content')
	<div class="container">
		<form action=" {{ route('comment.update',$comment->id) }} " method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label for="">Edit Komentar</label>
			</div>
			<div class="card card-default">
                <div class="card-body"> 
                    {{ csrf_field() }}
                    <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Edit Komentar anda disini..."> {{ $comment->message }} </textarea>
                </div>
            </div> 
			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-block" value="edit">	
			</div>
		</form>
	</div>	
@endsection