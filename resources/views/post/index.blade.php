@extends('layouts.app')

@section('title','Index')

@section('content')

	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach ($posts as $post)
            	<div class="card card-default">
                	
                    <div class="card-header">
                        {{ $post->title }}
                        
                       <div class="float-right">
                            <form action=" {{ route('post.destroy',$post->id) }} " method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                       </div>

                        <div class="float-right">
                            <form action=" {{ route('post.edit', $post->id) }} ">
                                <button class="btn btn-sm btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
	                
                    <div class="card-body">
	                  <p> {{ $post->content }} </p> 
	                   
                    </div>
            	</div> <br>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
