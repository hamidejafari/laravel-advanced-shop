{{ csrf_field() }}
<div class="row">
	<div class="col-lg-6 form-group">
		<label for="name" class="col-form-label">عنوان</label>
		<input id="name" name="name" type="text" class="form-control"
			value="@if(isset($data->name)){{$data->name}}@endif">
	</div>
    <div class="col-lg-6 form-group">
        <input type="checkbox" name="select_all" value="1" id="select_all">
        <span class="text">انتخاب همه</span>
    </div>
    <div class="form-group">
        <div class="row">
            <?php
            if(isset($data->permission)){
                $accessDB = unserialize($data->permission);
            }else{
                $accessDB = [];
            }
            ?>
            @foreach(Config::get('site.permisions') as $key=>$value)
                <div class="widget col-md-4 p-2">
                    <div class="card bg-light rounded-lg p-3 h-100 border-0">
                        <div class="widget-header bordered-bottom bordered-themesecondary">
                            <i class="widget-icon fa fa-unlock-alt themesecondary"></i>
                            <span class="widget-caption themesecondary"
                                  style="color: #3c8dbc;">{{{ $value['title'] }}}</span>
                        </div>
                        <!--Widget Header-->
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="tickets-container" style="height: 100%;">
                                    <div class="row">
                                        @foreach($value['access'] as $keyAccess => $access)
                                            <?php
                                            $check = 0;
                                            if(isset($accessDB[$key][$keyAccess])) {
                                                $check = 1;
                                            }
                                            ?>
                                            <div class="col-md-12">
                                                <input type="checkbox" name="access[{{$key}}][{{$keyAccess}}]"
                                                       value="1" @if($check) checked @endif>
                                                <span class="text">{{{ $access }}}</span>

                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="checkbox" style="display: none;">
                                        <label style="padding-left: 0px;">
                                            <input type="checkbox" name="access[user][changePassword]"
                                                   value="1" checked>
                                        </label>
                                    </div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="col-lg-12 p-2">
        <div class="form-group">
            <button type="submit" class="btn btn-space btn-success m-0 px-5">ذخیره</button>
        </div>
    </div>
</div>
