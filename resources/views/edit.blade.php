@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                           
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Post</h1>
                            </div>
                            <form class="user" method="post" action="{{ url('/posts'.'/'.$post->id) }}">
                                @csrf
                                @method('PUT') <!-- This is required to spoof the PUT method -->
                                <div class="form-group">
                                    <label for="title">Title of Post</label>
                                    <input type="text" class="form-control " id="title" name="title"
                                        placeholder="Enter the title of the post"  value="{{ $post->title }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Content of Post</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="Enter the content of the post"> {{ $post->content }} </textarea>
                                    @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="user_id">Author</label>
                                    <select class="form-control" id="user_id" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"  @if($user->id==$post->id ) selected @endif >
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update Post
                                </button>
                                <hr>

                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
