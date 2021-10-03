@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('subcategory.create') }}" class="btn btn-info">Add New Subcategory</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if(session('success'))
                            <h5 class="text-success">{{ session('success') }}</h5>
                        @elseif(session('error'))
                            <h5 class="text-danger">{{ session('error') }}</h5>
                        @else
                            <h5 class="text-dark">{{ __('Categories') }}</h5>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Update Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->category->name }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit',encrypt($value->id)) }}">Edit</a><br>
                                            <a href="{{ route('subcategory.delete',encrypt($value->id)) }}">Delete</a>
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
@endsection
