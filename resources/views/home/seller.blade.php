<section class="flat-spacing-5 flat-categorie">
    <div class="container">
        <div class="flat-title">
            <span class="title wow fadeInUp" data-wow-delay="0s">Best Seller</span>
            <p class="sub-title wow fadeInUp" data-wow-delay="0s">Shop the Latest Styles: Stay ahead of the curve with our newest arrivals</p>
        </div>
        <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-5">
            @foreach($product as $products)
            <div class="card-product fl-item">
                <div class="card-product-wrapper">
                    <a href="product-detail.html" class="product-img">
                        <img class="lazyload img-product"  src="product/{{$products->image}}" alt="image-product">
                        <img class="lazyload img-hover" src="product/{{$products->image}}" alt="image-product">
                    </a>

                </div>
                <div class="card-product-info">
                    <a href="product-detail.html" class="title link"><h6>{{$products->title}} {{$products->description}}</h6></a>
                    @if($products->discount_price != null)
                        <h6 style="color: red">
                                Discount price :
                            % {{$products->discount_price*10}}
                        </h6>
                            <h6 style="text-decoration:blue">
                            Price :
                            {{$products->price}} L.E
                            </h6>
                        @else
                            <h6 style="color: blue">
                            Price
                            <br>
                            L.E {{$products->price}}
                        </h6>
                        @endif
                        <div class="list-product-btn">
                        <form action="{{url('add_cart',$products->id)}}" method="post">
                            @csrf
                                <input type="number" name="quantity" value="1" min="1" style="width: 60px">
                                <input type="submit" value="  Add to cart  " class="option" style="height: 40px">
                            </form>
                            <form action="{{ route('show.cart') }}"  style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="display: inline;"><i class="icon icon-bag" ></i></button>
                            </form>
                        </div>
                    </div>
            </div>
            @endforeach
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </div>
</section>
