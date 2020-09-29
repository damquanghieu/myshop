@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/css/add.css')}}">
@endsection


@section('content')

    @include('admin.layouts.title_head',['name' => 'Slide', 'actionView' => 'Add'])

  {{--   @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>        
        @endforeach
    @endif --}}
    <div class="col-md-8">
        <form class="form-group" action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                @error('name')
                    <p class="custom-add-errors">{{$message}}</p>
                @enderror
                

            <label for="">Description</label>
            <input class="form-control" type="text"  name="description" value="{{ old('price') }}">
                @error('price')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <label for="">Image</label>
            <label class="custom-upload-file" for="uploadFile">Upload File</label>
            <input style="display: none" class="input-upload-file" id="uploadFile" type="file"  name="image" value="{{ old('image') }}">
                @error('image')
                <p class="custom-add-errors">{{$message}}</p>
                @enderror

            <button  type="submit" class="btn btn-sm btn-add">ADD</button>
        </form>
    </div>
@endsection