@extends('layout.master')
@section('content')
<section class="section section-custom-1 bg-img-1 section-intro">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-xl-5 text-left">
              <div class="text-big text-decorative text-primary wow fadeInLeft">Delicious</div>
              <h3 class="wow fadeInLeft font-weight-bold text-decor-line text-spacing-200" data-wow-delay=".2s">cakes for you</h3>
              <h4 class="wow fadeInLeft text-spacing-100 text-transform-none text-gray-600 font-weight-normal text-gray-600" data-wow-delay=".3s"><span class="d-xl-block">Sweet Bakery offers the best</span><span class="d-xl-block">cakes and sweets for you.</span></h4><a class="button button-lg button-shadow-2 button-primary button-zakaria wow fadeInUp" href="grid-shop.html">Shop now</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Promo-->
      <section class="section section-sm bg-default pt-xl-0">
        <div class="container">
          <article class="promo-classic offset-negative-1">
            <div class="promo-classic-title">Only Fresh Cakes</div>
            <p class="big promo-classic-text">All of our products are made from scratch using family recipes with only the highest quality ingredients.  We bake and sell fresh daily to ensure only the best products are sold to our customers.</p><a class="button button-sm button-icon-3 button-primary button-zakaria" href="grid-shop.html"><span class="mdi mdi-arrow-right"></span></a>
          </article>
        </div>
      </section>
      <!-- About Us-->
      <section class="section section-sm section-last bg-default">
        <div class="container">
          <h2 class="wow fadeScale">What We offer</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-style-8" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-mouse-drag="false">
            <article class="box-info-modern wow slideInUp" data-wow-delay=".1s"><a class="box-info-modern-figure" href="#"><img src="images/offer-1-340x243.jpg" alt="" width="340" height="243"/></a>
              <h4 class="box-info-modern-title"><a href="#">Party Cupcakes</a></h4>
              <div class="box-info-modern-text">We provide a variety of cupcakes for any party made with high-quality natural ingredients and no preservatives.</div><a class="box-info-modern-link" href="#">Read more</a>
            </article>
            <article class="box-info-modern wow slideInUp"><a class="box-info-modern-figure" href="#"><img src="images/offer-2-340x243.jpg" alt="" width="340" height="243"/></a>
              <h4 class="box-info-modern-title"><a href="#">Choco cakes</a></h4>
              <div class="box-info-modern-text">Nothing tastes better than a chocolate cake with a variety of flavors, which is always available at our bakery.</div><a class="box-info-modern-link" href="#">Read more</a>
            </article>
            <article class="box-info-modern wow slideInUp" data-wow-delay=".1s"><a class="box-info-modern-figure" href="#"><img src="images/offer-3-340x243.jpg" alt="" width="340" height="243"/></a>
              <h4 class="box-info-modern-title"><a href="#">Wedding cakes</a></h4>
              <div class="box-info-modern-text">Want to make your wedding unforgettable? Then you need to order a unique wedding cake at Sweet Bakery!</div><a class="box-info-modern-link" href="#">Read more</a>
            </article>
          </div>
        </div>
      </section>
      <!-- New products-->
      <section class="section section-xxl bg-image-1">
        <div class="container">
          <h2 class="wow fadeScale">New products</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-style-9" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-autoplay="false">
            <!-- Product-->
            @foreach ($products as $product)
            <!-- Product-->
            <article class="product">
                <div class="product-body">
                    <div class="product-figure">
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}" width="152" height="160"/>
                    </div>
                    <h5 class="product-title"><a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a></h5>
                    <div class="product-price-wrap">
                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                    </div>
                </div>
                <!-- Add any additional badges or buttons here -->
            </article>
            @endforeach      
                
          </div>
        </div>
      </section>
      <!-- Services-->
      <section class="section section-xxl bg-default">
        <div class="container">
          <h2 class="pb-xl-0 wow fadeScale">Why choose us</h2>
          <div class="row row-xxl-2 row-30 row-md-40 row-lg-50 align-items-center">
            <div class="col-md-5 col-xl-4">
              <div class="row row-30 row-md-40 row-lg-50 bordered-2">
                <div class="col-sm-6 col-md-12">
                  <article class="box-icon-nancy box-icon-nancy-right text-center text-lg-right wow fadeInLeft">
                    <div class="unit unit-spacing-sm flex-column flex-lg-row-reverse">
                      <div class="unit-left">
                        <div class="double-icon">
                          <div class="box-icon-nancy-icon linearicons-cake"></div>
                          <div class="box-icon-nancy-svg">
                            <svg class="svg-bg" width="77.06" height="71.94" viewBox="0 0 77.06 71.94">
                              <path d="M1220.63,3358.07c8.86-19.66,32.66-7.87,38.1,13a39.053,39.053,0,0,1-27.91,47.63c-20.85,5.44-43.52-6.76-47.59-27.93C1179.83,3373.1,1210.55,3380.43,1220.63,3358.07Z" transform="translate(-1182.94 -3348.03)"></path>
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="unit-body">
                        <h4 class="box-icon-nancy-title"><a href="#">Quality Products</a></h4>
                        <p class="box-icon-nancy-text">We guarantee the quality of all the  cakes we provide as they are baked using the freshest ingredients.</p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 col-md-12">
                  <article class="box-icon-nancy box-icon-nancy-right text-center text-lg-right wow fadeInLeft" data-wow-delay=".1s">
                    <div class="unit unit-spacing-sm flex-column flex-lg-row-reverse">
                      <div class="unit-left">
                        <div class="double-icon">
                          <div class="box-icon-nancy-icon linearicons-truck"></div>
                          <div class="box-icon-nancy-svg">
                            <svg class="svg-bg" width="77.06" height="71.94" viewBox="0 0 77.06 71.94">
                              <path d="M1220.63,3358.07c8.86-19.66,32.66-7.87,38.1,13a39.053,39.053,0,0,1-27.91,47.63c-20.85,5.44-43.52-6.76-47.59-27.93C1179.83,3373.1,1210.55,3380.43,1220.63,3358.07Z" transform="translate(-1182.94 -3348.03)"></path>
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="unit-body">
                        <h4 class="box-icon-nancy-title"><a href="#">free delivery</a></h4>
                        <p class="box-icon-nancy-text">All orders submitted by our US clients are delivered for free throughout the United States.</p>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xl-4 d-none d-md-block wow fadeScale"><img src="images/index-1-377x212.jpg" alt="" width="377" height="212"/>
            </div>
            <div class="col-md-5 col-xl-4">
              <div class="row row-30 row-md-40 row-lg-50 bordered-2">
                <div class="col-sm-6 col-md-12">
                  <article class="box-icon-nancy box-icon-nancy-left text-center text-lg-left wow fadeInRigth">
                    <div class="unit unit-spacing-sm flex-column flex-lg-row">
                      <div class="unit-left">
                        <div class="double-icon">
                          <div class="box-icon-nancy-icon linearicons-lotus"></div>
                          <div class="box-icon-nancy-svg">
                            <svg class="svg-bg" width="77.06" height="71.94" viewBox="0 0 77.06 71.94">
                              <path d="M1220.63,3358.07c8.86-19.66,32.66-7.87,38.1,13a39.053,39.053,0,0,1-27.91,47.63c-20.85,5.44-43.52-6.76-47.59-27.93C1179.83,3373.1,1210.55,3380.43,1220.63,3358.07Z" transform="translate(-1182.94 -3348.03)"></path>
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="unit-body">
                        <h4 class="box-icon-nancy-title"><a href="#">catering service</a></h4>
                        <p class="box-icon-nancy-text">Our bakery also provides an outstanding catering service for events and special occasions.</p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 col-md-12">
                  <article class="box-icon-nancy box-icon-nancy-left text-center text-lg-left wow fadeInRight" data-wow-delay=".1s">
                    <div class="unit unit-spacing-sm flex-column flex-lg-row">
                      <div class="unit-left">
                        <div class="double-icon">
                          <div class="box-icon-nancy-icon linearicons-credit-card"></div>
                          <div class="box-icon-nancy-svg">
                            <svg class="svg-bg" width="77.06" height="71.94" viewBox="0 0 77.06 71.94">
                              <path d="M1220.63,3358.07c8.86-19.66,32.66-7.87,38.1,13a39.053,39.053,0,0,1-27.91,47.63c-20.85,5.44-43.52-6.76-47.59-27.93C1179.83,3373.1,1210.55,3380.43,1220.63,3358.07Z" transform="translate(-1182.94 -3348.03)"></path>
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="unit-body">
                        <h4 class="box-icon-nancy-title"><a href="#">Online payment</a></h4>
                        <p class="box-icon-nancy-text">We accept all kinds of online payments including Visa, MasterCard, American Express credit cards.</p>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- CTA-->
      <section class="section parallax-container" data-parallax-img="images/parallax-bg-1.jpg">
        <div class="parallax-content section-xxl context-light text-md-left bg-overlay-1">
          <div class="container box-cta">
            <h2 class="wow fadeInRight pb-xl-0">Summer sale</h2>
            <div class="group-md-2 group-middle wow fadeInRight" data-wow-delay=".1s"><span class="text-lg title-style-6">-20%</span><span class="heading-4 font-weight-sbold">on all Cakes</span></div>
            <p class="text-width-medium wow fadeInRight" data-wow-delay=".2s">Purchase our tasty cakes and sweets for your next event or family dinner at our online shop and save more money than anywhere.</p><a class="button button-lg button-shadow-2 button-secondary button-zakaria wow fadeInUp" href="grid-shop.html">Shop now</a>
          </div>
        </div>
      </section>

      <!-- About Us-->
      <section class="section section-xxl bg-default">
        <div class="container">
          <h2 class="wow fadeScale">About us</h2>
          <div class="row row-30 row-lg justify-content-center">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft"><img src="images/about-570x511.jpg" alt="" width="570" height="511"/>
            </div>
            <div class="col-md-10 col-lg-6 wow fadeInRight">
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-jean" id="tabs-1">
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-1-1">
                    <div class="box-info-creative">
                      <h4 class="box-info-creative-title"><a href="#">providing quality baked goods for all customers</a></h4>
                      <div class="box-info-creative-text">Our mission is to create a bakery that makes the best quality baked goods on site from scratch, and where both employees and customers would feel comfortable.</div><a class="link-classic box-info-creative-link" href="#">Read more</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-2">
                    <div class="box-info-creative">
                      <h4 class="box-info-creative-title"><a href="#">Ensuring the Best Atmosphere for Everyone</a></h4>
                      <div class="box-info-creative-text">We see the most important part of our business in ensuring the happiness of our staff and the satisfaction of our clients by creating a welcoming and caring atmosphere.</div><a class="link-classic box-info-creative-link" href="#">Read more</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-3">
                    <div class="box-info-creative">
                      <h4 class="box-info-creative-title"><a href="#">Serving only the freshest baked goods for you</a></h4>
                      <div class="box-info-creative-text">We aim to deliver the best baked goods for corporate events and individual celebrations, while also offering the best level of customer service in the United States.</div><a class="link-classic box-info-creative-link" href="#">Read more</a>
                    </div>
                  </div>
                </div>
                <!-- Nav tabs-->
                <div class="nav-tabs-wrap">
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Our mission</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Our Values</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Our goals</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Out Team-->
      <section class="section section-xxl bg-image-1">
        <div class="container">
          <h2 class="wow fadeScale">Our team</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-style-10" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-mouse-drag="false">
            <article class="team-creative wow slideInUp" data-wow-delay=".1s">
              <div class="team-creative-header"><a class="team-creative-figure" href="#"><img src="images/team-1-249x249.jpg" alt="" width="249" height="249"/></a>
                <div class="team-creative-decor"></div>
              </div>
              <div class="team-creative-body">
                <h4 class="team-creative-name"><a href="#">richard smith</a></h4>
                <p class="team-creative-text">Richard has a true passion for baking and that’s why he has been our founder and head baker since day one.</p>
                <ul class="list-inline team-creative-list-social list-social-2 list-inline-sm">
                  <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                  <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                  <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                </ul>
              </div>
            </article>
            <article class="team-creative wow slideInUp">
              <div class="team-creative-header"><a class="team-creative-figure" href="#"><img src="images/team-2-249x249.jpg" alt="" width="249" height="249"/></a>
                <div class="team-creative-decor"></div>
              </div>
              <div class="team-creative-body">
                <h4 class="team-creative-name"><a href="#">Susan Anderson</a></h4>
                <p class="team-creative-text">Susan spends most of her time baking and cake decorating as well as heading up the bakery's marketing initiatives.</p>
                <ul class="list-inline team-creative-list-social list-social-2 list-inline-sm">
                  <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                  <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                  <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                </ul>
              </div>
            </article>
            <article class="team-creative wow slideInUp" data-wow-delay=".1s">
              <div class="team-creative-header"><a class="team-creative-figure" href="#"><img src="images/team-3-249x249.jpg" alt="" width="249" height="249"/></a>
                <div class="team-creative-decor"></div>
              </div>
              <div class="team-creative-body">
                <h4 class="team-creative-name"><a href="#">Steve Ruffalo</a></h4>
                <p class="team-creative-text">Steve is our lead cake designer.  He has designed beautiful cakes for various occasions including weddings, parties, showers, anniversaries and more.</p>
                <ul class="list-inline team-creative-list-social list-social-2 list-inline-sm">
                  <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                  <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                  <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                </ul>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- CTA 2-->
      <section class="section section-xxl section-inset-1 bg-image" style="background-image: url(images/bg-cta-1.jpg);">
        <div class="container box-cta">
          <h3 class="font-weight-normal text-transform-none wow fadeInDown text-decorative text-primary text-spacing-75">Unique Flavors and Fresh Ingredients</h3>
          <h2 class="text-spacing-75 text-black-800 wow fadeScale">All Kinds of Cakes</h2><a class="button button-lg button-primary button-zakaria wow fadeInUp" href="#">Read More</a>
        </div>
      </section>

      <!-- Out Clients-->
      <section class="section section-xxl bg-default">
        <div class="container">
          <h2 class="wow fadeScale">Testimonials</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-style-11" data-items="1" data-sm-items="1" data-md-items="1" data-lg-items="2" data-xl-items="2" data-xxl-items="2" data-margin="30" data-dots="true" data-autoplay="false">
            <!-- Quote Carly-->
            <article class="quote-carly quote-carly-1">
              <div class="quote-carly-text">
                <div class="q">Thank you so much for the elegant cupcakes. They looked and tasted amazing. I’m recommending you to all my friends.</div>
              </div>
              <div class="quote-carly-footer">
                <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                  <div class="unit-left">
                    <div class="quote-carly-figure"><img src="images/user-10-62x62.jpg" alt="" width="62" height="62"/>
                    </div>
                  </div>
                  <div class="unit-body">
                    <div class="quote-carly-author">Patrick Goodman</div>
                    <div class="quote-carly-status">Client</div>
                  </div>
                </div>
              </div>
            </article>
            <!-- Quote Carly-->
            <article class="quote-carly quote-carly-1">
              <div class="quote-carly-text">
                <div class="q">Just a note to let you know how fabulous your wedding cake was. Many guests commented on how delicious it tasted.</div>
              </div>
              <div class="quote-carly-footer">
                <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                  <div class="unit-left">
                    <div class="quote-carly-figure"><img src="images/user-11-62x62.jpg" alt="" width="62" height="62"/>
                    </div>
                  </div>
                  <div class="unit-body">
                    <div class="quote-carly-author">Jane Smith</div>
                    <div class="quote-carly-status">Client</div>
                  </div>
                </div>
              </div>
            </article>
            <!-- Quote Carly-->
            <article class="quote-carly quote-carly-1">
              <div class="quote-carly-text">
                <div class="q">If you are looking for the mouth deliciousness, then you should definitely try the goods from the Sweet Bakery.</div>
              </div>
              <div class="quote-carly-footer">
                <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                  <div class="unit-left">
                    <div class="quote-carly-figure"><img src="images/user-5-62x62.jpg" alt="" width="62" height="62"/>
                    </div>
                  </div>
                  <div class="unit-body">
                    <div class="quote-carly-author">Sam Wilson</div>
                    <div class="quote-carly-status">Client</div>
                  </div>
                </div>
              </div>
            </article>
            <!-- Quote Carly-->
            <article class="quote-carly quote-carly-1">
              <div class="quote-carly-text">
                <div class="q">This bakery was great to work with and I will be using them for my future events. Their cupcakes tasted absolutely delightful.</div>
              </div>
              <div class="quote-carly-footer">
                <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                  <div class="unit-left">
                    <div class="quote-carly-figure"><img src="images/user-6-62x62.jpg" alt="" width="62" height="62"/>
                    </div>
                  </div>
                  <div class="unit-body">
                    <div class="quote-carly-author">Jane Peterson</div>
                    <div class="quote-carly-status">Client</div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- Latest News-->
      <section class="section section-xxl bg-image-1">
        <div class="container">
          <h2 class="wow fadeScale">Latest News</h2>
          <div class="row row-lg row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 wow fadeInLeft">
              <!-- Post Nikki 2-->
              <article class="post post-nikki post-nikki-2">
                <div class="post-nikki-figure"><img src="images/post-1-570x461.jpg" alt="" width="570" height="461"/>
                </div>
                <div class="post-nikki-body">
                  <div>
                    <div class="post-nikki-time">
                      <time datetime="2021-09-08">August 9, 2021</time>
                    </div>
                    <div class="post-nikki-title"><a href="blog-post.html">How to Pipe a Fluffy Frosting Border on a Cake</a></div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6">
              <div class="row row-30">
                <div class="col-6 col-md-12 wow fadeInRight">
                  <!-- Post Nikki-->
                  <article class="post post-nikki">
                    <div class="unit unit-spacing-lg flex-column flex-md-row align-items-center">
                      <div class="unit-left"><a class="post-nikki-figure" href="blog-post.html"><img src="images/post-2-270x215.jpg" alt="" width="270" height="215"/></a></div>
                      <div class="unit-body">
                        <div class="post-nikki-time">
                          <time datetime="2021-09-08">August 9, 2021</time>
                        </div>
                        <div class="post-nikki-title"><a href="blog-post.html">Recipe of the Day: Pumpkin Spice Latte Cake</a></div>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-6 col-md-12 wow fadeInRight">
                  <!-- Post Nikki-->
                  <article class="post post-nikki">
                    <div class="unit unit-spacing-lg flex-column flex-md-row align-items-center">
                      <div class="unit-left"><a class="post-nikki-figure" href="blog-post.html"><img src="images/post-3-270x215.jpg" alt="" width="270" height="215"/></a></div>
                      <div class="unit-body">
                        <div class="post-nikki-time">
                          <time datetime="2021-09-08">August 9, 2021</time>
                        </div>
                        <div class="post-nikki-title"><a href="blog-post.html">Top 5 Tips for Successful Cake Baking</a></div>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Clients-->
      <section class="section section-xl bg-img-2">
        <div class="container">
          <div class="owl-carousel owl-style-2" data-items="2" data-sm-items="3" data-md-items="4" data-lg-items="5" data-margin="30" data-dots="true"><a class="clients-classic" href="#"><img src="images/clients-1-120x112.png" alt="" width="120" height="112"/></a><a class="clients-classic" href="#"><img src="images/clients-2-105x118.png" alt="" width="105" height="118"/></a><a class="clients-classic" href="#"><img src="images/clients-3-111x98.png" alt="" width="111" height="98"/></a><a class="clients-classic" href="#"><img src="images/clients-4-122x92.png" alt="" width="122" height="92"/></a><a class="clients-classic" href="#"><img src="images/clients-5-111x111.png" alt="" width="111" height="111"/></a></div>
        </div>
      </section>
@endsection