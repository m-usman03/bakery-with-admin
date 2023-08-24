<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">

			<li class="{{ Request::is('admin/product*') ? 'mm-active' : '' }}">
				<a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ Request::is('admin/product*') ? 'true' : 'false' }}">
					<div class="menu-icon">
						<!-- SVG icon code here -->
					</div>
					<span class="nav-text">Product</span>
				</a>
				<ul aria-expanded="{{ Request::is('admin/product*') ? 'true' : 'false' }}" class="{{ Request::is('admin/product*') ? 'left mm-collapse mm-show' : '' }}">
					<li><a href="{{ route('admin.product.create') }}">Create</a></li>
					<li><a href="{{ route('admin.product.index') }}">List</a></li>
				</ul>
			</li>

			<li class="{{ Request::is('admin/topping*') ? 'mm-active' : '' }}">
				<a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ Request::is('admin/topping*') ? 'true' : 'false' }}">
					<div class="menu-icon">
						<!-- SVG icon code here -->
					</div>
					<span class="nav-text">Topping</span>
				</a>
				<ul aria-expanded="{{ Request::is('admin/topping*') ? 'true' : 'false' }}" class="{{ Request::is('admin/topping*') ? 'left mm-collapse mm-show' : '' }}">
					<li><a href="{{ route('admin.topping.create') }}">Create</a></li>
					<li><a href="{{ route('admin.topping.index') }}">List</a></li>
				</ul>
			</li>

			<li class="{{ Request::is('admin/order*') ? 'mm-active' : '' }}">
				<a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ Request::is('admin/order*') ? 'true' : 'false' }}">
					<div class="menu-icon">
						<!-- SVG icon code here -->
					</div>
					<span class="nav-text">Orders</span>
				</a>
				<ul aria-expanded="{{ Request::is('admin/order*') ? 'true' : 'false' }}" class="{{ Request::is('admin/order*') ? 'left mm-collapse mm-show' : '' }}">
				
					<li><a href="{{ route('admin.order.index') }}">List</a></li>
				</ul>
			</li>
		</ul>

		<div class="copyright">
			<p class="fs-14"><strong>Salero Restaurant Admin</strong> © 2023 All Rights Reserved</p>
			<p class="fs-14">Made with <span class="heart"></span> by DexignZone</p>
		</div>
	</div>
</div>