@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-info">
                <h4>Informasi</h4>
                Tutorial contoh aplikasi ini dapat dibaca pada tulisan <a href="https://www.laravel.web.id/2017/11/20/upload-file-menggunakan-filesystem-laravel/" class="alert-link">Upload File Menggunakan Filesystem Laravel</a>.
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Upload New File</div>

                <div class="panel-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>
                        <a href="{{ route('file.form') }}" class="btn btn-primary">Upload File</a>
                    </p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Path</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->title }}</td>
                                        <td>{{ $file->filename }}</td>
                                        <td>{{ $file->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ Storage::url($file->filename) }}" title="View file {{ $file->title }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('file.response', $file->id) }}" title="Show or download file {{ $file->title }}">
                                                <i class="fa fa-expand fa-fw"></i>
                                            </a>
                                            <a href="{{ route('file.download', $file->id) }}" title="Download file {{ $file->title }}">
                                                <i class="fa fa-download fa-fw"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
