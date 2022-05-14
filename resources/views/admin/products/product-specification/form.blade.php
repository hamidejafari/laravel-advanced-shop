
{{ csrf_field() }}
<div class="box-body" >
    <div class="form-group">
        <div class="row w-100 m-0">
            <p>مشخصه ای که نیاز به اختصاص دسته ندارد را ازینجا وارد کنید</p>
            <div class="col-xl-7 col-sm-12 col-xs-12 p-2">
                <select class="form-control" name="main_id">
                    <option value=""> انتخاب کنید</option>
                    @foreach($types as $key=>$row2)
                        <option value="{{$row2->id}}" >
                            {{$row2->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-7 col-sm-12 col-xs-12 p-2">
                <textarea class="form-control" id="title_main" name="title_main" placeholder="مقدار مشخصه"></textarea>
            </div>
        </div>
        <hr>
        <div class="row w-100 m-0">
            @foreach($fields as $key=>$row)
                <input name="spf_id[{{$row->id}}]" value="{{$row->id}}" type="hidden" />
                <div class="col-sm-12 col-xs-12 p-2">
                    <label for="title" class="col-form-label py-0" style="font-size: 16px;">
                        مشخصه  {{$row->title}}
                    </label>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                    <select class="form-control" name="category_id[{{$row->id}}]">
                        <option value=""> مقادیر مشخصه</option>
                        @foreach($row->children as $item)
                            <option value="{{$item->id}}" >
                                {{$item->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                    <input type="text" name="barcode[{{$row->id}}]" id="barcode" class="form-control" placeholder="  بارکد را وارد کنید" />
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                    <input type="text" name="count[{{$row->id}}]" id="old_price" class="form-control" placeholder=" موجودی فعلی انبار را وارد کنید" />
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                    <input type="text" name="max[{{$row->id}}]" id="old_price" class="form-control" placeholder=" حداقل موجودی در انبار را وارد کنید" />
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                    <div class="input-group shadow-sm sd">
                        <label class="input-group-text border py-0" for="inputGroupFile01">
                            قیمت قبل از تخفیف
                        </label>
                    <input type="text" name="old_price[{{$row->id}}]" id="old_price" class="form-control channels" @change="checkPrice{{$row->id}}" v-model="oldPrice{{$row->id}}" placeholder=" قیمت قبل از تخفیف را وارد کنید" />
                </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 p-2">
                    <div class="input-group shadow-sm sd">
                    <label class="input-group-text border py-0" for="inputGroupFile01">
                        قیمت فعلی
                    </label>
                    <input type="text" name="price[{{$row->id}}]" id="price" class="form-control channels" @change="checkPrice{{$row->id}}" v-model="currentPrice{{$row->id}}"   placeholder="  قیمت را وارد کنید" />
                </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-xs-12 p-2">
                    <input type="color" name="color[{{$row->id}}]" id="color" class="form-control h-100" placeholder="  رنگ را وارد کنید" />
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-12 p-2">
                    <div class="input-group shadow-sm sd">
                        <label class="input-group-text border py-0" for="inputGroupFile01">
                            تصویر
                        </label>
                        <input type="file" name="image[{{$row->id}}]"  class="form-control shadow-none border" >
                    </div>
                </div>
                @if(!$loop->last)
                <hr class="mt-3">
                @endif
            @endforeach
            <div class="col-sm-12 col-xs-12 p-2">
                <button type="submit" class="btn btn-success px-5" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">
                    ذخیره
                </button>
            </div>
        </div>
    </div>
</div>




