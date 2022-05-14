{{ csrf_field() }}
<div class="row w-100 m-0">
    <div class="col-lg-6 p-2 form-group">
        <label for="title" class="col-form-label">
            عنوان فارسی :
        </label>
        <input id="title" name="title" type="text" class="form-control" value="@if(isset($data->title)){{$data->title}}@endif">

        <label for="title_en" class="col-form-label">
            عنوان انگلیسی:
        </label>
        <input id="title_en" name="title_en" type="text" class="form-control" value="@if(isset($data->title_en)){{$data->title_en}}@endif">
    </div>
    <div class="col-lg-6 p-0 form-group">
        <label for="brand_id" class="col-form-label px-2">
            برند :
        </label>
        <div class="row w-100 m-0">
            <div class="col-lg-4 p-2 form-group">
                <input class="form-control" id="someinput" placeholder="جستجوی برند">
            </div>
            <div class="col-lg-12 p-2 form-group">
                <select id="optlist" class="form-control h-100" name="brand_id" value="@if(isset($data->brand_id)) {{$data->brand_id}} @endif">
                    <option value="">
                        انتخاب برند :
                    </option>
                    @foreach($brands as $row)
                        <option value="{{$row->id}}" @if(isset($data->brand_id)) @if($data->brand_id==$row->id) selected @endif @endif >
                            {{$row->title}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-6 p-2 form-group">
        <div class="border p-1">
            <label for="category_id" class="col-form-label">
                انتخاب دسته :
            </label>
            <div class="bg-light p-3">
                <input type="text" class="form-control mb-2" id="myInput" onkeyup="myFunction()" placeholder="جستجو ..">
                <div class="sd-checkbox ">
                    <ul id="myUL" class="p-0 m-0" style="list-style-type:none">
                        @foreach($category as $key=>$row2)
                            @php $cat =\App\Models\Category::find($row2['id']);
                            @endphp
                            <li>
                                <label class="custom-ch">
                                    {{$row2['title']}}
                                    <input type="checkbox" value="{{$row2['id']}}" @if(isset($data) and in_array($row2['id'],$cat_pro)) checked="checked" @endif
                                    name="category_id[]" class="form-control" multiple  @if(@$cat->childs && count(@$cat->childs) > 0) disabled @endif>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @if(isset($data))

        <div class="border p-1">
            دسته انتخاب شده:
            @foreach($selected_cat as $sc)
            <label for="" class="col-form-label">
              {!! @$sc->category->title !!}
                @if(!$loop->last)
                  ,
                @endif
            </label>
            @endforeach
        </div>
        @endif
    </div>

    <div class="col-lg-6 p-2 form-group">
        <div class="border p-1">
            <label  class="col-form-label">
                اگر دسته انتخاب شده برای محصولتان دارای مشخصه نیست لطفا قیمت ها را پر کنید   :
            </label>
           @if(isset($data) && $data->colors->count() > 0)
                <p style="color: #bb2d3b"> محصول با مشخصه میباشد لطفا قیمت را از سمت مشخصه ها وارد کنید</p>
            @endif
            <div class="row w-100 m-0 bg-light p-2" >
                <div class="col-lg-6 p-1 form-group">
                    <label for="old_price" class="col-form-label">
                        قیمت اصلی   :
                    </label>
                    <input id="old_price" name="old_price" type="text" v-model="oldPrice" class="form-control channels" value="@if(isset($data)){{@$data->price_admin['old'] ? @$data->price_admin['old'] : @$data->price_admin['price']}}@endif">

                </div>

                <div class="col-lg-6 p-1 form-group">
                    <label for="max" class="col-form-label">
                        قیمت با تخفیف    :
                    </label>
                    <input id="price" name="price" type="text" v-model="currentPrice" class="form-control channels" value="@if(isset($data->prices[0]->price)){{@$data->price_admin['price'] && (@$data->price_admin['old'] > 0) ? @$data->price_admin['price'] : ''}}@endif">
                </div>

                <div class="col-lg-12 p-1 form-group">
                    <label class="col-12 col-sm-4 col-form-label text-sm-right">
                        قیمت برای بلک فرایدی
                    </label>
                    <div class="col-lg-6 p-1 form-group">
                        <div class="switch-button switch-button-yesno">
                            <input type="checkbox" value="1" @if(isset($data->prices[0]->black_friday) && $data->prices[0]->black_friday == 1) checked="checked" @endif name="black_friday" id="black_friday">
                            <span>
                    <label for="black_friday"></label>
                </span>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 p-1 form-group">
                    <label for="weight" class="col-form-label">
                        وزن  :
                    </label>
                    <input id="weight" name="weight" type="text" class="form-control" value="@if(isset($data->weight)){{$data->weight}}@endif">

                </div>


                <div class="col-lg-6 p-1 form-group">
                    <label for="title_en" class="col-form-label">
                        بارکد
                    </label>
                    <input id="barcode" name="barcode" type="text" class="form-control" value="@if(isset($data->barcode)){{$data->barcode}}@endif">
                </div>
                <div class="col-lg-6 p-1 form-group">

                    <label for="max" class="col-form-label">
                        حداقل موجودی در انبار  :
                    </label>
                    <input id="max" name="max" type="text" class="form-control" value="@if(isset($data->max)){{$data->max}}@endif">

                </div>
                <div class="col-lg-6 p-1 form-group">
                    <label for="title_en" class="col-form-label">
                        موجودی انبار
                    </label>

                    @if(isset($data) && $data->sprcificationstock->count() > 0)
                        <input id="count" name="count" type="text" class="form-control" value="@if(isset($data)) @if($data->sprcificationstock->count() > 0){{@$data->stock_count_edit}} @else{{@$data->stock_count}}@endif @endif">
                    @else
                        <input id="count" name="count" type="text" class="form-control" value="{{@$data->stock_count}}">
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="col-lg-12 p-2">--}}
    {{--        <div class="form-group">--}}
    {{--            <label for="lead">--}}
    {{--                توضیحات کوتاه :--}}
    {{--            </label>--}}
    {{--            <textarea class="form-control ckeditor" id="lead" name="lead" rows="3">--}}
    {{--                @if(isset($data->lead)){!!$data->lead !!}@endif--}}
    {{--            </textarea>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <label for="description">
                ترکیبات :
            </label>
            <textarea class="form-control ckeditor" id="ingredients" name="ingredients" rows="3">
                @if(isset($data->ingredients)){!!$data->ingredients !!}@endif
            </textarea>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <label for="description">
                روش استفاده :
            </label>
            <textarea class="form-control ckeditor" id="how_to_use" name="how_to_use" rows="3">
                @if(isset($data->how_to_use)){!!$data->how_to_use !!}@endif
            </textarea>
        </div>
    </div>
    <div class="col-lg-12 p-2">
        <div class="form-group">
            <label for="description">
                توضیحات :
            </label>
            <textarea class="form-control ckeditor" id="description" name="description" rows="3">
                @if(isset($data->description)){!!$data->description !!}@endif
            </textarea>
        </div>
    </div>
    <div class="col-lg-12 p-2 form-group ">
        <label for="tags" class="col-form-label">
            برچسب‌ها:
        </label>
        <input type="text" class="form-control" name="tags" id="tags"
               value="@if(isset($data->tags)) @foreach($tag as $row2){{$row2->title}} @if(!$loop->last) , @endif
               @endforeach @endif">
    </div>
    <div class="col-lg-4 form-group">
        <label for="specification_title" class="col-form-label">نام اصلی مشخصه</label>
        <input id="specification_title" name="specification_title" type="text" class="form-control" value="@if(isset($data->specification_title)){{$data->specification_title}}@endif">
    </div>

    @if(isset($data) && $videos->count() > 0)
        <div class="col-lg-12 p-2 form-group">
            <div class="border p-1">
                <label  class="col-form-label">
                    ویدیوها  :
                </label>

                <div class="row w-100 m-0 bg-light p-2">
                    @foreach($videos as $v)
                        <div class="col-lg-12 p-2 form-group">

                            <label>توضیحات </label>
                            <textarea class="form-control" type="text" rows="4"
                                      name="links{{$v->id}}" >{!! $v->link !!} </textarea>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="col-lg-12 p-2 form-group">
        <div class="border p-1">
            <label  class="col-form-label">
                ویدیو ها  :
            </label>

            <div class="row w-100 m-0 bg-light p-2" v-for="me in number">
                <div class="col-lg-12 p-2 form-group">

                    <label>لینک آپارات </label>
                    <textarea class="form-control" type="text" name="link[]" rows="4" ></textarea>

                </div>
            </div>
            <div class="col-lg-6 text-end px-0 pt-3">
                <a @click="plusMe()" class="btn btn-default btn-primary">
                    <span class="fa fa-plus">اضافه کردن چندتایی</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 p-2 form-group">
        <label for="title_seo">
            عنوان سئو :
        </label>
        <input id="title_seo" name="title_seo" type="text" class="form-control" value="@if(isset($data->title_seo)){{$data->title_seo}}@endif">
    </div>

    <div class="col-lg-6 p-2 form-group">
        <label for="description_seo">توضیحات سئو:</label>
        <textarea class="form-control" id="description_seo" name="description_seo" rows="4">@if(isset($data->description_seo)){!!$data->description_seo !!}@endif</textarea>
    </div>
    @include('admin.products.relate',
        [
            'datable_type'=>'App\Models\Product',
            'edit'=>isset($data) ? $data : false
        ]
    )
    @include('admin.products.complement',
        [
            'datable_type'=>'App\Models\Product',
            'edit'=>isset($data) ? $data : false
        ]

    )
    <div class="col-lg-12 p-2 form-group">
        <div class="border p-1">
            <label  class="col-form-label">
                مشخصه های ثابت   :
            </label>
            <div class="row w-100 m-0 bg-light p-2">
                @foreach($ps_mains as $ps_main)
                    @php
                        if (isset($data)){
                        $x = \App\Models\ProductSpecification::where('product_specification_type_id',$ps_main->id)->where('product_id',$data->id)->first();
                        if ($x != null)
                        $y = \App\Models\ProductSpecificationType::find($x->product_specification_value_id);
                        }
                    @endphp
                    <div class="col-lg-6 p-1 form-group">
                        <label for="ps_main" class="col-form-label" >
                            {{@$ps_main->title}}
                        </label>


                        <textarea id="title_ps_main" name="main_spf[{{$ps_main->id}}]" type="text" class="form-control"> @if(isset($y->title)) {{$y->title}} @endif</textarea>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-xs-6 form-group">
        <label class="col-12 col-sm-4 col-form-label text-sm-right">
            فعال
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->status) && $data->status == 1) checked="checked" @endif name="status" id="status">
                <span>
                    <label for="status"></label>
                </span>
            </div>
        </div>
        <label class="col-12 col-sm-4 col-form-label text-sm-right">
            محبوبترین
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->popular) && $data->popular == 1) checked="checked" @endif name="popular" id="popular">
                <span>
                    <label for="popular"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-6 form-group">
        <label class="col-12 col-sm-4 col-form-label text-sm-right">
            پرفروش ترین
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->special) && $data->special == 1) checked="checked" @endif name="special" id="special">
                <span>
                    <label for="special"></label>
                </span>
            </div>
        </div>
        <label class="col-12 col-sm-4 col-form-label text-sm-right">
            جدیدترین
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->newest) && $data->newest == 1) checked="checked" @endif name="newest" id="newest">
                <span>
                    <label for="newest"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-6 form-group">
        <label class="col-12 col-sm-4 col-form-label text-sm-right">
            غیر قابل فروش
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->sell) && $data->sell == 1) checked="checked" @endif name="sell" id="sell">
                <span>
                    <label for="sell"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-6 form-group">
        <label class="col-12 col-sm-4 col-form-label text-sm-right">
            not_found
        </label>
        <div class="col-12 col-sm-8 col-lg-6 pt-1">
            <div class="switch-button switch-button-yesno">
                <input type="checkbox" value="1" @if(isset($data->not_found) && $data->not_found == 1) checked="checked" @endif name="not_found" id="not_found">
                <span>
                    <label for="not_found"></label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success mx-0 mt-4 px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">
                ذخیره
            </button>
        </div>
    </div>
