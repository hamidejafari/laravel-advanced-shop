<div class="px-1 table-responsive">
	<table class="table table-bordered m-0">
		<thead class="table-secondary">
			<tr>
				<th class="text-center" scope="col">
					#
				</th>
				<th class="text-center" scope="col">
					عنوان درخواست
				</th>
				<th class="text-center" scope="col">
					تاریخ درخواست
				</th>
				<th class="text-center" scope="col">
					نوع
				</th>
				<th class="text-center" scope="col">
					وضعیت
				</th>
				<th class="text-center" scope="col">
					جزییات
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $key=>$row)
			<tr>
				<th class="text-center" scope="row">
					{{$key+1}}
				</th>
				<td class="text-center">
					{{$row->subject}}
				</td>
				<td class="text-center">
					{{jdate('d F Y',$row->created_at->timestamp)}}
				</td>
				<td class="text-center">
					<div class="">
						@if($row->order_item_id == null)
						<span class="badge bg-primary">
							تیکت
						</span>
						@else
						<span class="badge bg-info">
							درخواست مرجوعی
						</span>
						@endif
					</div>
				</td>
				<td class="text-center">
					<div class="">
						@if($row->status == 0)
						<span class="badge bg-danger">
							در انتظار پاسخ
						</span>
						@elseif($row->status == 1)
						<span class="badge bg-success">
							پاسخ داده شده
						</span>
						@elseif($row->status == 2)
						<span class="badge bg-info">
							بسته شده
						</span>
						@elseif($row->status == 3)
						<span class="badge bg-error">
							مرجوع شد
						</span>
						@endif
					</div>
				</td>
				<td class="text-center">
					<a href="{{URL::action('Panel\TicketController@ticketDetail',$row->id)}}"
						class="btn btn-outline-secondary max-content mx-auto rounded-0 d-flex align-items-center justify-content-center">
						<i class="bi bi-eye-fill d-flex"></i>
					</a>
				</td>
			</tr>
			@endforeach
			<!-- added new tickets -->
			<tr>
				<td class="text-center" colspan="6">
					<a href="{{route('panel.new-tickets')}}"
						class="btn btn btn-two w-100 btn-lg d-flex align-items-center justify-content-center">
						<i class="bi bi-pen d-flex me-1 h4 my-0"></i>
						نوشتن درخواست جدید
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>