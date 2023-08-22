@extends('layout.master')
@section('content')
<section class="breadcrumbs-custom">
        <div class="parallax-container" data-parallax-img="images/breadcrumbs-bg.jpg">
          <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
              <h2 class="breadcrumbs-custom-title">Shop List</h2>
            </div>
          </div>
        </div>
        <div class="breadcrumbs-custom-footer">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li><a href="grid-shop.html">Shop</a></li>
              <li class="active">Shop List</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Section Shop-->
      <section class="section section-xxl bg-default text-md-left">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-4 col-xl-3">
              <div class="aside row row-30 row-md-50 justify-content-md-between">
                <div class="aside-item col-12">
                  <h6 class="aside-title">Filter by Price</h6>
                  <!-- RD Range-->
                  <div class="rd-range" data-min="0" data-max="999" data-min-diff="100" data-start="[66, 635]" data-step="1" data-tooltip="false" data-input=".rd-range-input-value-1" data-input-2=".rd-range-input-value-2"></div>
                  <div class="group-xs group-justify">
                    <div>
                      <button class="button button-sm button-secondary button-zakaria" type="button">Filter</button>
                    </div>
                    <div>
                      <div class="rd-range-wrap">
                        <div class="rd-range-title">Price:</div>
                        <div class="rd-range-form-wrap"><span>$</span>
                          <input class="rd-range-input rd-range-input-value-1" id="test" type="text" name="value-1">
                        </div>
                        <div class="rd-range-divider"></div>
                        <div class="rd-range-form-wrap"><span>$</span>
                          <input class="rd-range-input rd-range-input-value-2" type="text" name="value-2">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="aside-item col-sm-6 col-md-5 col-lg-12">
                  <h6 class="aside-title">Categories</h6>
                  <ul class="list-shop-filter">
                    <li>
                      <label class="checkbox-inline">
                        <input name="input-group-radio" value="checkbox-1" type="checkbox">All
                      </label><span class="list-shop-filter-number">(18)</span>
                    </li>
                    <li>
                      <label class="checkbox-inline">
                        <input name="input-group-radio" value="checkbox-2" type="checkbox">Cakes
                      </label><span class="list-shop-filter-number">(9)</span>
                    </li>
                    <li>
                      <label class="checkbox-inline">
                        <input name="input-group-radio" value="checkbox-3" type="checkbox">Puddings
                      </label><span class="list-shop-filter-number">(5)</span>
                    </li>
                    <li>
                      <label class="checkbox-inline">
                        <input name="input-group-radio" value="checkbox-4" type="checkbox">Sweets
                      </label><span class="list-shop-filter-number">(8)</span>
                    </li>
                  </ul>
                  <!-- RD Search Form-->
                  <form class="rd-search form-search" action="search-results.html" method="GET">
                    <div class="form-wrap">
                      <label class="form-label" for="search-form">Search in shop...</label>
                      <input class="form-input" id="search-form" type="text" name="s" autocomplete="off">
                      <button class="button-search fl-bigmug-line-search74" type="submit"></button>
                    </div>
                  </form>
                </div>
                <div class="aside-item col-sm-6 col-lg-12">
                  <h6 class="aside-title">Popular products</h6>
                  <div class="row row-20 gutters-10">
                    <div class="col-4 col-sm-6 col-md-12">
                      <!-- Product Minimal-->
                      <article class="product-minimal">
                        <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                          <div class="unit-left"><a class="product-minimal-figure" href="single-product.html"><img src="images/product-mini-1-106x104.png" alt="" width="106" height="104"/></a></div>
                          <div class="unit-body">
                            <p class="product-minimal-title"><a href="single-product.html">Chocolate Pudding</a></p>
                            <p class="product-minimal-price">$25.00</p>
                          </div>
                        </div>
                      </article>
                    </div>
                    <div class="col-4 col-sm-6 col-md-12">
                      <!-- Product Minimal-->
                      <article class="product-minimal">
                        <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                          <div class="unit-left"><a class="product-minimal-figure" href="single-product.html"><img src="images/product-mini-2-106x104.png" alt="" width="106" height="104"/></a></div>
                          <div class="unit-body">
                            <p class="product-minimal-title"><a href="single-product.html">Truffles</a></p>
                            <p class="product-minimal-price">$23.00</p>
                          </div>
                        </div>
                      </article>
                    </div>
                    <div class="col-4 col-sm-6 col-md-12">
                      <!-- Product Minimal-->
                      <article class="product-minimal">
                        <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                          <div class="unit-left"><a class="product-minimal-figure" href="single-product.html"><img src="images/product-mini-3-106x104.png" alt="" width="106" height="104"/></a></div>
                          <div class="unit-body">
                            <p class="product-minimal-title"><a href="single-product.html">Chocolate Cake</a></p>
                            <p class="product-minimal-price">$15.00</p>
                          </div>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-xl-9">
              <div class="product-top-panel group-md">
                <p class="product-top-panel-title">Showing 1–3 of 28 results</p>
                <div>
                  <div class="group-sm group-middle">
                    <div class="product-top-panel-sorting">
                      <select data-minimum-results-for-search="Infinity">
                        <option value="1">Sort by newness</option>
                        <option value="2">Sort by popularity</option>
                        <option value="3">Sort by alphabet</option>
                      </select>
                    </div>
                    <div class="product-view-toggle"><a class="mdi mdi-apps product-view-link product-view-grid" href="grid-shop.html"></a><a class="mdi mdi-format-list-bulleted product-view-link product-view-list active" href="shop-list.html"></a></div>
                  </div>
                </div>
              </div>
              <div class="row row-30 row-md-50 row-lg-60">
              @foreach ($products as $product)
                <div class="col-12">
                  <!-- Product-->
                  <article class="product-modern text-center text-sm-left">
                    <div class="unit unit-spacing-0 flex-column flex-sm-row">
                      <div class="unit-left"><a class="product-modern-figure" href="{{ route('product.detail', $product->slug) }}"><img src="{{ asset('storage/' . $product->thumbnail) }}" alt="" width="328" height="330"/></a></div>
                      <div class="unit-body">
                        <div class="product-modern-body">
                          <h4 class="product-modern-title"><a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a></h4>
                          <div class="product-price-wrap">

                            <div class="product-price">${{ $product->price }}</div>
                          </div>
                          <p class="product-modern-text">{{ $product->description }}</p><a class="button button-primary button-zakaria" href="cart-page.html">Add to cart</a>
                        </div>
                      </div>
                  
                  </article>
                </div>
                @endforeach    
              </div>
              <div class="pagination-wrap">
                <!-- Bootstrap Pagination-->
                <nav aria-label="Page navigation">
    <ul class="pagination">
        @if ($products->onFirstPage())
            <li class="page-item page-item-control disabled">
                <a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a>
            </li>
        @else
            <li class="page-item page-item-control">
                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a>
            </li>
        @endif

        @foreach ($products->render() as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $products->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($products->hasMorePages())
            <li class="page-item page-item-control">
                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next"><span class="icon" aria-hidden="true"></span></a>
            </li>
        @else
            <li class="page-item page-item-control disabled">
                <a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a>
            </li>
        @endif
    </ul>
</nav>

              </div>
            </div>
          </div>
        </div>
      </section>
@endsection