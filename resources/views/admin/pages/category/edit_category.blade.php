@extends('admin.layouts.index')
@section('content')
    @include('admin.layouts.title_head',['name' => 'Category', 'actionView' => 'Edit'])
<form style="margin-top: 60px;" class="form-group" action="{{route('update.category',['id' => $findCategory->id])}}" method="post">
        @csrf
        <label for="">Name</label>
        <input class="form-control" type="text" name="name" value="{{$findCategory->name}}">
        <label for="">Status</label>
        <input class="form-control" type="number" value="0" name="status" value="{{$findCategory->status}}>
        <label for="">Choose category</label>
        <select class="form-control" name="parent_id" >
            <option value="0">...</option>
            {{!! $getCategories !!}}
        </select>
        <button style="margin-top: 20px;" type="submit" class="btn btn-sm btn-add">ADD</button>

    </form>

@endsection