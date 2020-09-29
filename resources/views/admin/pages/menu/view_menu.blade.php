@extends('admin.layouts.index')
@section('content')
    @include('admin.layouts.title_head',['name' => 'Menu', 'actionView' => 'view'])
    <div class="row">
        <div class="col-md-12">
            <div class="content-table">
                <div class="title-table">
                    <span>Recent Orders</span>
                    <div class="button">
                        <a href="{{route('menu.create')}}"><button class="btn  btn-sm btn-add">Add</button></a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getMenus as $menu)
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->parent_id}}</td>
                                <td>
                                    <a href="{{route('menu.edit',['id' => $menu->id])}}"><i class="fas fa-edit"></i></a>
                                    <form class="form-delete" style="display: inline;" action="{{route('menu.destroy',['id' => $menu->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="confirm" style="background: none; border: none;" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                
                </table>
                <div style="margin-top: 20px;" class="paninate">
                    {{ $getMenus->links() }}
                </div>

            </div>
            
        </div>
    </div>
@endsection