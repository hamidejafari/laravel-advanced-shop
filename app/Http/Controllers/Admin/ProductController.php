<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;
use App\Library\Help;
use App\Library\Helper;
use App\Library\Logs;
use app\Library\MakeTree;
use App\Library\Relate;
use app\Library\UploadImg;
use App\Models\Brand;
use App\Models\Category;
use App\Models\InventoryReceipt;
use App\Models\OrderItem;
use App\Models\Price;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use App\Models\Redirects;
use App\Models\RelateData;
use App\Models\Tag;
use App\Models\Taggable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function getProduct(Request $request)
    {
        $query= Product::orderBy('id','DESC');
        if($request->get('title')){

            $keywordRaw = \request()->get('title');
            $key = explode(' ',$keywordRaw);


            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('title', 'like', "%{$value}%");
                }
            });

        }

        if($request->get('brand')){

            $query->whereHas('brands',function (Builder $query2)use($request) {
                $keywordRaw2 = \request()->get('brand');
                $key2 = explode(' ',$keywordRaw2);


                $query2->where(function ($q2) use ($key2) {
                    foreach ($key2 as $value2) {
                        $q2->where('title', 'like', "%{$value2}%");
                    }
                });
            });

        }
        if($request->get('barcode')){
            $query->where('barcode','LIKE',Helper::persian2LatinDigit($request->get('barcode')));
        }
        $products = $query->paginate(100);
        $categorySort = Product::orderby('sort', 'ASC')->get();
        $cat = Category::get();

        return View('admin.products.index')
            ->with('products', $products)
            ->with('categorySort', $categorySort)
            ->with('category', $cat);
    }
    public function getAddProduct()
    {

        $category = Category::all()->toArray();
//        if (!empty($category)) {
//            MakeTree::getData($category);
//            $parent_id = array(null => 'بدون والد') + MakeTree::GenerateSelect();
//        } else {
//            $parent_id = array(null => 'بدون والد');
//        }

        if (!empty($category)) {
            MakeTree::getData($category);
            $category = MakeTree::GenerateArray(array('get'));
        }

        $ps_mains = ProductSpecificationType::whereStatus(1)->get();


        $tag = Tag::get();
        $brands = Brand::get();
        return View('admin.products.add')

            ->with('tag', $tag)
            ->with('brands', $brands)
            ->with('category', $category)
            ->with('ps_mains', $ps_mains)
            ->with('parent_id', $category);


    }

    public function postAddProduct(Request $request)
    {

        $input = $request->all();
        $input['status'] = $request->has('status');
        $input['special'] = $request->has('special');
        $input['available'] = $request->has('available');
        $input['popular'] = $request->has('popular');
        $input['newest'] = $request->has('newest');
        $input['sell'] = $request->has('sell');
        $input['not_found'] = $request->has('not_found');
//        $input['url']=str_replace(' ', '-',$input['url']);

        $product = Product::create($input);

        if($request->has('relates_ids')) {
            Relate::relates($input['relates_ids'], $product->id, $input['datable_type'],1, false);
        }
        if($request->has('comps_ids')) {
            Relate::relates($input['comps_ids'], $product->id, $input['datable_type'],2, false);
        }

        $product->update($input);

        if ($input['old_price'] != null || $input['price'] != null) {
            $price = Price::create([
                'old_price' =>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                'price' => intval(str_replace(',','',Helper::persian2LatinDigit($input['price']))),
                'priceable_id' => $product->id,
                'priceable_type' => 'App\Models\Product',
                'black_friday'=>@$input['black_friday'] ? 1 : 0,

            ]);
        }
        if(@$input['count']){
            $new_count = intval(Helper::persian2LatinDigit($input['count']));
            InventoryReceipt::create([
                'count' => $new_count,
                'product_id' => $product->id,
                'inventory_type_id' => 1,
                'inventory_id' => 1
            ]);
            $product->update([
                'stocks'=>$new_count
            ]);
        }
        $arr2 = [];
        foreach ($input['link'] as $key=>$item){
            if ($item != null ){

                $arr2[] = [

                    'link'=>$item,
                    'product_id'=>$product->id,
                ];
            }
        }
        $vid = Video::insert($arr2);

        if ($request->has('tags')) {
            $tags_input = explode(',', $input['tags']);
            $tags = [];
            foreach ($tags_input as $item) {
                if (strlen($item) > 1){
                    $tag = Tag::where('title', $item)->first();
                    if ($tag == null) {
                        $tag = Tag::create([
                            'title' => $item
                        ]);
                    }
                    $tags[] = [
                        'taggable_id' => $product->id,
                        'tag_id' => $tag->id,
                        'taggable_type' => 'App\Models\Product'
                    ];

                }
            }
            Taggable::insert($tags);
        }
        if ($request->has('category_id')) {
            $product->assignCategory($request['category_id']);
        }

        $ps_mains = ProductSpecificationType::whereStatus(1)->get();
        foreach ($ps_mains as $row){

            if($row !== null){
                $value = ProductSpecificationType::create([
                    'parent_id' => $row->id,
                    'title' => $input['main_spf'][$row->id]
                ]);

                $sp_main = ProductSpecification::create([
                    'product_specification_value_id' => $value->id,
                    'product_specification_type_id' => $row->id,
                    'product_id' => $product->id,

                ]);
            }
        }
        $relates = RelateData::where('relatable_id','-1')->get();
        foreach ($relates as $r){
            $r->destroy($r->id);
        }

        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$product->id);



        Helper::changePriceTable($product->id);

        return Redirect::action('Admin\ProductController@getProduct');
    }

    public function getEditProduct($id)
    {

        $category = Category::all()->toArray();
//        if (!empty($category)) {
//            MakeTree::getData($category);
//            $parent_id = array(null => 'بدون والد') + MakeTree::GenerateSelect();
//        } else {
//            $parent_id = array(null => 'بدون والد');
//        }

        if (!empty($category)) {
            MakeTree::getData($category);
            $category = MakeTree::GenerateArray(array('get'));
        }
        $brands = Brand::get();
        $ps_mains = ProductSpecificationType::whereStatus(1)->get();
        $data = Product::find($id);

        $videos = Video::orderby('id','DESC')->where('product_id',$id)->get();

        $cat_pro = $data->categories->pluck('id')->toArray();
        $selected_cat = ProductCategory::where('product_id',$id)->get();
        $tag_pro = Taggable::where('taggable_id', $id)->where('taggable_type','App\Models\Product')->pluck('tag_id')->toArray();
        $tag = Tag::whereIn('id',$tag_pro)->get();


        return View('admin.products.edit')

            ->with('data', $data)
            ->with('brands', $brands)
            ->with('tag', $tag)
            ->with('ps_mains', $ps_mains)
            ->with('videos', $videos)
            ->with('cat_pro', $cat_pro)
            ->with('category', $category)
            ->with('selected_cat', $selected_cat)
            ->with('parent_id', $category);
    }

    public function postEditProduct($id, Request $request)
    {
        $input = $request->all();
        $input['status'] = $request->has('status');
        $input['special'] = $request->has('special');
        $input['popular'] = $request->has('popular');
        $input['available'] = $request->has('available');
        $input['newest'] = $request->has('newest');
        $input['sell'] = $request->has('sell');
        $input['not_found'] = $request->has('not_found');
//        $input['url']=str_replace(' ', '-',$input['url']);
        $product = Product::orderBy('id','DESC')->find($id);
        $videos = Video::orderby('id','DESC')->where('product_id',$id)->get();

        foreach($videos as $row){

            $x = Video::find($row->id);

            $x->update([
                'link'=>$input['links'.$row->id],
            ]);

        }




        $product->update($input);
        if (Helper::persian2LatinDigit(@$input['count']) != $product->stock_count){
            if (Helper::persian2LatinDigit(@$input['count']) != 0) {

                if (@$input['count'] && $product->stock_count !== Helper::persian2LatinDigit(@$input['count'])) {
                    if ($product->stock_count > intval(Helper::persian2LatinDigit($input['count']))) {

                        $new_count = $product->stock_count - intval(Helper::persian2LatinDigit($input['count']));

                        InventoryReceipt::create([
                            'count' => $new_count,
                            'product_id' => $product->id,
                            'inventory_type_id' => 2,
                            'inventory_id' => 1
                        ]);
                        $stock_in = InventoryReceipt::where('product_id',$product->id)->In()->sum('count');
                        $stock_out = InventoryReceipt::where('product_id',$product->id)->Out()->sum('count');
                        if($stock_out > $stock_in ){
                            $product->update([
                                'stocks'=> '0'
                            ]);
                        }else{
                            $product->update([
                                'stocks'=>$stock_in-$stock_out
                            ]);
                        }
                    } else {

                        $new_count = intval(Helper::persian2LatinDigit($input['count'])) - $product->stock_count;

                        InventoryReceipt::create([
                            'count' => $new_count,
                            'product_id' => $product->id,
                            'inventory_type_id' => 1,
                            'inventory_id' => 1
                        ]);
                        $stock_in = InventoryReceipt::where('product_id',$product->id)->In()->sum('count');
                        $stock_out = InventoryReceipt::where('product_id',$product->id)->Out()->sum('count');
                        if($stock_out > $stock_in ){
                            $product->update([
                                'stocks'=> '0'
                            ]);
                        }else{
                            $product->update([
                                'stocks'=>$stock_in-$stock_out
                            ]);
                        }
                    }

                }

            } else {

                $in = $product->stock_count;
                InventoryReceipt::create([
                    'count' => $in,
                    'product_id' => $product->id,
                    'inventory_type_id' => 2,
                    'inventory_id' => 1
                ]);
                $stock_in = InventoryReceipt::where('product_id',$product->id)->In()->sum('count');
                $stock_out = InventoryReceipt::where('product_id',$product->id)->Out()->sum('count');
                if($stock_out > $stock_in ){
                    $product->update([
                        'stocks'=> '0'
                    ]);
                }else{
                    $product->update([
                        'stocks'=>$stock_in-$stock_out
                    ]);
                }
            }
        }
        $ps_mains = ProductSpecificationType::whereStatus(1)->get();

        foreach ($ps_mains as $row){

            if($row !== null) {
                $x = \App\Models\ProductSpecification::where('product_specification_type_id', $row->id)->where('product_id', $product->id)->first();

                if ($x != null) {

                    $y = \App\Models\ProductSpecificationType::find($x->product_specification_value_id);
                    $y->update([

                        'title' => $input['main_spf'][$row->id]
                    ]);
                }
                else{
                    $value = ProductSpecificationType::create([
                        'parent_id' => $row->id,
                        'title' => $input['main_spf'][$row->id]
                    ]);

                    $sp_main = ProductSpecification::create([
                        'product_specification_value_id' => $value->id,
                        'product_specification_type_id' => $row->id,
                        'product_id' => $product->id,

                    ]);

                }
            }
        }

        if ($request->get('relates_ids') !== null) {
            Relate::relates($input['relates_ids'], $product->id, $input['datable_type'],1, true);
        }
        else{
            $relate = RelateData::where('datable_id',$product->id)->where('datable_type',"App\Models\Product")->delete();
        }

        if ($request->get('comps_ids') !== null) {
            Relate::relates($input['comps_ids'], $product->id, $input['datable_type'],2, true);
        }
        else{
            $comp = RelateData::where('datable_id',$product->id)->where('datable_type',"App\Models\Product")->delete();
        }
        $relates = RelateData::where('relatable_id','-1')->get();
        foreach ($relates as $r){
            $r->destroy($r->id);
        }


        if(@$input['price'] !== null){
            if(@$input['black_friday'] == 1){
                Price::create([
                    'priceable_id' => $product->id,
                    'priceable_type' => 'App\Models\Product',
                    'black_friday'=>0,
                    'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                    // 'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                ]);
            }

            Price::create([
                'priceable_id' => $product->id,
                'priceable_type' => 'App\Models\Product',
                'black_friday'=>@$input['black_friday'] ? 1 : 0,
                'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['price']))),
                'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
            ]);

        }else{
            Price::create([
                'priceable_id' => $product->id,
                'priceable_type' => 'App\Models\Product',
                'black_friday'=>0,
                'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                'old_price'=>null,
            ]);
        }

//        if ($input['old_price'] != null || $input['price'] != null){
//            $price =  Price::create([
//                'old_price' =>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
//                'price' => intval(str_replace(',','',Helper::persian2LatinDigit($input['price']))),
//                'priceable_id' => $product->id,
//                'priceable_type' => 'App\Models\Product',
//                'black_friday'=>@$input['black_friday'] ? 1 : 0,
//
//
//            ]);
//        }


        $arr = [];
        foreach ($input['link'] as $key=>$item){
            if ($item != null ){

                $arr[] = [

                    'link'=>$item,
                    'product_id'=>$product->id,
                ];
            }
        }
        $vid= Video::insert($arr);
        if ($request->has('tags')) {
            $tags_input = explode(',', $input['tags']);
            Taggable::where('taggable_id', $product->id)->delete();
            $tags = [];
            foreach ($tags_input as $item) {
                if (strlen($item) > 1) {
                    $tag = Tag::where('title', $item)->first();
                    if ($tag == null) {
                        $tag = Tag::create([
                            'title' => $item
                        ]);
                    }
                    $tags[] = [
                        'taggable_id' => $product->id,
                        'tag_id' => $tag->id,
                        'taggable_type' => 'App\Models\Product'
                    ];
                }
            }
            Taggable::insert($tags);
        }
        $product->categories()->detach();
        $product->assignCategory($request['category_id']);
        $array = array($input);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$product->id);

        Helper::changePriceTable($product->id);

        return Redirect::action('Admin\ProductController@getProduct')->with('success','آیتم موردنظر با موفقیت ثبت شد.');
    }
    public function getDeleteProduct($id)
    {

        $content = Product::find($id);
        $redirect = Redirects::create([
            "old_address" => @'/pro/'.$content->id,
            "new_address" => '',

        ]);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Product::destroy($id);
        return Redirect::action('Admin\ProductController@getProduct')->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');

    }
    public function postDeleteProduct(Request $request)
    {

        if (Product::destroy($request->get('deleteId'))) {
            ProductCategory::where('product_id',$request->get('deleteId'))->delete();
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }

    public function postSort(Request $request)
    {

        if ($request->get('update') == "update") {
            $count = 1;
            if ($request->get('update') == 'update') {
                foreach ($request->get('arrayorder') as $idval) {

                    $category = Product::find($idval);
                    $category->sort = $count;
                    $category->save();
                    $count++;
                }
                echo 'با موفقیت ذخیره شد.';
            }
        }
    }
    public function export()
    {


        return Excel::download(new ProductExport(), 'products.xlsx');
    }
//========================== PRODUCT IMAGE =================================================

    public function getImage($id)
    {
        $image = Product::find($id);
        $data = Image::whereProductId($image->id)->orderBy('id','DESC')->get();
        $categorySort = Image::orderby('sort', 'ASC')->whereProductId($image->id)->get();
        return view('admin.product_image.index')
            ->with('data',$data)
            ->with('categorySort',$categorySort)
            ->with('image', $image);
    }

    public function getAddImage($product_id)
    {
        $image = Product::find($product_id);
        $data = Image::whereProductId($image->id)->paginate(100);
        return view('admin.product_image.add')
            ->with('data',$data)
            ->with('image', $image)
            ->with('product_id', $product_id);
    }

    public function postAddImage(Request $request)
    {
        $input = $request->all();
//        $input['thumbnail'] = $request->has('thumbnail');
        set_time_limit(2000000000000000);
        ini_set('memory_limit', '128M');
        ini_set('post_max_size', '1024M ');
        ini_set('upload_max_filesize', '1024M ');
//        if ($request->hasFile('file')) {
//            $path = "assets/uploads/content/pro/";
//            $uploader = new UploadImg();
//            $fileName = $uploader->uploadPic($request->file('file'), $path);
//            if($fileName){
//                $input['file'] = $fileName;
//            }else{
//                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
//            }
//        }
//        $image = Image::create($input);
//        if ($image->thumbnail == 1){
//            $imgs = Image::whereProductId($image->product_id)->where('id','<>',$image->id)->get();
//            foreach ($imgs as $img){
//                $img->update([
//                    'thumbnail'=>0
//                ]);
//            }
//        }
        if (@$input['images']) {
            foreach(@$input['images'] as $item_image){
                $pathMain = "assets/uploads/content/pro/big/";
                $extension = $item_image->getClientOriginalExtension();
                $fileName = md5(microtime()) . ".$extension";
                $item_image->move($pathMain, $fileName);
                $x = Image::create([
                    'product_id'=>$input['product_id'],
                    'file'=>$fileName
                ]);
            }
        }
        return \redirect('/admin/products/image/'.$input['product_id'])->with('success','آیتم موردنظر با موفقیت ثبت شد.');
    }

    public function getEditImage($product_id)
    {
        $data = Image::find($product_id);

        return view('admin.product_image.edit')
            ->with('data' , $data)
            ->with('product_id', $product_id);
    }

    public function postEditImage($id , Request $request)
    {
        $input = $request->all();
        $input['thumbnail'] = $request->has('thumbnail');
        $image = Image::find($id);
        set_time_limit(2000);
        if ($request->hasFile('file')) {
            $path = "assets/uploads/content/pro/";
            File::delete($path . '/big/' . $image->file);
            File::delete($path . '/medium/' . $image->file);
            File::delete($path . '/small/' . $image->file);
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('file'), $path);
            if($fileName){
                $input['file'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }
        else {
            $input['file'] = $image->file;
        }
        $input['product_id'] = $image->product_id;
        $image->update($input);
        return \redirect('/admin/products/image/'.$image->product_id)->with('success','آیتم موردنظر با موفقیت ویرایش شد.');
    }
    public function editThumbnail($id , Request $request)
    {
        $input = $request->all();
        $image = Image::find($id);
        $image->update([
            'thumbnail'=>1
        ]);
        $imgs = Image::whereProductId($image->product_id)->where('id','<>',$image->id)->get();
        foreach ($imgs as $img){
            $img->update([
                'thumbnail'=>0
            ]);
        }
        return \redirect()->back()->with('success','آیتم موردنظر با موفقیت ویرایش شد.');
    }

    public function postDeleteImage(Request $request)
    {
        $images = Image::whereIn('id', $request->get('deleteId'))->pluck('file');
        foreach ($images as $item) {
            File::delete('assets/uploads/content/pro/small/' . $item);
            File::delete('assets/uploads/content/pro/big/' . $item);
            File::delete('assets/uploads/content/pro/medium/' . $item);
        }
        if (Image::destroy($request->get('deleteId'))) {
            return \redirect()->back()->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }
    }

//========================== PRODUCT Timer =================================================

    public function getTimer($id)
    {
        $data = Product::find($id);

        return view('admin.timer.add')
            ->with('data',$data)
            ->with('id', $id);
    }


    public function postTimer(Request $request)
    {
        $input = $request->all();

        $product = Product::find($input['product_id']);
        $time = explode('/', $request->get('date'));
        $b = jalali_to_gregorian($time[2],$time[1],$time[0]);
        $hour = explode(':',Help::persian2LatinDigit($input['hour']));
        $date = Carbon::create($b[0],$b[1],$b[2], $hour[0],$hour[1]);

        $time2 = explode('/', $request->get('end_date'));
        $b2 = jalali_to_gregorian($time2[2],$time2[1],$time2[0]);
        $hour2 = explode(':',Help::persian2LatinDigit($input['hour2']));
        $date2 = Carbon::create($b2[0],$b2[1],$b2[2], $hour2[0],$hour2[1]);


        $product->update([
            'date' => @$date ? @$date : null,
            'end_date' => @$date2 ? @$date2 : null,
            'timer' => 1
        ]);

        return Redirect::back()
            ->with('success', 'محصول مورد نظر با موفقیت در بخش فروش ویژه قرار گرفت');
    }
    public function postEditTimer($id, Request $request)
    {
        $input = $request->all();
        $product = Product::find($id);
        if(@$input['date']) {
            $time = explode('/', $request->get('date'));
            $b = jalali_to_gregorian($time[2], $time[1], $time[0]);
            $hour = explode(':', Help::persian2LatinDigit($input['hour']));
            $date = Carbon::create($b[0], $b[1], $b[2], $hour[0], $hour[1]);
        }
        if(@$input['end_date']) {
            $time2 = explode('/', $request->get('end_date'));
            $b2 = jalali_to_gregorian($time2[2], $time2[1], $time2[0]);
            $hour2 = explode(':', Help::persian2LatinDigit($input['hour2']));
            $date2 = Carbon::create($b2[0], $b2[1], $b2[2], $hour2[0], $hour2[1]);
        }

        $product->update([
            'date' => @$date ? @$date : null,
            'end_date' => @$date2 ? @$date2 : null,
            'timer' => $request['timer'] ? 1 : 0
        ]);

        return Redirect::back()
            ->with('success', 'محصول مورد نظر با موفقیت ویرایش شد');
    }

    public function getRepeat()
    {
        set_time_limit(20000);

        $data = Image::whereNull('old_file')->where('fix_pic','0')->get();
        $arr=[];
        foreach ($data as $product){

            if(in_array(@$product->file,$arr)){
                $product->update([
                    'fix_pic'=>1
                ]);

            }
            $arr[]=$product['file'];
        }
    }
    public function getCheck()
    {
        set_time_limit(20000);

        $data = Product::where('check_stock','1')->get();


        return View('admin.products.index22')
            ->with('data',$data);




    }
//========================== PRODUCT Order =================================================

    public function getOrder($id, Request $request)
    {
        $product = Product::find($id);

        $query = OrderItem::query();
        if($request->get('start') and $request->get('end')){
            $query->whereHas('sale',function (Builder $query2)use($request) {
                $start = explode('/', $request->get('start'));
                $end = explode('/', $request->get('end'));

                $s = jmktime(0, 0, 0, $start[1], $start[0], $start[2]);
                $e = jmktime(0, 0, 0, $end[1], $end[0], $end[2]);
                $query2->whereBetween('created_at2', array(Carbon::createFromTimestamp($s), Carbon::createFromTimestamp($e)));
            });

        }
        if($request->get('post_type')){
            $query->whereHas('sale',function (Builder $query2)use($request) {
                $query2->where('post_type' ,$request->get('post_type'));
            });

        }

            $query->whereHas('sale',function (Builder $query2)use($request) {
                $sum = $query2;
            });



        $data = $query->whereProductId($id)->orderBy('id','DESC')->get();
        $sum = $query->whereProductId($id)->orderBy('id','DESC')->sum('price');
        return view('admin.products.order.index')
            ->with('product',$product)
            ->with('data',$data)
            ->with('sum',$sum);
    }


//===============================AllPrice==========

    public function getAllProduct(Request $request)
    {
        $query= Product::orderBy('id','DESC');
        if($request->get('title')){

            $keywordRaw = \request()->get('title');
            $key = explode(' ',$keywordRaw);


            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('title', 'like', "%{$value}%");
                }
            });

        }

        if($request->get('brand')){
            $query->whereHas('brands',function (Builder $query2)use($request) {
                $keywordRaw2 = \request()->get('brand');
                $key2 = explode(' ',$keywordRaw2);


                $query2->where(function ($q2) use ($key2) {
                    foreach ($key2 as $value2) {
                        $q2->where('title', 'like', "%{$value2}%");
                    }
                });
            });

        }
        $products = $query->select('title','id')->get();
        $query3= Product::whereHas('pro_sp')->orderBy('id','DESC');
        if($request->get('title')){

            $keywordRaw = \request()->get('title');
            $key = explode(' ',$keywordRaw);


            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('title', 'like', "%{$value}%");
                }
            });

        }

        if($request->get('brand')){
            $query3->whereHas('brands',function (Builder $query4)use($request) {
                $keywordRaw2 = \request()->get('brand');
                $key3 = explode(' ',$keywordRaw2);


                $query4->where(function ($q3) use ($key3) {
                    foreach ($key3 as $value3) {
                        $q3->where('title', 'like', "%{$value3}%");
                    }
                });
            });

        }
        $products2 = $query3->select('title','id')->get();


        $categorySort = Product::orderby('sort', 'ASC')->get();
        $cat = Category::get();

        return View('admin.products.all')
            ->with('products', $products)
            ->with('products2', $products2)
            ->with('categorySort', $categorySort)
            ->with('category', $cat);
    }

    public function postPriceProduct(Request $request)
    {
        $input = $request->all();
        if ($request->has('product_id')) {

            foreach($input['product_id'] as $item){

                if(@$input['price'] !== null){
                    if(@$input['black_friday'] == 1){
                        Price::create([
                            'priceable_id' => $item,
                            'priceable_type' => 'App\Models\Product',
                            'black_friday'=>0,
                            'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                            // 'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                        ]);
                    }

                    Price::create([
                        'priceable_id' => $item,
                        'priceable_type' => 'App\Models\Product',
                        'black_friday'=>@$input['black_friday'] ? 1 : 0,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['price']))),
                        'old_price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                    ]);

                }else{
                    Price::create([
                        'priceable_id' => $item,
                        'priceable_type' => 'App\Models\Product',
                        'black_friday'=>0,
                        'price'=>intval(str_replace(',','',Helper::persian2LatinDigit($input['old_price']))),
                        'old_price'=>null,
                    ]);
                }

                Helper::changePriceTable(@$item);

            }
            return \redirect()->back()->with('success', 'کدهای مورد نظر با موفقیت ویرایش شدند.');
        }
        else{
            return \redirect()->back()->with('error', 'لطفا حداقل یک محصول را انتخاب کنید.');
        }
    }
     public function postInevtoryProduct(Request $request)
     {
         $input = $request->all();

         if ($request->has('product_id2')) {
             foreach($input['product_id2'] as $item){
                 $product=Product::find($item);

                 if (Helper::persian2LatinDigit(@$input['count']) != $product->stock_count){
                     if (Helper::persian2LatinDigit(@$input['count']) != 0) {

                         if (@$input['count'] && $product->stock_count !== Helper::persian2LatinDigit(@$input['count'])) {
                             if ($product->stock_count > intval(Helper::persian2LatinDigit($input['count']))) {

                                 $new_count = $product->stock_count - intval(Helper::persian2LatinDigit($input['count']));

                                 InventoryReceipt::create([
                                     'count' => $new_count,
                                     'product_id' => $product->id,
                                     'inventory_type_id' => 2,
                                     'inventory_id' => 1
                                 ]);
                                 $stock_in = InventoryReceipt::where('product_id',$product->id)->In()->sum('count');
                                 $stock_out = InventoryReceipt::where('product_id',$product->id)->Out()->sum('count');
                                 if($stock_out > $stock_in ){
                                     $product->update([
                                         'stocks'=> '0'
                                     ]);
                                 }else{
                                     $product->update([
                                         'stocks'=>$stock_in-$stock_out
                                     ]);
                                 }
                             } else {

                                 $new_count = intval(Helper::persian2LatinDigit($input['count'])) - $product->stock_count;

                                 InventoryReceipt::create([
                                     'count' => $new_count,
                                     'product_id' => $product->id,
                                     'inventory_type_id' => 1,
                                     'inventory_id' => 1
                                 ]);
                                 $stock_in = InventoryReceipt::where('product_id',$product->id)->In()->sum('count');
                                 $stock_out = InventoryReceipt::where('product_id',$product->id)->Out()->sum('count');
                                 if($stock_out > $stock_in ){
                                     $product->update([
                                         'stocks'=> '0'
                                     ]);
                                 }else{
                                     $product->update([
                                         'stocks'=>$stock_in-$stock_out
                                     ]);
                                 }
                             }

                         }

                     } else {

                         $in = $product->stock_count;
                         InventoryReceipt::create([
                             'count' => $in,
                             'product_id' => $product->id,
                             'inventory_type_id' => 2,
                             'inventory_id' => 1
                         ]);
                         $stock_in = InventoryReceipt::where('product_id',$product->id)->In()->sum('count');
                         $stock_out = InventoryReceipt::where('product_id',$product->id)->Out()->sum('count');
                         if($stock_out > $stock_in ){
                             $product->update([
                                 'stocks'=> '0'
                             ]);
                         }else{
                             $product->update([
                                 'stocks'=>$stock_in-$stock_out
                             ]);
                         }

                     }
                 }

             }
             return \redirect()->back()->with('success', 'کدهای مورد نظر با موفقیت ویرایش شدند.');
         }
         else{
             return \redirect()->back()->with('error', 'لطفا حداقل یک محصول را انتخاب کنید.');
         }

     }


     public function fixPrice(){
         set_time_limit(2000);
        $products = Product::orderby('id','asc')->whereFix('0')->take(200)->get();
        foreach ($products as $pro){
            $pro->update([
                'price'=>@$pro->price_second['price'],
                'old_price'=>@$pro->price_second['old'],
                'fix'=>1
            ]);

        }
     }
    public function fixStock(){
        set_time_limit(2000);
        $products = Product::orderby('id','asc')->where('stock_fix','0')->take(200)->get();
        foreach ($products as $pro){
            $pro->update([
                'stocks'=>@$pro->stock_count,
                'stock_fix'=>1
            ]);

        }
    }


    public function getTrash(){
        $products = Product::orderby('id','DESC')->whereNotNull('deleted_at')->withTrashed()->paginate(100);
        return View('admin.products.trash')
            ->with('products', $products);
    }
    public function postSortImage(Request $request)
    {

        if ($request->get('update') == "update") {
            $count = 1;
            if ($request->get('update') == 'update') {
                foreach ($request->get('arrayorder') as $idval) {

                    $category = Image::find($idval);
                    $category->sort = $count;
                    $category->save();
                    $count++;
                }
                echo 'با موفقیت ذخیره شد.';
            }
        }
    }
}
