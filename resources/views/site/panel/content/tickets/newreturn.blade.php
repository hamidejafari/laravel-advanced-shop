<div class="row w-100 h-100 m-0">
    <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-9 col-xs-12 mx-auto h-100 p-2">
				<form action="{{URL::action('Panel\TicketController@postNewTicket')}}" method="post" class="m-0" enctype="multipart/form-data">
                    <input type="hidden" name="order_item_id" value="{{$itemId}}">
                    @csrf
					<div class="row g-2">
						<div class="col-xxl-12">
							<div class="form-floating">
								<input type="text" name="subject" class="form-control" id="titleinput" placeholder="" value="">
								<label for="titleinput">
                                    <i class="bi bi-pen d-flex me-1"></i>
									موضوع پیام
								</label>
							</div>
						</div>
                        <div class="col-xxl-12">
                            <div class="form-floating">
                                <input type="file" name="file" class="form-control" id="fileinput" placeholder="" value="">
                                <label for="fileinput">
                                 فایل ضمیمه
                                </label>
                            </div>
                        </div>
						<div class="col-xxl-12">
							<div class="form-floating">
								<textarea name="message" class="form-control" placeholder="نوشتن تیکت" id="ticketTextarea"
									style="height:120px"></textarea>
								<label for="ticketTextarea">
                                    <i class="bi bi-pen d-flex me-1"></i>
									نوشتن درخواست
								</label>
							</div>
						</div>
						<div class="col-xxl-12">
                            <button type="submit"
                                    class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100">
                                <i class="bi bi-check2-circle d-flex me-1 h4 my-0"></i>
                                ثبت درخواست
                            </button>
						</div>
					</div>
				</form>
			</div>
		</div>

