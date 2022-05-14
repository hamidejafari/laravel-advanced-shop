<div class="card rounded-0 border-0 p-3">
	<div class="bartitle max-content mx-auto position-relative">
		<img src="{{asset('assets/site/images/kaj/end-title.png')}}" class="end">
		<h2 class="fw-bolder">
			فرم ارسال نظر
		</h2>
		<img src="{{asset('assets/site/images/kaj/start-title.png')}}" class="start">
	</div>
	<div class="col-xxl-7 mx-auto px-0 pt-3 pb-5">
		<div class="bg-light p-2">
			@include('site.article.content.comments-blocks.form')
		</div>
	</div>
    @if($comments->count() > 0)
	<div class="bartitle max-content mx-auto position-relative">
		<img src="{{asset('assets/site/images/kaj/end-title.png')}}" class="end">
		<h2 class="fw-bolder">
			نظرات کاربران
		</h2>
		<img src="{{asset('assets/site/images/kaj/start-title.png')}}" class="start">
	</div>
	<div class="border p-2 mb-2">
		<!-- first comment -->
    @foreach($comments as $comment)
		@include('site.article.content.comments-blocks.first-comment')
		<!-- reply comment -->
            @foreach($comment->replies as $reply)
		@include('site.article.content.comments-blocks.reply-comment')
            @endforeach
        @endforeach
	</div>
        @endif
</div>
