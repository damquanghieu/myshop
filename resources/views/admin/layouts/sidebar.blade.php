<style>
    .sub-menu {
        padding-left: 30px;
        display: none;
        border-radius: 10px;
        background-color: #fff;

    }
    .sub-menu li{
        background: 

    }
    .menu-items li:hover .sub-menu{
        display: block;
    }
</style>
<div class="side-bar">
    <div style="" class="logo">
       <span>Hiếu</span>
    </div>
    <ul class="menu-items">
        <a href="home"><li><i class="fas fa-tachometer-alt"></i>DashBoard</li></a>
        <a href="{{route('index.category')}}"><li><i class="fas fa-align-justify"></i>Category
           {{--  <ul class="sub-menu">
                <li>A</li>
                <li>B</li>
            </ul> --}}
        </li></a>
        <a href="{{route('menu.index')}}"><li><i class="fas fa-align-justify"></i>Menu</li></a>
        <a href="{{route('product.index')}}"><li><i class="fas fa-tshirt"></i>Product</li></a>
        <a href="#"><li><i class="fas fa-sliders-h"></i>Slide</li></a>
        <a href="#"> <li><i class="fas fa-users"></i>Users</li></a>
    </ul>
</div>