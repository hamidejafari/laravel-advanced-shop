@extends('layouts.admin.master')
@section('title','جدید')
@section('content')
<div class="container-fluid dashboard-content" id="app34534567">
	<div class="row w-100 m-0">
		<div class="col-lg-12 mx-auto py-1 px-0">
			<h3 class="bg-white py-2 px-4 rounded-lg">
				اضافه کردن
			</h3>
			<div class="card rounded-lg border-0 p-3">
				<form method="post" action="{{URL::action('Admin\PropertiesController@postAdd')}}"
					enctype="multipart/form-data">
                    <div class="card rounded-lg border-0 p-3">
                        <div class="row">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{$id}}">
                            <div class="row"  v-for="me in number" >
                                <div class="col-lg-6 form-group">
                                    <label for="description" class="col-form-label">سایر مشخصات</label>
                                    <textarea class="form-control" type="text" id="description" name="description[]" ></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="status" class="col-form-label">
                                        نشان دادن در قسمت بالایی
                                    </label>
                                    <select class="form-control" id="status" name="status[]">
                                        <option value="">انتخاب وضعیت نمایش  </option>
                                        <option value="0" >
                                            قسمت پایینی
                                        </option>
                                        <option value="1" >
                                            قسمت بالایی
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6 p-5">
                                <a @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px;">
                                    <span class="fa fa-plus"></span>
                                </a>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('js')

    <script src="{{asset('asset/site/js/lodash.min.js')}}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/element-ui/lib/umd/locale/fa.js"></script>
    <script>
        var app = new Vue({
            el: '#app34534567',
            data:{
                number :1
            },
            methods: {
                plusMe: function(){
                    this.number = this.number+1;
                }
            }
        })
    </script>
    <script type="text/javascript">
        $(function() {
            var opts = $('#optlist option').map(function(){
                return [[this.value, $(this).text()]];
            });

            $('#someinput').keyup(function(){
                var rxp = new RegExp($('#someinput').val(), 'i');
                var optlist = $('#optlist').empty();
                opts.each(function(){
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    }
                });
            });
        });
    </script>
@endsection
