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


		</ul>

		<div class="copyright">
			<p class="fs-14"><strong>Salero Restaurant Admin</strong> © 2023 All Rights Reserved</p>
			<p class="fs-14">Made with <span class="heart"></span> by DexignZone</p>
		</div>
	</div>
</div>