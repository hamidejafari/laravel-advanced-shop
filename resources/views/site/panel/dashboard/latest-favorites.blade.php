<div class="border bg-light shadow-sm p-2">
	<h4 class="fw-boldeer border-bottom h5 pb-2">
		لیست آخرین علاقه مندی ها
	</h4>
	<div class="table-responsive">
		<table class="table">
			<tbody>
            @foreach($likes as $like)
				<tr>
					<th scope="row">
                        <a href="{{route('site.product.detail',['id'=>$like->product->id])}}">
						<img src="{{asset('assets/uploads/content/pro/big/'.@$like->product->image[0]->file)}}" alt="{!! @$like->product->title !!}">
                        </a>
                    </th>
					<td class="inf">
						<h2 class="fa-name">
						{!! @$like->product->title !!}
						</h2>
						<p class="en-name">
                            {!! @$like->product->lead !!}
						</p>
						<p class="price">
                            {!! $like->product->price_first['price'] !!}
						</p>
					</td>
					<td>
                        <a href="{{URL::action('Panel\LikeController@getDeleteLike',$like->id)}}" onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');">
						<button  class="btn btn-outline-danger d-flex align-items-center rounded-0">
							<i class="bi bi-trash d-flex"></i>
						</button></a>
					</td>
				</tr>
            @endforeach
			</tbody>
		</table>
		<a href="{{route('panel.favorites')}}" class="btn btn-two w-100">
			مشاهده همه علاقه مندی ها
		</a>
	</div>
</div>
