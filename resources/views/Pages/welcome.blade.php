@extends('main')

@section('title' , '| Homepage')


@section('content')
     <div class="row">
         <div class="col-md-12">
             <div class="jumbotron">
  <h1>Welcome to my blog</h1>
  <p class="lead">Thanks for visiting .This is my test website built on the laravel frame work</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button"> Popular Posts</a></p>
</div>
         </div>
     </div>
     <div class="row">

   
     <div class="col-md-8">
     @foreach($posts as $post)
       <div class="posts">
     <h2>{{ $post->title}}</h2>
        
    <p>{{substr($post->body,0,200)}} {{strlen($post->body) > 200 ? '...': ''}}</p>
<a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read More</a>
<hr >
</div>
 @endforeach
</div>
     <div class="col-md-3 col-offset-1" style="color:red;">
            <h2>Sidebar</h2>

     </div>
     </div>
@endsection