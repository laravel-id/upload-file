@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="alert alert-info">
                <h4>Informasi</h4>
                Bahasan singkat tentang demo aplikasi ini dapat dibaca pada <a class="alert-link" href="https://www.laravel.web.id/2017/12/20/multiple-upload-file-menggunakan-filesystem-di-laravel/">Upload Multiple File Menggunakan Filesystem di Laravel </a>.
            </div>

            <div class="alert alert-warning">
                <h4>Perhatian!</h4>
                Mohon untuk tidak menggunggah berkas sensitif atau krusial ke dalam contoh aplikasi.
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Upload New File</div>

                <div class="panel-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->all())
                        <div class="alert alert-danger">
                            <h4>Kesalahan</h4>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('multiple.upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                            <label>File</label>
                            <input type="file" name="files[]">
                        </div>

                        <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                            <label>File</label>
                            <input type="file" name="files[]">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
