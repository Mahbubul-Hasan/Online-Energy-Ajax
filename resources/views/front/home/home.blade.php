@extends("front.master")

@section('title')
Home
@endsection

@section('content')

<!-- Carousel-->
@include('front.includes.carouselSlide')
<!-- /.carousel -->

<div class="content-top">
    <div class="container">
        <div style="float: right">
            <input type="text" name="search" id="productSearch" placeholder="Search" style="width: 300px;height: 35px;">
            <i class="fa fa-search"style="color: #ffb100; font-size: 25px;"></i>
        </div>
    </div>
</div>
<div id="homeProducts">
    @include('front.home.homeProducts')
</div>

@include('front.includes.productmodal')
@endsection