</div>
@section('js')

    <script>

        function ReplaceNumberWithCommas(yourNumber) {
            //Seperates the components of the number
            var n = yourNumber.toString().split(".");
            //Comma-fies the first part
            n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //Combines the two sections
            return n.join(".");
        }

        $(".channels").change(function () {
            $(this).val(ReplaceNumberWithCommas($(this).val().replace(/,/g, '')));
            totalPriceCalculate();
        })

        $(".channels").keyup(function () {
            $(this).val(ReplaceNumberWithCommas($(this).val().replace(/,/g, '')));
            totalPriceCalculate();
        })

        $("#rahweb_form").submit(function () {
            $(".channels").each(function () {
                $(this).val($(this).val().replace(/,/g, ''));
            });
        });
    </script>
    <script src="{{asset('assets/admin/js/selectize.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $('#tags').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                valueField: 'tag',
                labelField: 'tag',
                searchField: 'tag',
                create: function(input) {
                    return {
                        tag: input
                    }
                }
            });
        });
        var tags = [
                @foreach ($tag as $tags)
            {tag: "{{$tags}}" },
            @endforeach
        ];

    </script>
    <script type="text/javascript">
        function myFunction() {

            var input, filter, ul, li, la, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");


            for (i = 0; i < li.length; i++) {
                la = li[i].getElementsByTagName("label")[0];
                txtValue = la.textContent || la.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
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

