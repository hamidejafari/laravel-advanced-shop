@extends('layouts.admin.master')
@section('title','تنظیمات')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row w-100 m-0">
            <div class="col-lg-12 mx-auto py-1 px-0">
                <h3 class="bg-white py-2 px-4 rounded-lg">
                    تنظیمات
                </h3>
                <div class="card rounded-lg border-0 p-3">
    <form method="post" action="{{URL::action('Admin\SettingController@postEditSetting',$data->id)}}"
          enctype="multipart/form-data">
        {{ csrf_field() }}

<div class="row">
	<div class="col-lg-6 form-group">
		<label for="title" class="col-form-label">عنوان</label>
		<input id="title" name="title" type="text" class="form-control"
			value="@if(isset($data->title)){{$data->title}}@endif">
	</div>
	<div class="col-lg-6 form-group">
		<label for="abouttitle" class="col-form-label">عنوان درباره ما</label>
		<input id="abouttitle" name="abouttitle" type="text" class="form-control"
			value="@if(isset($data->abouttitle)){{$data->abouttitle}}@endif">
	</div>


	<div class="col-lg-6 form-group">
		<label class="col-form-label"> تصویر درباره ما </label>
		<input class="form-control" type="file" name="aboutimg">
		@if(isset($data->aboutimg))
            <img src="{{asset('assets/uploads/content/set/medium/'.$data->aboutimg)}}" class="w-50">
        @endif
	</div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> لوگو </label>
        <input class="form-control" type="file" name="logo">
        @if(isset($data->logo))
            <img src="{{asset('assets/uploads/content/set/'.$data->logo)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> فو آیکون </label>
        <input class="form-control" type="file" name="favicon">
        @if(isset($data->favicon))
            <img src="{{asset('assets/uploads/content/set/'.$data->favicon)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> بنر ویژه  </label>
        <input class="form-control" type="file" name="banner">
        @if(isset($data->banner))
            <img src="{{asset('assets/uploads/content/set/'.$data->banner)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> بنر ویژه موبایل </label>
        <input class="form-control" type="file" name="banner2">
        @if(isset($data->banner2))
            <img src="{{asset('assets/uploads/content/set/'.$data->banner2)}}" class="w-50">
        @endif
    </div>
    <div class="col-lg-6 form-group">
        <label class="col-form-label"> بک گراند قسمت فروش ویژه </label>
        <input class="form-control" type="file" name="sale_background">
        @if(isset($data->sale_background))
            <img src="{{asset('assets/uploads/content/set/'.$data->sale_background)}}" class="w-50">
        @endif
    </div>
	<div class="col-lg-6 form-group">
		<label for="email" class="col-form-label"> ایمیل</label>
		<input id="email" name="email" type="text" class="form-control"
			value="@if(isset($data->email)){{$data->email}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <label for="contact" class="col-form-label"> تلفن پشتیبانی</label>
        <input id="contact" name="contact" type="text" class="form-control"
               value="@if(isset($data->contact)){{$data->contact}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label for="phone" class="col-form-label"> تلفن پوست و زیبایی</label>
        <input id="phone" name="phone" type="text" class="form-control"
               value="@if(isset($data->phone)){{$data->phone}}@endif">
    </div>
    <div class="col-lg-12 form-group">
        <label for="address" class="col-form-label">آدرس</label>
        <textarea class="form-control" id="address" name="address" rows="3">@if(isset($data->address)){!!$data->address !!}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="about" class="col-form-label">متن درباره ما </label>
        <a href="{{url('/about-us')}}" target="_blank" type="button" data-toggle="tooltip" title="مشاهده در سایت"
           class="btn btn-outline-primary btn-circle"><i class="fa fa-eye"></i></a>
        <textarea class="form-control ckeditor" id="about" name="about" rows="3">@if(isset($data->about)){!!$data->about !!}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="rules" class="col-form-label">قوانین </label>
        <a href="{{url('/privacy-policy')}}" target="_blank" type="button" data-toggle="tooltip" title="مشاهده در سایت"
           class="btn btn-outline-primary btn-circle"><i class="fa fa-eye"></i></a>
        <textarea class="form-control ckeditor" id="rules" name="rules" rows="3">@if(isset($data->rules)){!!$data->rules !!}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="rules" class="col-form-label">راهنمای سفارش و مقررات </label>
        <a href="{{url('/rules-and-order')}}" target="_blank" type="button" data-toggle="tooltip" title="مشاهده در سایت"
           class="btn btn-outline-primary btn-circle"><i class="fa fa-eye"></i></a>
        <textarea class="form-control ckeditor" id="order" name="order" rows="3">@if(isset($data->order)){!!$data->order !!}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="rules" class="col-form-label">راهنمای پرداخت اینترنتی </label>
        <a href="{{url('/pay')}}" target="_blank" type="button" data-toggle="tooltip" title="مشاهده در سایت"
           class="btn btn-outline-primary btn-circle"><i class="fa fa-eye"></i></a>
        <textarea class="form-control ckeditor" id="pay" name="pay" rows="3">@if(isset($data->pay)){!!$data->pay !!}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group">
        <label for="about2" class="col-form-label">متن درباره مای صفحه اول</label>
        <textarea class="form-control" id="about2" name="about2" rows="3">@if(isset($data->about2)){!!$data->about2 !!}@endif</textarea>
    </div>

	<div class="col-lg-6 form-group">
		<label for="description_seo" class="col-form-label">توضیحات سئو</label>
		<textarea class="form-control" id="description_seo" name="description_seo" rows="3">@if(isset($data->description_seo)){!!$data->description_seo !!}@endif</textarea>
	</div>
    <div class="col-lg-6 form-group">
        <label for="admin_number" class="col-form-label"> تلفن پیامک سفارش</label>
        <input id="admin_number" name="admin_number" type="text" class="form-control"
               value="@if(isset($data->admin_number)){{$data->admin_number}}@endif">
    </div>
    <div class="col-lg-12 form-group">
        <label for="maps" class="col-form-label"> نقشه</label>
        <a href="{{url('/contact-us')}}" target="_blank" type="button" data-toggle="tooltip" title="مشاهده در سایت"
           class="btn btn-outline-primary btn-circle"><i class="fa fa-eye"></i></a>
        <textarea class="form-control" id="maps" name="maps" rows="3" dir="ltr">@if(isset($data->maps)){!!$data->maps !!}@endif</textarea>
    </div>
    <div class="col-lg-6 form-group">
        <label for="tax" class="col-form-label">مالیات(درصد)</label>
        <input id="tax" name="tax" type="tax" class="form-control"
               value="@if(isset($data->tax)){{$data->tax}}@endif">
    </div>
    <div class="col-lg-6 form-group">
        <label for="description_seo" class="col-form-label">پیغام پنل</label>
        <textarea class="form-control" id="alert" name="alert" rows="3">@if(isset($data->alert)){!!$data->alert !!}@endif</textarea>
    </div>
    <div class="col-lg-3 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
            غیرفعالسازی سایت
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->disable) && $data->disable == 1) checked="checked" @endif name="disable" id="disable">
                <span>
                    <label for="disable"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 form-group">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">
        بلک فرایدی
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->black_friday) && $data->black_friday == 1) checked="checked" @endif name="black_friday" id="black_friday">
                <span>
                    <label for="black_friday"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
        </div>
    </div>
</div>
    </form>
                </div>
            </div>
        </div>
    </div>
@stop

