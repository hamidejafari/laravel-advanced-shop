<div class="row m-0 w-100">
	<div class="col-xl-12 col-sm-6 p-1">
		<div class="bg-white">
			<button type="button" class="btn btn-primary w-100 rounded-0 d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#demo">
                تصویر شاخص
				<i class="bi bi-chevron-down d-flex text-white"></i>
			</button>
			<div id="demo" class="collapse show p-2">
                <div class="col-sm-12 text-center py-3 px-0">
                    <img class="mx-auto w-50 swiper-lazy" src="{{$data->pro_image}}">
                </div>
                <div class="col-sm-12 px-0">
                    <a href="{{URL::action('Admin\ProductController@getImage',$data->id)}}" type="button" target="_blank" class="btn m-0 btn-space btn-secondary d-flex align-items-center justify-content-center" data-toggle="tooltip" title="تصاویر بیشتر">
                        <i class="fa fa-images me-2"></i>
                        تصاویر بیشتر
                    </a>
                </div>
			</div>
		</div>
	</div>
	<div class="col-xl-12 col-sm-6 p-1">
		<div class="bg-white">
			<button type="button" class="btn btn-primary w-100 rounded-0 d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#demo1">
				مشخصه ها
				<i class="bi bi-chevron-down d-flex text-white"></i>
			</button>
			<div id="demo1" class="collapse bg-light show p-1">
                <a href="{{URL::action('Admin\ProductSpecificationController@getIndex',$data->id)}}" type="button" class="btn btn-space btn-info d-flex align-items-center justify-content-center mx-0" data-toggle="tooltip" target="_blank" title="لیست مشخصات">
                    <i class="fa fa-clipboard-list me-2"></i>
                    لیست مشخصات
                </a>
                <div class="scr">
                    <div class="row w-100 m-0">
                        @foreach($data->colors as $row)
                        <div class="col-sm-12 p-1">
                            <div class="card p-1 m-0">
                                <ul class="p-0 m-0">
                                    <li class="list-unstyled p-2 border">
                                        <p class="m-0 d-flex align-items-center justify-content-between">
                                            <span>
                                                       {{@$data->specification_title ? $data->specification_title : @$data->category[0]->specification_title}}
                                            </span>
                                            <span>
  {{@$row->productSpecificationValue->title}}
                                            </span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
			</div>
		</div>
	</div>
    <div class="col-xl-12 col-sm-6 p-1">
        <div class="bg-white">
            <button type="button" class="btn btn-primary w-100 rounded-0 d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#demo3">
                موارد خاص
                <i class="bi bi-chevron-down d-flex text-white"></i>
            </button>
            <div id="demo3" class="collapse show p-1">
                <div class="row w-100 m-0">
                    <div class="col-sm-12 p-1">
                        <a href="{{URL::action('Admin\ProductController@getTimer',$data->id)}}" type="button" class="btn m-0 w-100 btn-lg btn-space btn-dark d-flex align-items-center justify-content-between" target="_blank" data-toggle="tooltip" title="فروش ویژه">
                            <i class="bi bi-shop d-flex"></i>
                            فروش ویژه
                        </a>
                    </div>
                    <div class="col-sm-12 p-1">
                        <a href="{{URL::action('Admin\SloagenController@get',$data->id)}}" type="button" class="btn m-0 w-100 btn-lg btn-space btn-twitter d-flex align-items-center justify-content-between" data-toggle="tooltip" target="_blank" title="اختصاص شعار">
                            <i class="bi bi-bookmark d-flex"></i>
                            اختصاص شعار
                        </a>
                    </div>
                    <div class="col-sm-12 p-1">
                        <a href="{{URL::action('Admin\PropertiesController@get',$data->id)}}" type="button" class="btn m-0 w-100 btn-lg btn-space btn-instagram d-flex align-items-center justify-content-between" data-toggle="tooltip" target="_blank" title="اختصاص سایر مشخصات">
                            <i class="bi bi-list-stars d-flex"></i>
                            اختصاص سایر مشخصات
                        </a>
                    </div>
                    <div class="col-sm-12 p-1">
                        <a href="{{URL::action('Admin\QuestionController@get',$data->id)}}" type="button" class="btn m-0 w-100 btn-space btn-success d-flex align-items-center justify-content-between" data-toggle="tooltip" target="_blank" title="اختصاص سوالات متداول">
                            <i class="bi bi-question-circle d-flex me-2"></i>
                            <span>
                                اختصاص سوالات متداول
                            </span>
                            @php
                            $faqcount =App\Models\Question::where('product_id',$data->id)->whereNull('answer')->count();
                            @endphp
                            <span class="badge bg-danger d-flex">
                                {{@$faqcount}}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
