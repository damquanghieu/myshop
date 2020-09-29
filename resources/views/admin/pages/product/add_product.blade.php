@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/css/product/product.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2-multiple").select2({
                tags: true,
                tokenSeparators: [',']
            })
        });
       
    </script>
@endsection

@section('content')

    @include('admin.layouts.title_head',['name' => 'Product', 'actionView' => 'Add'])

  {{--   @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>        
        @endforeach
    @endif --}}
    <div class="col-md-8">
        <form class="form-group" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="custom-add-errors">{{$message}}</p>
                @enderror
                

            <label for="">Price</label>
            <input class="form-control" type="number"  name="price" value="{{ old('price') }}">
                @error('price')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <label for="">Feature Image</label>
            <label class="custom-upload-file" for="uploadFile">Upload File</label>
            <input style="display: none" class="input-upload-file" id="uploadFile" type="file"  name="feature_image_path" value="{{ old('feature_image_path') }}">
                @error('feature_image_path')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <label for="">Image Details</label>
            <label class="custom-upload-file" for="imageDetails">Upload File</label>
            <input style="display: none" multiple class="input-upload-file" id="imageDetails" type="file"  name="image_detail[]">
                @error('image_detail')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <label for="tag">Tags</label> 
            <select class="select2-multiple form-control" multiple="multiple" name="tags[]" id="tag" >
                @if (old('tags'))
                    @foreach (old('tags')  as $tag)
                    <option selected="selected" value="{{$tag}}">{{$tag}}</option>
                    @endforeach
                @endif
            </select>
                @error('tags')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <label for="">Content</label>
            <input class="form-control" type="text"  name="content" value="{{ old('content') }}">
                @error('content')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <label for="">User_id</label>
            <input class="form-control" type="number"  name="user_id">

            <label for="">Choose category</label>
            <select class="form-control" name="category_id">
                <option value="0">...</option>
                {{!! $getCategory !!}}
            </select>
            
            <button  type="submit" class="btn btn-sm btn-add">ADD</button>
        </form>
    </div>
@endsection