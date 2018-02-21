@extends('layouts.app')

@section('title','Post')
@section('content')

	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            	<div class="card card-default">
                	
                    <div class="card-header"> 
                        {{ $post->title }}
                        <div class="float-right"><small> category : {{ $post->category->name }} </small></div>
                    </div>

                    <div class="card-body"> <p> {{ $post->content }} </p> </div>
            	</div> 
                
                <br>

                <div class="card card-default">
                    <div class="card-header">{{ $post->comments()->count() }} Komentar </div>
                    @foreach ($post->comments()->get() as $comment)
                        <div class="card-body">
                            <h5>{{ $comment->user->name }} <small class="text-muted">{{ $comment->updated_at->diffForHumans() }}</small> </h5>
                            <p class="form-control"> {{ $comment->message }} </p>
                            @if ($comment->user_id == auth()->id())
                                <div class="float-right">
                                    <form action=" {{ route('comment.edit',$comment->id) }} " method="get">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                    </form>
                                </div>
                                <div class="float-right">
                                    <form action=" {{ route('comment.destroy',$comment->id) }} " method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            @else
                                {{-- false expr --}}
                            @endif
                        </div>
                        <hr>
                    @endforeach
                </div>

                <br>

                <div class="card card-default">
                    <div class="card-header"> Komentar </div>
                    <div class="card-body"> 
                        <form action="{{ route('post.comment.store', $post->id) }}"  method="post">
                            {{ csrf_field() }}
                            <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Tuliskan Komentar anda disini..."></textarea>
                            <br>
                            <div class="float-right">
                                <input type="submit" value="comment" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div> <br>
        </div>
    </div>
</div>
@endsection