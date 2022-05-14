<div class="card rounded-lg border-0 p-3"  id="app34534567">
    @if($parent_id == null)
        <form method="post"
              action="{{URL::action('Admin\ProductSpecificationTypeController@postAddMain',$parent_id)}}"
              class="form-horizontal form-label-left">
            <div class="row">
                {{ csrf_field() }}
                <div class="col-lg-4 offset-3 p-2">
                    <div class="form-group">
                        <label>عنوان  مشخصه </label>
                        <input class="form-control" type="text"   name="title_main" />
                    </div>
                </div>
                <div class="col-lg-2 p-4">
                    <div class="form-group">
                        <label>مشخصه ثابت </label>
                        <div class="switch-button switch-button-yesno">
                            <input type="checkbox" value="1" @if(isset($data->status) && $data->status == 1) checked="checked" @endif name="status" id="status">
                            <span>
                    <label for="status"></label>
                </span>
                        </div>
                    </div>

                </div>
            </div>
            {{--					@include('admin.product-specification-type.form')--}}
            <div class="row">
                {{ csrf_field() }}
                <div class="col-lg-12" style="text-align: center;">
                    <button type="button" @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px; margin-right: 42%; margin-bottom: -2%;">
                        اضافه کردن مقدار<span class="fa fa-plus"></span></button></div>
                <div class="col-lg-6 offset-3 p-2"  v-for="me in number" >
                    <div class="form-group">
                        <label>عنوان مقادیر </label>
                        <input class="form-control" type="text"   name="title[]" />

                    </div>
                </div>


                <div class="col-lg-12 p-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <form method="post"
              action="{{URL::action('Admin\ProductSpecificationTypeController@postAdd',$parent_id)}}"
              class="form-horizontal form-label-left">
            {{--					@include('admin.product-specification-type.form')--}}
            <div class="row">
                {{ csrf_field() }}
                <div class="col-lg-12" style="text-align: center;">
                    <a @click="plusMe()" class="btn btn-default btn-success" style="font-size: 9px; margin-right: 42%; margin-bottom: -2%;">
                        اضافه کردن مقدار<span class="fa fa-plus"></span></a></div>
                <div class="col-lg-6 offset-3 p-2"  v-for="me in number" >
                    <div class="form-group">
                        <label>عنوان مشخصه </label>
                        <input class="form-control" type="text"   name="title[]" />
                    </div>
                </div>


                <div class="col-lg-12 p-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@section('js')
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
@endsection
