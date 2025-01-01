@extends('layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}

            </div>
        @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Post</h1>
        <a href="{{ url('/posts/create') }}" class="btn btn-primary btn-icon-split mb-2">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Add Post</span>
        </a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>content</th>
                                <th>auth</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>title</th>
                                <th>content</th>
                                <th>auth</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">                                            <a href="{{ url('/posts/edit/' . $post->id) }}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </a>
                                            <form class="user d-inline-block" method="post"
                                                action="{{ route('posts.delete', $post->id) }}">
                                                @csrf
                                                @method('delete') <!-- This is required to spoof the PUT method -->
                                                <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
