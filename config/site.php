<?php
return [
    'admin' => 'admin',
    'panel' => 'panel',
    'permisions' => [
        'user' => array(
            'title' => 'مدیران',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'status' => 'وضعیت',
                'group' => 'مشاهده دسترسی',
                'groupAdd' => 'اضافه دسترسی',
                'groupEdit' => 'ویرایش دسترسی',
                'groupDelete' => 'حذف دسترسی',
                'address' => 'مشاهده آدرس',
                'addressEdit' => 'ویرایش آدرس',
                'addressDelete' => 'حذف آدرس',
            )
        ),
        'users' => array(
            'title' => 'کاربران',
            'access' => array(
                'index' => 'مشاهده',
                'export' => 'خروجی',
                'edit' => 'ویرایش',

            )
        ),
        'products' => array(
            'title' => 'محصولات  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'image'=>'مشاهده تصاویر',
                'imageAdd'=>'اضافه تصاویر',
                'imageEdit'=>'ویرایش تصاویر',
                'imageDelete'=>'حذف تصاویر',
                'thumbnailDelete'=>'کاور تصاویر',
                'sort' => 'مرتب سازی',
                'export' => 'خروجی اکسل',
            )
        ),
        'allproducts' => array(
            'title' => 'عملیات گروهی',
            'access' => array(
                'index' => 'مشاهده',
                'price' => 'قیمت دهی',
                'inventory' => 'موجودی',

            )
        ),
        'product-specification-type' => array(
            'title' => 'مشخصه ها  ',
            'access' => array(
                'index' => 'مشاهده',
                'list' => 'مشاهده',
                'add' => 'اضافه',
                'addMain' => 'اضافه کردن مشخصه اصلی',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'catAdd' => 'دسته',
                'catDelete'=>'حذف دسته',

            )
        ),
        'product-specification-price' => array(
            'title' => 'مشخصه ها  ',
            'access' => array(
                'index' => 'مشاهده',
                'list' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'deleteImage' => 'دسته',
                'sort' => 'دسته بندی',
                'postAdd' => 'اضافه کردن',
                'postAddGroup' => 'قیمت گروهی',


            )
        ),
        'product-specification' => array(
            'title' => 'مشخصات  ',
            'access' => array(
                'list' => 'مشاهده',
                'add' => 'اضافه',
                'order' => 'درخواست',
                'addOrder' => 'اضافه کردن درخواست',
                'delete' => 'حذف',

            )
        ),

        'articles' => array(
            'title' => 'مقاله  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'sort' => 'مرتب سازی',
            )
        ),
        'article-cat' => array(
            'title' => 'دسته بندی مقاله  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'sort' => 'مرتب سازی',
            )
        ),

        'inventory' => array(
            'title' => ' انبار ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'inventory-receipt' => array(
            'title' => ' رسید انبار ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'export' => 'خروجی اکسل',

            )
        ),
        'status' => array(
            'title' => ' وضعیت ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'departments' => array(
            'title' => ' دپارتمان ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'discounts' => array(
            'title' => 'تخفیف  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'brands' => array(
            'title' => 'برندها  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'deleteImage' => 'حذف تصویر',
                'sort' => 'مرتب سازی',
            )
        ),
        'category' => array(
            'title' => 'دسته بندی محصولات  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                 'delete' => 'حذف',
                 'sort' => 'مرتب سازی',
                 'search' => ' جستجو',

            )
        ),
        'order' => array(
            'title' => 'فاکتورها  ',
            'access' => array(
                'index' => 'مشاهده',
                'det' => 'جزئیات',
                'status' => 'وضعیت',
                'delete' => 'حذف',
                'export' => 'خروجی اکسل',
                'factor' => 'چاپ',
                'address' => 'آدرس',

            )
        ),
        'notification' => array(
            'title' => 'ناتیفیکیشن  ',
            'access' => array(
                'index' => 'مشاهده',
                'det' => 'جزئیات',
                'status' => 'وضعیت',
                'delete' => 'حذف',


            )
        ),



        'slider' => array(
            'title' => ' اسلایدر و بنر',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
                'sort' => 'مرتب سازی',
            )
        ),
        'mobile-slider' => array(
            'title' => ' بنر موبایل',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),

        'setting' => array(
            'title' => 'تنظیمات',
            'access' => array(
                'index' => 'مشاهده',
                'edit' => 'ویرایش',
            )

        ),

        'redirect' => array(
            'title' => 'ریدایرکت',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'delete' => 'حذف',
            )

        ),
        'question' => array(
            'title' => 'سوالات متداول محصولات ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'questions' => array(
            'title' => 'سوالات متداول کلی ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',


            )
        ),
        'faq' => array(
            'title' => 'سوالات متداول کاربران  ',
            'access' => array(
                'index' => 'مشاهده',
                'edit' => 'ویرایش',



            )
        ),
        'properties' => array(
            'title' => 'سایر مشخصات  ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),

        'uploader' => array(
            'title' => 'آپلودر ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
            )
        ),

        'social' => array(
            'title' => 'شبکه های اجتماعی ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',
            )
        ),

        'cropper' => array(
            'title' => 'کراپر ',
            'access' => array(
                'index' => 'مشاهده',

            )
        ),
        'comment' => array(
            'title' => 'کامنت ها',
            'access' => array(
                'index' => 'مشاهده',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'tickets' => array(
            'title' => 'تیکت',
            'access' => array(
                'index' => 'مشاهده',
                'detail' => 'جزئیات',
                'reply' => 'پاسخ',
                'ticketStatus' => 'وضعیت',
                'ticketReturn' => 'مرجوع',

            )
        ),
        'contact' => array(
            'title' => 'پیام   ',
            'access' => array(
                'index' => 'مشاهده',
                'add' => 'اضافه',
                'edit' => 'ویرایش',
                'delete' => 'حذف',

            )
        ),
        'tags' => array(
            'title' => 'تگ ها  ',
            'access' => array(
                'index' => 'مشاهده',
                'edit' => 'ویرایش',
                'delete' => 'حذف',


            )
        ),


    ]
];
