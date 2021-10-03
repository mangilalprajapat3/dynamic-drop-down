@extends('layouts.app')
@section('content')
    <div class="col-md-9">
       <div class="card">
           <div class="card-header">
                @if(session('success'))
                    <h5 class="text-success">{{ session('success') }}</h5>
                @elseif(session('error'))
                    <h5 class="text-danger">{{ session('errror') }}</h5>
                @else
                    <h5>{{ _('Edit Category') }}</h5>
                @endif
           </div>
            <div class="row">
                <form action="{{ route('category.update',encrypt($data->id)) }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category Name" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
                </form>
            </div>
       </div>
    </div>
@endsection
