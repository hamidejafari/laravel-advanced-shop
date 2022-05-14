<div class="card rounded-lg border-0 p-2">
	<div class="row w-100 m-0">
		{{ csrf_field() }}
		<div class="row w-100 m-0 p-2 border" v-for="me in numbers">
			<div class="col-lg-6 p-0 form-group m-0">
				<label for="city_id" class="col-form-label py-0 px-2">
					محصول :
				</label>
                <div class="row w-100 m-0">
                    <div class="col-lg-5 p-2">
                        <input :id="me.title" @change="search" class="form-control" placeholder="جستجوی محصول"/>
                    </div>
                    <div class="col-lg-7 p-2">
                        <select :id="me.title2" class="form-control" name="product_id[]">
                            <option value="">انتخاب </option>
                            @foreach($products as $row)
                            <option value="{{$row->id}}">
                                {{$row->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
			</div>
			<div class="col-lg-2 p-2 form-group m-0">
				<label for="city_id" class="col-form-label py-0">
					انبار :
				</label>
				<select class="form-control" id="inventory_id" name="inventory_id[]">
					<option value="">انتخاب انبار </option>
					@foreach($inventory as $row2)
					<option value="{{$row2->id}}">
						{{$row2->title}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 p-2 form-group m-0">
				<label for="inventory_type_id" class="col-form-label py-0">
					نوع :
				</label>
				<select class="form-control" id="inventory_type_id" name="inventory_type_id[]">
					<option value="">انتخاب نوع </option>
					@foreach($type as $row3)
					<option value="{{$row3->id}}">
						{{$row3->title}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 p-2 form-group m-0">
				<label for="count" class="col-form-label py-0">تعداد: </label>
				<input class="form-control" type="text" name="count[]" placeholder="تعداد را وارد کنید.." />
			</div>
{{--			<div class="col-lg-2 p-2 form-group m-0">--}}
{{--				<label for="status" class="col-form-label py-0">--}}
{{--					نمایش--}}
{{--				</label>--}}
{{--				<select class="form-control" id="status" name="status[]">--}}
{{--					<option value="">انتخاب وضعیت نمایش </option>--}}
{{--					<option value="0">--}}
{{--						عدم نمایش--}}
{{--					</option>--}}
{{--					<option value="1">--}}
{{--						نمایش--}}
{{--					</option>--}}
{{--				</select>--}}
{{--			</div>--}}
		</div>
		<div class="col-lg-6 px-0 pt-2">
			<a @click="plusMe()" class="btn btn-default btn-primary">
				<span class="fa fa-plus">اضافه کردن چندتایی</span>
			</a>
            <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">ذخیره</button>
		</div>
		<!-- <div class="col-lg-6 p-2">
			<div class="form-group m-0">

			</div>
		</div> -->
	</div>
</div>
