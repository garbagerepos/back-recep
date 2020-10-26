@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" {{--href="{{ route('products.create') }}--}}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <form {{--action="{{ route('products.destroy',$post->id) }}"--}} method="POST">
{{--                        <a class="btn btn-info" href="{{ route('products.show',$post->id) }}">Show</a>--}}
                        @can('product-edit')
{{--                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>--}}
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
    </table>
@endsection
