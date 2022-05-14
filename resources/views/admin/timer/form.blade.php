<div class="row w-100 m-0">
    {{ csrf_field() }}
    <input type="hidden" name="product_id" value="{{$data->id}}">
    @if($data->timer == 1)
    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">
                نمایش تایمر
            </label>
            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                <div class="switch-button switch-button-yesno">
                    <input type="checkbox" value="1" @if(isset($data->timer) && $data->timer == 1) checked="checked" @endif name="timer" id="timer">
                    <span>
                    <label for="timer"></label>
                </span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-lg-6 form-group">
        <label for="from_date" class="col-form-label">تاریخ شروع اعتبار</label>

        <div class="controls">
            <input type="text" name="date" id="datepicker1" class="form-control" value="@if(isset($data->date)){{$data->date ? \App\Library\Help::persian2LatinDigit(jdate('d/m/Y', DateTime::createFromFormat('Y-m-d H:i:s', $data->date)->getTimestamp()))  : ''}}@endif" />
        </div>
    </div>
    <div class="col-lg-6 form-group">
        <label for="to_date" class="col-form-label">ساعت شروع اعتبار</label>
        <div class="controls">
            <input class="form-control"  type="text" name="hour" value="@if(isset($data->date)){{$data->date ? \App\Library\Help::persian2LatinDigit(jdate('H:i', DateTime::createFromFormat('Y-m-d H:i:s', $data->date)->getTimestamp()))  : ''}}@endif">

        </div>
    </div>

    <div class="col-lg-6 form-group">
        <label for="from_date" class="col-form-label">تاریخ پایان اعتبار</label>

        <div class="controls">
            <input type="text" name="end_date" id="datepicker2" class="form-control" value="@if(isset($data->end_date)){{$data->end_date ? \App\Library\Help::persian2LatinDigit(jdate('d/m/Y', DateTime::createFromFormat('Y-m-d H:i:s', $data->end_date)->getTimestamp()))  : ''}}@endif" />
        </div>
    </div>
    <div class="col-lg-6 form-group">
        <label for="to_date" class="col-form-label">ساعت پایان اعتبار</label>
        <div class="controls">
            <input class="form-control"  type="text" name="hour2" value="@if(isset($data->end_date)){{$data->end_date ? \App\Library\Help::persian2LatinDigit(jdate('H:i', DateTime::createFromFormat('Y-m-d H:i:s', $data->end_date)->getTimestamp()))  : ''}}@endif">

        </div>
    </div>

    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
<style>
    .ui-datepicker-title {
        margin: 0 !important;
    }
</style>
@section('js')
    <script>
        $(document).ready(function() {
            $("#datepicker1").datepicker({
                changeMonth: true,
                changeYear: true
            });
            $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
