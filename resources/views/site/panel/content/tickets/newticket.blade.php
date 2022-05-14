<div class="row w-100 h-100 m-0">
	<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-9 col-xs-12 mx-auto h-100 p-2">
		<form action="{{URL::action('Panel\TicketController@postNewTicket')}}" method="post" class="m-0 py-5"
			enctype="multipart/form-data">
			@csrf
			<div class="row w-100 m-0">
				<div class="col-xxl-12 p-1">
					<div class="form-floating">
						<input type="text" name="subject" class="form-control" id="titleinput" placeholder=""
							value="">
						<label for="titleinput" class="d-flex align-items-center">
							<i class="bi bi-pen d-flex me-1"></i>
							موضوع پیام
						</label>
					</div>
				</div>
				<div class="col-xxl-12 p-1">
					<div class="form-floating">
						<select name="department_id" class="form-select" id="floatingSelect"
							aria-label="Floating label select example">
							<option value="0" selected>
								انتخاب دپارتمان
							</option>
							@foreach($departments as $row)
							<option value="{{$row->id}}">
								{{$row->name}}
							</option>
							@endforeach
						</select>
						<label for="floatingSelect">
							انتخاب دپارتمان
						</label>
					</div>
				</div>
				<div class="col-xxl-12 p-1">
					<div class="">
						<label for="fileinput">
							فایل ضمیمه :
						</label>
						<input type="file" name="file" class="form-control" id="fileinput" placeholder="" value="">
					</div>
				</div>
				<div class="col-xxl-12 p-1">
					<div class="form-floating">
						<textarea name="message" class="form-control" placeholder="نوشتن درخواست" id="ticketTextarea" style="height: 100px"></textarea>
						<label for="ticketTextarea">
							<i class="bi bi-pen me-1"></i>
							نوشتن درخواست
						</label>
					</div>
				</div>
				<div class="col-xxl-12 p-1">
					<button type="submit" class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100">
						<i class="bi bi-check2-circle d-flex me-1 h4 my-0"></i>
						ارسال درخواست
					</button>
				</div>
			</div>
		</form>
	</div>
</div>