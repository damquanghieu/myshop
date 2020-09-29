@extends('admin.layouts.index')

@section('css')
<link rel="stylesheet" href="{{asset('admin/css/product/product.css')}}">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
            $('.btn-ajax-delete').on('click', function(){
                let urlRequest = $(this).data('url');
                let removeParent = $(this);
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: urlRequest,
                            type: "GET",
                            dataType: "json",
                            success:function(data){
                               if(data['code'] == 200){
                                   Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    ),
                                    removeParent.parent().parent().remove();
                                   
                               };
                            }
                        });
                    };
                });
            });
        });
</script>
@endsection
@section('content')
<style>
    .pagination {
        margin: 0, auto;
        height: 10px;
    }
</style>
@include('admin.layouts.title_head',['name' => 'Product', 'actionView' => 'View'])
<div class="row">
    <div class="col-md-12">
        <div class="content-table">
            <div class="title-table">
                <span>Recent Orders</span>
                <div class="button">
                    <a href="{{route('product.create')}}"><button class="btn  btn-sm btn-add">Add</button></a>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getProducts as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <div class="content-image-index">
                                <img class="image-product-index" src="{{asset("$product->feature_image_path")}}" alt="">
                            </div>
                        </td>
                        <td>{{$product->content}}</td>
                        <td>
                            <a href="{{route('product.edit',['id' => $product->id ])}}"><i class="fas fa-edit"></i></a>
                            {{-- <form style="display: inline;" action="#" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="background: none; border: none;" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form> --}}
                            <a class="btn btn-danger btn-ajax-delete"
                                data-url="{{route('product.destroy',['id' => $product->id])}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            <div style="margin-top: 20px;" class="paninate">
                {{ $getProducts->links() }}
            </div>

        </div>

    </div>
</div>
@endsection