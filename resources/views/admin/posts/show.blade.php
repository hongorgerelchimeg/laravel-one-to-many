@extends('layouts.admin')

@section('pageTitle', $post->title)

@section('pageContent')
{{-- {{dd($post)}} --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    </div>
@endsection
