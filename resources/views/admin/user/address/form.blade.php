{{ csrf_field() }}
<div class="row" id="address23">
	<div class="col-lg-6 form-group">
		<label for="name" class="col-form-label">نام</label>
		<input id="name" name="name" type="text" class="form-control"
			value="@if(isset($data->name)){{$data->name}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <label for="postal_code" class="col-form-label">کد پستی</label>
        <input id="postal_code" name="postal_code" type="text" class="form-control"
               value="@if(isset($data->postal_code)){{$data->postal_code}}@endif">
    </div>


    <div class="col-lg-6 form-group">
        <div class="form-floating">
            <select name="state_id" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example" v-model="selectedState" @change="getEditCities(selectedState)">
                <option value=""> انتخاب استان </option>
                @foreach($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
            </select>
            <label for="floatingSelect">
                استان
            </label>
        </div>
    </div>
    <div class="col-lg-6 form-group">
        <div class="form-floating">
            <select class="form-select" id="floatingSelect"
                    aria-label="Floating label select example" v-model="selectedCity"  name="city_id">
                <option value="">انتخاب شهر </option>
                <option v-for="city in cities" :value="city.id">@{{city.name}}</option>
            </select>
            <label for="floatingSelect">
                شهر
            </label>
        </div>
    </div>


    <div class="col-lg-6 form-group">
        <label class="col-form-label">وضعیت</label>
        <select name="default_address" id="default_address" class="form-default_address">
                <option value="1" @if(isset($data->default_address) and $data->default_address==1)
                selected
                    @endif>آدرس پیش فرض</option>
            <option value="0" @if(isset($data->default_address) and $data->default_address==0)
            selected
                @endif>آدرس </option>
        </select>
	</div>

    <div class="form-group">
        <label for="location" class="col-form-label">نشانی </label>
        <textarea class="form-control" type="text" id="location" name="location" rows="3">@if(isset($data->location)){!!$data->location !!}@endif</textarea>
    </div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
@section('js')
        <script>
            var app = new Vue({
                el: '#address23',
                data:{
                    selectedState:'',
                    selectedCity: '',



                    selectedState:{{@$data->state_id}},
                    selectedCity: {{@$data->city_id}},

                    cities: [],

                    msg: 'Test'
                },
                mounted() {

                    this.getCities();
                    this.getEditCities(null);


                },
                methods: {
                    getCities:function ()  {
                        var vm = this;


                        axios.post(`{{route('panel.set-city')}}`, {
                            body: {}
                        })
                            .then(response => {
                                if (response.data.success === true) {
                                    vm.cities = response.data.cities;
                                }
                            })
                            .catch(e => {
                                console.log(e);
                            });
                    },
                    setCities:function ()  {

                        var vm = this;

                        axios.post(`{{route('panel.set-city')}}`, {
                            body: {  state_id: this.selectedState }
                        })
                            .then(response => {
                                if (response.data.success === true) {
                                    vm.cities = [];
                                    vm.cities = response.data.cities;
                                }
                            })
                            .catch(e => {
                                console.log(e);
                            });
                    },
                    getEditCities:function (selectedState)  {
                        var vm = this;


                        axios.post(`{{route('panel.set-city-edit')}}`, {
                            body: {
                                state_id: selectedState
                            }
                        })
                            .then(response => {
                                if (response.data.success === true) {
                                    vm.cities = response.data.cities;
                                }
                            })
                            .catch(e => {
                                console.log(e);
                            });

                    }
                }
            })
        </script>

@endsection
