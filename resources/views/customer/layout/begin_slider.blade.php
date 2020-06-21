<div class="col-lg-9">
    <div class="slider-area pt-sm-30 pt-xs-30">
        <div class="slider-active owl-carousel">
            <!-- Begin Single Slide Area -->
            @foreach($slides as $slide)
            <div class="single-slide align-center-left animation-style-02 bg-4" style="background-image: url( {{url($slide->file_path? 'uploads/slides/'.$slide->file_path : 'customer/assets/images/blog-post/blog_big_01.jpg')}} );width: 100%;">
                <div class="slider-progress"></div>
                <div class="slider-content">
                    <!-- <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                    <h2>Chamcham Galaxy S9 | S9+</h2>
                    <h3>Starting at <span>$589.00</span></h3>
                    <div class="default-btn slide-btn">
                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                    </div> -->
                </div>
            </div>
            @endforeach
            <!-- Single Slide Area End Here -->
        </div>
    </div>
</div>