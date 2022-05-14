<div class="col-xxl-12 ms-auto">
	<div class="border p-2">
		<div class="row w-100 m-0">
			<div class="col-xl-1 col-lg-2 col-sm-3 col-xs-3 align-self-center p-1 text-center">
				<img src="{{asset('assets/site/images/kaj/user.png')}}" class="w-100 p-2 border">
			</div>
			<div class="col-xl-11 col-lg-10 col-sm-12 col-xs-12 align-self-center py-1 pe-1 ps-2 text-start">
				<div class="d-flex align-items-center justify-content-between">
					<h6 class="fw-bolder m-0">
                        {{@$reply->user->name.' '.@$reply->user->family}}
					</h6>
{{--					<div class="d-flex align-items-center justify-content-end">--}}
{{--						<span class="bg-secondary py-0 px-2 me-1 rounded-3 text-white">--}}
{{--							4.5--}}
{{--						</span>--}}
{{--						<div class="star-ratings-sprit mb-1">--}}
{{--							<span class="star-ratings-sprit-rating" style="width:90%;"></span>--}}
{{--						</div>--}}
{{--					</div>--}}
				</div>
				<div class="m-0 text-secondary d-flex align-items-center justify-content-between">
					<div class="d-flex align-items-center">
						<i class="bi bi-calendar3-event d-flex me-2"></i>
                        {{jdate('Y/m/d',$reply->created_at->timestamp)}}
						-
						<i class="bi bi-clock d-flex mx-2"></i>
                        {{jdate('H:i',$reply->created_at->timestamp)}}
					</div>
					<!-- reply modal -->
					<button type="button"
						class="btn btn-link text-secondary d-flex align-items-center btn-sm text-decoration-none"
						data-bs-toggle="modal" data-bs-target="#replyModal{{@$reply->id}}">
						<i class="bi bi-reply me-1 h5 my-0"></i>
						پاسخ
					</button>
				</div>
			</div>
			<div class="col-sm-12 p-1 text-start">
				<h4 class="fw-bolder my-2">
                    {{@$reply->title}}
				</h4>
				<div class="text-justify caption mb-2">
					<p>
                        {{@$reply->content}}
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="replyModal{{@$reply->id}}" tabindex="-1" aria-labelledby="replyModalLabel{{@$reply->id}}" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="replyModalLabel{{@$reply->id}}">
					پاسخ به نظر
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body bg-light">
				@include('site.article.content.comments-blocks.form2')
			</div>
		</div>
	</div>
</div>
