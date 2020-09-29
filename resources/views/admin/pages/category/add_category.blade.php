@extends('admin.layouts.index')
@section('content')
    
    @include('admin.layouts.title_head',['name' => 'Category', 'actionView' => 'Add'])
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>        
        @endforeach
    @endif
    <form style="margin-top: 60px;" class="form-group" action="{{route('store.category')}}" method="post">
        @csrf
        <label for="">Name</label>
        <input class="form-control" type="text" name="name">
        <label for="">Status</label>
        <input class="form-control" type="number" value="0" name="status">
        <label for="">Choose category</label>
        <select class="form-control" name="parent_id" id="">
            <option value="0">...</option>
            {{!! $getAllCategory !!}}
        </select>
        <button style="margin-top: 20px;" type="submit" class="btn btn-sm btn-add">ADD</button>

    </form>

@endsection