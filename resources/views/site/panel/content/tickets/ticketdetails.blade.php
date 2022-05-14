<div class="border bg-light shadow-sm p-2 ">
	<div class="row w-100 m-0 gy-2">
		<div class="col-sm-12 p-1">
			<div class="row w-100 m-0 gy-2">
                <div class="col-xxl-12 ms-auto p-1">
                    <h4 class="m-0 text-custom fw-bolder">
                        {{$start->subject}}
                    </h4>
                    <div class="bg-white shadow-sm d-flex p-3">
                        <div class="">
					<small>
						{{jdate('d F Y',$start->created_at->timestamp)}}
					</small>
					<div class="text-secondary text-justify my-2">
						<p class="m-0">
						    {{$start->message}}
						</p>
					</div>
				</div>
				</div>
				</div>
                @if(isset($start->file))
                    <div class="border bg-light shadow-sm p-2 ">
                        <div class="row w-100 m-0 gy-2">
                    <div class="col-sm-12 p-1">
                        <a href="{{asset('assets/uploads/content/ticket/'.$start->file)}}" download
                           class="btn btn-success btn-circle">
                            <i class="fa fa-download"></i>
                            دانلود فایل ضمیمه ابتدایی
                        </a>
                    </div>
                    </div>
                    </div>
                @endif
                @foreach($end as $row)
				<div class="col-xxl-12 ms-auto p-1">
					<div class="bg-white shadow-sm d-flex p-3">
						<div class="">
							<small>
								{{jdate('d F Y',$row->created_at->timestamp)}}
							</small>
							<div class="text-secondary text-justify my-2">
								<p class="m-0">
									{{$row->message}}
								</p>
							</div>
						</div>
					</div>
				</div>
                    @if(isset($row->file) )
                        <div class="border bg-light shadow-sm p-2 ">
                            <div class="row w-100 m-0 gy-2">
                                <div class="col-sm-12 p-1">
                                    <a href="{{asset('assets/uploads/content/ticket/'.$row->file)}}" download
                                       class="btn btn-success btn-circle">
                                        <i class="fa fa-download"></i>
                                        دانلود فایل های ضمیمه
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
			</div>
		</div>
        <form action="{{URL::action('Panel\TicketController@postTicketDetails')}}" method="post" class="m-0">
            @csrf
            <input type="hidden" name="parent_id" value="{{$start->id}}">
            <div class="row g-2">
                <div class="col-xxl-12">
                    <div class="form-floating">
								<textarea name="message" class="form-control" placeholder="نوشتن پاسخ" id="ticketTextarea"
                                          style="height:140px"></textarea>
                        <label for="ticketTextarea">
                            <span class="flaticon flaticon-pen"></span>
                            نوشتن پاسخ
                        </label>
                    </div>
                </div>
                <div class="row g-2">
                <div class="col-xxl-6">
                    <div class="form-floating">
                        <input type="file" name="file" class="form-control" id="fileinput" placeholder="" value="">
                        <label for="fileinput">
                            فایل ضمیمه
                        </label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <button type="submit"
                            class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100">
                        <i class="bi bi-check2-circle d-flex me-1 h4 my-0"></i>
                        ارسال پاسخ
                    </button>
                </div>
            </div>
            </div>
        </form>
	</div>
</div>

@if($start->status !== 2)
    <div class="box-footer">
        <div class="col-sm-12 p-1">
        </div>
        <a href="{{URL::action('Panel\TicketController@ticketStatus',$start->id)}}"
           class="btn btn-info btn-lg d-flex align-items-center justify-content-center w-100">
            <i class="bi bi-check2-circle d-flex me-1 h4 my-0"></i>
            اتمام تیکت
        </a>
    </div>
@endif
