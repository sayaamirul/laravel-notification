@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials.alerts')
            @foreach ($articles as $article)
                <div class="card">
                    <div class="card-header">
                        <h3><a href="{{ route('article.show', $article) }}">{{ $article->title }}</a></h3> by {{ $article->user->name }}
                        <span class="float-right">{{ $article->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="card-body">
                        <p>{{ str_limit($article->body, 100) }}</p>
                        <hr>
                        <p class="float-right">
                            Comments ({{ $article->comments()->count() }})
                        </p>
                    </div>
                </div>

                <div class="mb-3"></div>
            @endforeach
        </div>
    </div>
</div>
@endsection
