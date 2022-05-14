@extends ("layouts.admin.master")
@section('title','جزییات تیکت')
@section('part','جزییات تیکت')
@section('content')
<div class="container-fluid dashboard-content">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
            <a href="{{url('admin/tickets/')}}" class="btn btn-default btn-info" style="float: left" data-toggle="tooltip" data-placement="top" title="" data-original-title="بازگشت">
                بازگشت
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle ms-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>

            <h3 class="bg-white py-2 px-4 rounded-lg">
				موضوع تیکت : {{$start->subject}}
			</h3>
			<div class="card rounded-lg border-0 px-0 py-3">
				<div class="row w-100 m-0">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="chat pb-3">
								<div class="chat-history">
									<ul class="chat-ul p-0 m-0" style="padding:0">
										<li class="list-unstyled p-1">
											<div class="bg-light p-3 shadow-sm" style="border-radius:3vh 0 3vh 3vh;">
												<div class="message-data text-start">
													<span class="message-data-name">
														<i class="fa fa-circle you"></i>
								{{@$start->user->name.' '.@$start->user->family . ' | ' .@$start->user->mobile . ' | '}} - {{jdate('Y/m/d',$start->created_at->timestamp)}}</span>
													</span>
												</div>
												<div class="message you-message py-3 text-dark">
                                                    {!! $start->message !!}
												</div>
												<div class="message-data text-start">
													<span class="message-data-name">
														{{jdate('Y/m/d',$start->created_at->timestamp)}}
													</span>
												</div>
											</div>
										</li>
                                        @if(isset($start->file))
                                            <a href="{{asset('assets/uploads/content/ticket/'.$start->file)}}" download
                                               class="btn btn-success btn-circle">
                                                <i class="fa fa-download"></i>
                                                  دانلود فایل ضمیمه ابتدایی
                                            </a>@endif
                                        @foreach($end as $row)
                                            @if($row->user->admin == 1)
										<li class="clearfix list-unstyled p-1">
											<div class="bg-light p-3 shadow-sm" style="border-radius:3vh 0 3vh 3vh;">
												<div class="message-data text-end">
													<span class="message-data-name">
														<i class="fa fa-circle me"></i>
														{{@$row->user->name.' '.@$row->user->family . ' / ' }}
													</span>
												</div>
												<div class="message you-message py-3 text-dark">
													{!! $row->message !!}
												</div>
												<div class="message-data text-end">
													<span class="message-data-name">
														{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}
													</span>
												</div>
											</div>
										</li>
										@else
										<li class="clearfix list-unstyled p-1">
											<div class="p-3 shadow-sm" style="background:#f0f0f0;border-radius:0 3vh 3vh 3vh;">
												<div class="message-data text-end">
													<span class="message-data-name">
														{{@$row->user->name.' '.@$row->user->family . ' / ' }}
														<i class="fa fa-circle you"></i>
													</span>
												</div>
												<div class="message you-message py-3 text-dark">
													{!! $row->message !!}
												</div>
												<div class="message-data text-end">
													<span class="message-data-name">
														{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}
													</span>
												</div>
											</div>
										</li>
										@endif
                                                @if(isset($row->file))
                                                <a href="{{asset('assets/uploads/content/ticket/'.$row->file)}}" download
                                                   class="btn btn-success btn-circle">
                                                    <i class="fa fa-download"></i>
                                                    دانلود فایل های ضمیمه
                                                </a>@endif
										@endforeach
									</ul>
								</div>
							</div>
							<form action="{{route('admin.ticket.reply')}}" enctype="multipart/form-data"
								method="POST" class="m-0" style="position:relative;">
								<input name="parent_id" value="{{$start->id}}" type="hidden" />
								<input name="user_id" value="{{Auth::id()}}" type="hidden" />
								{{ csrf_field() }}
                                <div class="row">
								<div class="col-lg-8">
									<textarea class="form-control" name="message" id="comment" rows="1"
										placeholder="پیام خود را بنویسید..."></textarea>
								</div>
                                <div class="col-lg-4">
                                    <input type="file" name="file" class="form-control" id="fileinput" placeholder="" value="">
                                </div>
                                </div>
								<div class="">
									<button type="submit" class="btn btn-success rounded-0">
										ارسال تیکت
									</button>
								</div>

							</form>
							@if($start->status !== 2 && $start->status !== 3)
							<div class="box-footer">
								<a href="{{URL::action('Admin\TicketController@ticketStatus',$start->id)}}"
									class="btn btn-primary"
									style="width: 20%;height: 81px;background-color: #3dc13d;font-size: 24px;padding-top: 21px;margin-right: 37%;">اتمام
									روند سفارش
								</a>
							</div>
							@endif
                            @if($start->order_item_id !== null || $start->status !== 3)
                                <div class="box-footer">
                                    <a href="{{URL::action('Admin\TicketController@ticketReturn',$start->id)}}"
                                       class="btn btn-danger"
                                       style="width: 20%;height: 81px;background-color: #3dc13d;font-size: 24px;padding-top: 21px;margin-right: 37%;">مرجوع

                                    </a>
                                </div>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('css')

@stop

@section('js')

@endsection
