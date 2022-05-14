<div class="card p-0 border-0 rounded-0">
    <div class="mb-2">
        <p class="fw-bolder h6 p-1 m-0 d-flex align-items-center justify-content-between">
            آدرس ها
        </p>
        <span class="text-secondary p-1 text-end d-flex">
            آدرس پیشفرض را انتخاب کنید 
            <span class="text-danger">
                *
            </span>
        </span>
    </div>
    <div class="row w-100 m-0">
        @foreach($addresses as $row)
            <div class="col-lg-6 p-1">
                <div class="card bg-light rounded-0 shadow-sm p-2">

                    <ul class="p-0 m-0">
                        <li class="list-unstyled">
                            <p class="fw-bolder text-start">
                                {{@$row->location}}
                            </p>
                        </li>
                        <li class="list-unstyled">
                            <p class="m-0 text-secondary text-start">
                                <i class="bi bi-envelope"></i>
                                کد پستی : {{@$row->postal_code}}
                            </p>
                        </li>
                        <li class="list-unstyled">
                            <p class="m-0 text-secondary text-start">
                                <i class="bi bi-telephone"></i>
                                شماره تماس : {{@$row->transferee_mobile}}
                            </p>
                        </li>
                        <li class="list-unstyled">
                            <p class="m-0 text-secondary text-start">
                                <i class="bi bi-person"></i>
                                {{@$row->transferee_name.' '.@$row->transferee_family}}
                            </p>
                        </li>
                    </ul>
                    <div class="text-end d-flex justify-content-end">
                        <a href="{{URL::action('Panel\PanelController@getDeleteAddress',$row->id)}}" type="button"
                           onclick="return confirm('آیا از حذف اطلاعات مطمئن هستید؟');"
                           class="btn-link btn text-danger d-flex align-items-center text-decoration-none">
                            <i class="bi bi-trash d-flex me-1"></i>
                            حذف
                        </a>
                        <a href="" class="btn-link btn text-success d-flex align-items-center text-decoration-none"
                           data-bs-toggle="modal" data-bs-target="#adressModal{{$row->id}}" @click="closeMe()">
                            <i class="bi bi-pen d-flex me-1"></i>
                            ویرایش
                        </a>
                    </div>
                    @if($row->default_address == 1)
                        <a href="{{URL::action('Site\ShopController@defaultAddress',$row->id)}}" type="button"
                           class="btn-link btn-sm btn btn-primary d-flex align-items-center justify-content-center text-decoration-none text-white w-100">
                            <i class="bi bi-check2-circle me-2"></i>
                            انتخاب  به عنوان آدرس پیشفرض
                        </a>
                    @else
                        <a href="{{URL::action('Site\ShopController@defaultAddress',$row->id)}}" type="button"
                           class="btn-link btn-sm btn btn-success d-flex align-items-center justify-content-center text-decoration-none text-white w-100">
                            <i class="bi bi-check2-circle me-2"></i>
                            انتخاب  به عنوان آدرس پیشفرض
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
