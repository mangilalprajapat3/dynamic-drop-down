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
                    <h5>{{ _('Edit Product') }}</h5>
                @endif
           </div>
            <div class="row">
                <form action="{{ route('product.update',encrypt($data->id)) }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-lable">Category</label>
                    <select name="category" class="form-control" id="category">
                        <option value="">Select Category</option>
                        @foreach(App\Models\Category::orderBy('name')->get() as $key => $value)
                            <option value="{{ $value->id }}" @if($value->id==$data->category_id) selected @endif>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-lable">Subcategory</label>
                    <select name="subcategory" class="form-control" id="subcategory">
                        <option value="">Select Subcategory</option>
                        @if($data->category_id)
                            @foreach(App\Models\Subcategory::whereCategoryId($data->category_id)->orderBy('name')->get() as $key => $value)
                                <option value="{{ $value->id }}" @if($value->id==$data->subcategory_id) selected @endif>{{ $value->name }}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Subcategory Name" value="{{$data->name }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Enter Price" value="{{ $data->price }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $data->descriptions }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
                </form>
            </div>
       </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $('#category').on('change', function() {
            get_subcategory_by_category();
        });
        function get_subcategory_by_category(){
          var category_id = $('#category').val();
          $.post('{{route('getsubcategory')}}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
              $('#subcategory').html(null);
              $('#subcategory').append($('<option value="">Select Subcategory</option>', {

              }));
              for (var i = 0; i < data.length; i++) {
                  $('#subcategory').append($('<option>', {
                      value: data[i].id,
                      text: data[i].name
                  }));

              }
          });
        }
     </script>
@endsection
