<div class="card rounded-0 border-0 p-3">
	<div class="d-flex align-items-center justify-content-between">
		<div class="">
			<ul class="p-0 m-0">
{{--				<li class="list-unstyled float-start me-4">--}}
{{--					<a class="d-flex align-items-center h5 m-0 text-secondary">--}}
{{--						<i class="bi bi-suit-heart d-flex text-secondary h3 my-0 me-2"></i>--}}
{{--						۱۰۰--}}
{{--					</a>--}}
{{--				</li>--}}
				<li class="list-unstyled float-start me-4">
					<a class="d-flex align-items-center h5 m-0 text-secondary">
						<i class="bi bi-chat-left-text d-flex text-secondary h3 my-0 me-2"></i>
				{{$comments_count}}
					</a>
				</li>
			</ul>
		</div>
		<div class="">
			<ul class="p-0 m-0">
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a href="">--}}
{{--						<i class="bi bi-telegram d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a href="">--}}
{{--						<i class="bi bi-whatsapp d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a href="">--}}
{{--						<i class="bi bi-instagram d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a href="">--}}
{{--						<i class="bi bi-linkedin d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a href="">--}}
{{--						<i class="bi bi-facebook d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a href="">--}}
{{--						<i class="bi bi-twitter d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
				<li class="list-unstyled float-end ms-3">
					<a type="button" href="" data-bs-toggle="modal" data-bs-target="#shareModalart">
						<i class="bi bi-share d-flex text-secondary h3 m-0"></i>
					</a>
				</li>
{{--				<li class="list-unstyled float-end ms-3">--}}
{{--					<a class="like">--}}
{{--						<i class="bi likeButton bi-suit-heart-fill heart d-flex h3 m-0"></i>--}}
{{--					</a>--}}
{{--				</li>--}}
			</ul>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="shareModalart" tabindex="-1" aria-labelledby="shareModalartLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content rounded-0">
			<div class="modal-header bg-one border-0 rounded-0">
				<h5 class="modal-title" id="shareModalartLabel">
					اشتراک مقاله
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body rounded-0">
				<ul class="p-0 m-0 d-flex align-items-center justify-content-center">
					<li class="list-unstyled d-inline mx-2">
						<a href="https://t.me/share/url?url={{route('site.blog.detail',['id'=>$blog->id])}}">
							<i class="bi bi-telegram d-flex h3 m-0"></i>
						</a>
					</li>
					<li class="list-unstyled d-inline mx-2">
						<a href="whatsapp://send?text={{route('site.blog.detail',['id'=>$blog->id])}}">
							<i class="bi bi-whatsapp d-flex h3 m-0"></i>
						</a>
					</li>
{{--					<li class="list-unstyled d-inline mx-2">--}}
{{--						<a href="">--}}
{{--							<i class="bi bi-instagram d-flex h3 m-0"></i>--}}
{{--						</a>--}}
{{--					</li>--}}
{{--					<li class="list-unstyled d-inline mx-2">--}}
{{--						<a href="">--}}
{{--							<i class="bi bi-linkedin d-flex h3 m-0"></i>--}}
{{--						</a>--}}
{{--					</li>--}}
{{--					<li class="list-unstyled d-inline mx-2">--}}
{{--						<a href="">--}}
{{--							<i class="bi bi-facebook d-flex h3 m-0"></i>--}}
{{--						</a>--}}
{{--					</li>--}}
{{--					<li class="list-unstyled d-inline mx-2">--}}
{{--						<a href="">--}}
{{--							<i class="bi bi-twitter d-flex h3 m-0"></i>--}}
{{--						</a>--}}
{{--					</li>--}}
				</ul>
			</div>
		</div>
	</div>
</div>
