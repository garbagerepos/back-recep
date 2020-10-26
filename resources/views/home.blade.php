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
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="comtainer">
        <form method="post" action="{{route('fileUpload')}}" class="form-group" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <input type="submit" value="Yükle" class="btn btn-primary">
        </form>
    </div>
<form action="{{route('fileDownload')}}" method="get">
    @csrf
    <input type="submit" value="Indir">
</form>
@endsection
