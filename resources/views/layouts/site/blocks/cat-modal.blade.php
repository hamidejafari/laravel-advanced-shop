<div class="modal fade cate-modal" id="catModal" tabindex="-1" aria-labelledby="catModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content bg-two">
			<div class="modal-header py-2 px-3">
				<h5 class="modal-title fw-bolder text-one" id="catModalLabel">
					دسته بندی محصولات
				</h5>
                <button type="button" class="btn px-0 d-flex align-items-center" data-bs-dismiss="modal" aria-label="Close">
                    برگشت
                    <i class="bi bi-arrow-left d-flex fs-6 ms-2"></i>
                </button>
			</div>
			<div class="modal-body p-2">
				<div class="accordion" id="accordioncatsd">
					@foreach($category_footer as $key=>$main)
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne{{$main->id}}">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapseOne{{$main->id}}" aria-expanded="false"
								aria-controls="collapseOne{{$main->id}}">
								{{@$main->title}}
							</button>
						</h2>
						<div id="collapseOne{{$main->id}}"
							class="accordion-collapse collapse"
							aria-labelledby="headingOne{{$main->id}}" data-bs-parent="#accordioncatsd">
							<div class="accordion-body">
								<hr class="mt-0 mb-2">
								<ul class="p-0 m-0">
									<li class="list-unstyled text-one d-flex align-items-center">
										<i class="bi bi-caret-left-fill d-flex me-1"></i>
										<a href="{{route('site.product.list',['id'=>$main->id])}}"
											class="cate-link-pr fw-bolder">
											{{@$main->title}}
										</a>
									</li>
									<hr class="mt-0 mb-2">
									@foreach($main->childs as $key=>$child)
									<li class="list-unstyled text-one d-flex align-items-center">
										<i class="bi bi-caret-left-fill d-flex me-1"></i>
										<a href="{{route('site.product.list',['id'=>$child->id])}}"
											class="cate-link-pr fw-bolder">
											{{@$child->title}}
										</a>
									</li>
									<hr class="mt-0 mb-2">
									@foreach($child->childs as $item=>$cat)
									<li class="list-unstyled text-one d-flex align-items-center">
										<i class="bi bi-caret-left d-flex me-1"></i>
										<a href="{{route('site.product.list',['id'=>$cat->id])}}"
											class="cate-link-pr text-secondary">
											{{@$cat->title}}
										</a>
									</li>
									@endforeach
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
