@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
       <div class="col-12 col-md-9">
           @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="mb-0" style="font-weight: bold">
                        <a href="{{ route('post', $post->id) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            {{ Str::limit(strip_tags($post->body), 400) }}

                            <div class="mt-4">
                                <a class="btn btn-primary" href="{{ route('post', $post->id) }}">Read More</a>
                            </div>
                        </div>
                        <div class="col-3">
                            @if($post->media_id)
                            <img src="/storage/{{ $post->media->path }}" style="max-width: 100%" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $posts->links() }}
       </div>
       <div class="col-12 col-md-3">
        @include('layouts.search')
        @include('layouts.categories')
       </div>
   </div>
</div>


@endsection