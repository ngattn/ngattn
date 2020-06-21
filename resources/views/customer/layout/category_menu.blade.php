<div class="col-lg-3">
    <!--Category Menu Start-->
    <div class="category-menu">
        <div class="category-heading">
            <h2 class="categories-toggle"><span>Sản phẩm</span></h2>
        </div>
        <div id="cate-toggle" class="category-menu-list">
            <ul>
                @foreach($Categories as $Categorie)
                @if(count($Categorie->typeProducts) > 0)
                <li class="right-menu"><a href="shop-left-sidebar.html">{{ $Categorie->name }}</a>
                    <ul class="cat-mega-menu">
                        @foreach($Categorie->typeProducts as $typeProduct)
                        <li class="right-menu cat-mega-title">
                           <a href="{{ url('loai-san-pham/'.$typeProduct->id.'/'.$typeProduct->slug.'.html') }}">{{ $typeProduct->name }}</a>
                            <!-- <ul>
                                <li><a href="#">All Videos</a></li>
                                <li><a href="#">Blouses</a></li>
                                <li><a href="#">Evening Dresses</a></li>
                                <li><a href="#">Summer Dresses</a></li>
                                <li><a href="#">T-shirts</a></li>
                                <li><a href="#">Rent or Buy</a></li>
                                <li><a href="#">Your Watchlist</a></li>
                                <li><a href="#">Watch Anywhere</a></li>
                                <li><a href="#">Getting Started</a></li>
                            </ul> -->
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!--Category Menu End-->
</div>