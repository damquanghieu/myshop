@extends('admin.layouts.index')
@section('content')
    @include('admin.layouts.title_head',['name' => 'Menu', 'actionView' => 'Edit'])
    <form style="margin-top: 60px;" class="form-group" action="{{route('menu.update',['id' => $findMenu->id])}}" method="post">
        @csrf
        <label for="">Menu name</label>
        <input class="form-control" type="text" name="name" value="{{$findMenu->name}}">
        <label for="">Choose menu parent</label>
        <select class="form-control" name="parent_id" >
            <option value="0">...</option>
            {{!! $htmlMenus !!}}
            
        </select>
        <button style="margin-top: 20px;" type="submit" class="btn btn-sm btn-add">Add</button>

    </form>

@endsection