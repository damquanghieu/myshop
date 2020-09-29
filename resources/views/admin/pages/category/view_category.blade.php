@extends('admin.layouts.index')
@section('content')
<style>
    .pagination{
        margin: 0, auto;
        height: 10px;
    }
</style>
    @include('admin.layouts.title_head',['name' => 'Category', 'actionView' => 'View'])
    <div class="row">
        <div class="col-md-12">
            <div class="content-table">
                <div class="title-table">
                    <span>Recent Orders</span>
                    <div class="button">
                      <a href="{{route('create.category')}}"><button class="btn  btn-sm btn-add">Add</button></a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Parent_ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getCategories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->parent_id}}</td>
                                <td>
                                    <a href="{{route('edit.category',['id' => $item->id])}}"><i class="fas fa-edit"></i></a>
                                    <form style="display: inline;" action="{{route('destroy.category',['id' => $item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="background: none; border: none;" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                  
                </table>
                <div style="margin-top: 20px;" class="paninate">
                    {{ $getCategories->links() }}
                </div>

            </div>
            
        </div>
    </div>
@endsection