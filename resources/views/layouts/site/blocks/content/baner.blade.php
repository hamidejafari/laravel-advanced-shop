<div class="px-md-2 pb-sm-4 pb-xs-4">
	<div class="baner baner-one py-xl-2 pb-sm-1 pt-sm-5 pb-xs-1 pt-xs-2">
		<div class="container py-xl-0 pt-xs-3 pt-md-3">
			<section id="demos">
				<div class="row">
					<div class="large-12 columns">
						<div class="owl-carousel-baner-one owl-theme my-0">
							@foreach($banners['mid'] as $row)
							<div class="item p-2">
                                @if(@$row['link'] != null)
								<a  href= "{{@$row['link']}}" rel="noopener noreferrer nofollow"
									>
									<div class="bc">
										<img srcset="{{asset('assets/uploads/content/sli/'.@$row['image'])}} 2x, {{asset('assets/uploads/content/sli/'.@$row['image'])}} 1x" src="{{asset('assets/uploads/content/sli/'.@$row['image'])}}"
											alt="{!! @$row['title'] !!}" class="w-100">
									</div>
								</a>
                                @else
                                <a
                                href="{{route('site.banner.detail',['id'=>@$row['id']])}}">
                                    <div class="bc">
                                        <img srcset="{{asset('assets/uploads/content/sli/'.@$row['image'])}} 2x, {{asset('assets/uploads/content/sli/'.@$row['image'])}} 1x" src="{{asset('assets/uploads/content/sli/'.@$row['image'])}}"
                                             alt="{!! @$row['title'] !!}" class="w-100">
                                    </div>
                                </a>
                                @endif
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
