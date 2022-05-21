@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <a class="link" href="{{ route('admin.posts.index') }}">
                        {{ __('Go to all Posts of Users') }}
                    </a>

                    <br>
                    <a class="link" href="{{ route('admin.posts.mypost') }}">
                        {{ __('Go To Your Posts') }}
                    </a>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">{{ __('Your Last 2 Posts:') }}</div>

                <div class="card-body">

                    <table class="table table-light table-hover">
                        <thead>
                            <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Content</th>
                            <th class="text-center" scope="col">Created At</th>
                            <th class="text-center" scope="col">Updated At</th>
                            <th class="text-center" scope="col" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr data-id="{{ $post->slug }}">
                                    <th class="text-center" scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{  Str::limit($post->content, 50)  }}</td>
                                    <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($post->updated_at)) }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-delete">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div>
                <h3 class="mt-3"></h3>
                <a class="link" href="{{ route('admin.posts.create') }}">
                    {{ __('Create New Post') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
