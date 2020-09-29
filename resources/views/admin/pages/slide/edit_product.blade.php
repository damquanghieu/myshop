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

    @include('admin.layouts.title_head',['name' => 'Product', 'actionView' => 'Edit'])

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>        
        @endforeach
    @endif
    <div class="col-md-8">
        <form class="form-group" action="{{route('product.update',['id'=>$findProductId->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name</label>
            <input class="form-control" type="text" name="name" value="{{$findProductId->name}}">

            <label for="">Price</label>
            <input class="form-control" type="number"  name="price" value="{{$findProductId->price}}">

            <label for="">Feature Image</label>
            <label class="custom-upload-file" for="uploadFile">Upload File</label>
            <input style="display: none" class="input-upload-file" id="uploadFile" type="file"  name="feature_image_path">

            <div class="product-image">
                <img class="feature-image" src="{{asset("$findProductId->feature_image_path")}}" alt="">
            </div>

            <label for="">Image Details</label>
            <label class="custom-upload-file" for="imageDetails">Upload File</label>
            <input style="display: none" multiple class="input-upload-file" id="imageDetails" type="file"  name="image_detail[]">

            <div class="product-image-detail">
                    @foreach ($findProductId->images as $key => $item)
                        @if ($key<1)
                            <div class="product-images">
                        @else
                            <div style="margin-left: 10px;" class="product-images">
                        @endif
                        <img class="image-detail" src="{{asset("$item->path_name_image")}}" alt="">
                        </div>
                    @endforeach
            </div>
            <div class="clear-float"></div>

            <label style="float:none;" for="tag">Tags</label>
            <select class="select2-multiple form-control" multiple="multiple" name="tags[]" id="tag">
                @foreach ($findProductId->tags as $tag)
                    <option value="{{$tag->name}}" selected>{{$tag->name}}</option>
                @endforeach
            </select>
            
            <label for="">Content</label>
            <input class="form-control" type="text"  name="content" value="{{$findProductId->content}}">


            <label for="">User_id</label>
            <input class="form-control" type="number"  name="user_id">
            <label for="">Choose category</label>
            <select class="form-control" name="category_id">
                <option value="0">...</option>
                {{!! $html !!}}
            </select>
            
            <button  type="submit" class="btn btn-sm btn-add">Update</button>
        </form>
    </div>
@endsection