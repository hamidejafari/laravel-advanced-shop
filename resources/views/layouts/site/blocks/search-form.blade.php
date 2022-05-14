<form method="GET" action="{{URL::action('Site\HomeController@getSearch')}}" class="m-0 me-auto">
	<div class="position-relative forminp">
		<input type="search" name="search" id="" class="form-control form-control-sm bg-transparent border-0 h-100" placeholder="جستجو برند یا محصول...">
		<ul class="p-0 m-0 position-absolute end-0 form-bt top-0 bottom-0 d-flex align-items-center">
			<li class="float-end list-unstyled">
				<button type="submit" class="btn text-secondary d-flex bg-transparent">
					<i class="bi bi-search d-flex"></i>
				</button>
			</li>
		</ul>
	</div>
</form>