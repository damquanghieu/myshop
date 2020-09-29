@extends('admin.layouts.index')

@section('css')
@endsection

@section('content')
<style>
    .pagination {
        margin: 0, auto;
        height: 10px;
    }
</style>
@include('admin.layouts.title_head',['name' => 'Slide', 'actionView' => 'View'])
<div class="row">
    <div class="col-md-12">
        <div class="content-table">
            <div class="title-table">
                <span>Recent Orders</span>
                <div class="button">
                    <a href="{{route('slide.create')}}"><button class="btn  btn-sm btn-add">Add</button></a>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getSlides as $slide)
                    <tr>
                        <td>{{$slide->id}}</td>
                        <td>{{$slide->title}}</td>

                        <td>
                            <div class="content-image-index">
                                <img class="image-slide-index" src="{{asset("$slide->image")}}" alt="">
                            </div>
                        </td>
                        <td>{{$slide->description}}</td>
                        <td>
                            <a href="{{route('slide.edit',['id' => $slide->id ])}}"><i
                                    class="fas fa-edit"></i></a>
                            {{-- <form style="display: inline;" action="#" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="background: none; border: none;" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form> --}}
                            <a class="btn btn-danger btn-ajax-delete"
                                data-url="{{route('slide.destroy',['id' => $slide->id])}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 20px;" class="paninate">
                {{ $getSlides->links() }}
            </div>
        </div>
    </div>
</div>
@endsection