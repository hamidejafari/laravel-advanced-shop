<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\ContactRequest;
use App\Library\Helper;
use App\Library\Relate;
use App\Library\SliderBanner;
use App\Models\Bell;
use App\Models\Box;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecificationType;
use App\Models\ProductSpecificationTypeCategory;
use App\Models\Properties;
use App\Models\Question;
use App\Models\RelateData;
use App\Models\Sloagen;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Video;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use function Composer\Autoload\includeFile;


class HomeController extends Controller
{
    public function getIndex()
    {
        $sliders = Content::orderby('sort','ASC')->Slider()->get();
        $mobile_sliders = Content::orderby('sort','ASC')->Mslider()->get();
        $brands = Brand::orderby('id', 'DESC')->whereStatus('1')->get()->random(9);
        $categories = Category::orderby('id', 'DESC')->whereStatus('1')->take(10)->get();
        $new_products = Product::orderby('id','DESC')->where('newest','1')->where('not_found','0')->active()->take(10)->get();
        $popular_products = Product::orderby('sort','ASC')->where('popular','1')->where('not_found','0')->active()->take(10)->get();
        $most_products = Product::orderby('sort','ASC')->where('special','1')->where('not_found','0')->active()->take(10)->get();
        $timer_products = Product::orderby('sort','ASC')->where('timer','1')->where('not_found','0')->active()->where('end_date','>',Carbon::now())->get();
        $articles = Content::orderby('id', 'DESC')->Article()->whereStatus('1')->take(8)->get();

        return view('site.index')
            ->with('brands', $brands)
            ->with('banners', SliderBanner::Banner())
            ->with('mobiles', SliderBanner::Mobile())
            ->with('sliders', $sliders)
            ->with('mobile_sliders', $mobile_sliders)
            ->with('new_products', $new_products)
            ->with('popular_products', $popular_products)
            ->with('most_products', $most_products)
            ->with('timer_products', $timer_products)
            ->with('articles', $articles)
            ->with('categories', $categories);
    }
    public function getMost()
    {

        $most_products = Product::orderby('sort','ASC')->where('special','1')->where('not_found','0')->active()->get();


        return view('site.products.most_pro-list')

            ->with('most_products', $most_products);

    }
    public function getPopular()
    {

        $most_products = Product::orderby('sort','ASC')->where('popular','1')->where('not_found','0')->active()->get();


        return view('site.products.most_pro-list')

            ->with('most_products', $most_products);

    }
    public function getTimer()
    {

        $timer_products = Product::orderby('sort','ASC')->where('timer','1')->where('not_found','0')->active()->where('end_date','>',Carbon::now())->get();


        return view('site.products.timer_pro-list')

            ->with('timer_products', $timer_products);

    }
    public function getDis()
    {
        $x = Product::whereHas('colors',function ($query2) {
            $query2->whereNotNull('old_price');


        }) ->get();
        $p = Product::orderby('stocks','DESC')->whereNotNull('price')->whereNotNull('old_price')->get();
        $a = $x->merge($p);

        return view('site.products.dis_pro-list')

            ->with('most_products', $a);

    }
    public function getNew()
    {

        $most_products = Product::orderby('id','DESC')->where('newest','1')->where('not_found','0')->active()->get();


        return view('site.products.most_pro-list')

            ->with('most_products', $most_products);

    }
    public function banner(Request $request, $id)
    {
        $seg = $request->segments();
        $banner = Content::find($id);
        if(!$banner){
            return redirect('/');
        }

        return view('site.banner', compact('banner'));
    }
    public function brandList()
    {
        $brands = Brand::orderby('title','ASC')->get()->groupBy(function($item) {
            return $item->title[0];
        })->toArray();
        $letters = [
            ['title'=>'A-C','letters'=>'A|B|C'],
            ['title'=>'D-F','letters'=>'D|E|F'],
            ['title'=>'G-I','letters'=>'G|H|I'],
            ['title'=>'J-L','letters'=>'J|K|L'],
            ['title'=>'M-O','letters'=>'M|N|O'],
            ['title'=>'P-R','letters'=>'P|Q|R'],
            ['title'=>'S-U','letters'=>'S|T|U'],
            ['title'=>'V-X','letters'=>'V|W|X'],
            ['title'=>'Y-Z','letters'=>'Y|Z'],
        ];

        return view('site.brands', compact('brands','letters'));
    }
    public function brandDetail(Request $request, $id)
    {
        $brand = Brand::find($id);
        $products = Product::orderBy('id','DESC')->whereBrandId($brand->id)->where('not_found','0')->get();
        $proid = $products->pluck('id');
        $cat_pro = ProductCategory::whereIn('product_id',$proid)->pluck('category_id');
        $categories = Category::whereIn('id',$cat_pro)->get();
        return view('site.brand.details', compact('brand','products','categories'));
    }
    public function postNumber(Request $request)
    {
        $input = $request->all();

        if ($input['phone'] != null){
            $contact = Contact::create($input);

            return redirect()->back()->with('success', 'شماره شما با موفقیت ثبت شد. ');
        }
        else{
            return redirect()->back()->with('erroe', 'لطفا ابتدا شماره خود را وارد کنید. ');
        }

    }
    public function list(Request $request, $id)
    {
        $seg = $request->segments();
        $category = Category::find($id);
        if ($category->parent_id == null){
            return view('site.products.cat', compact('category'));
        }
        else{
            $query = Product::whereHas('categories',function ($query2) use($id) {
                $query2->where('not_found','0')->where('id', $id);
            })->pluck('brand_id');
            $brands=Brand::whereIn('id',$query)->get();
            $products = $category->products;

            $fieldId = ProductSpecificationTypeCategory::whereCategoryId($category->id)->pluck('pst_id')->all();
            $fields = ProductSpecificationType::whereIn('id',$fieldId)->whereNull('parent_id')->with('children')->get();
            return view('site.products.list', compact('category','fields','products','brands'));
        }

    }
    public function detail($id)
    {
        $product = Product::where('not_found','0')->find($id);
        if(!$product){
            return redirect('/');
        }
        $specifications_types = ProductSpecificationType::whereHas('sp',function ($query2) use($id,$product) {
            $query2->where('product_id',$product->id)->whereHas('prices');
        })->get();

        $specifications = $product->specifications->groupBy('pivot.product_specification_type_id');
        $top_properties = Properties::where('product_id',$product->id)->orderby('sort','ASC')->whereStatus('1')->get();
        $bottom_properties = Properties::where('product_id',$product->id)->orderby('sort','ASC')->whereStatus('0')->get();

        $questions = Question::where('product_id',$product->id)->whereNotNull('answer')->get();
        $comments = Comment::where('commentable_id',$product->id)->whereNull('parent_id')->whereStatus(1)->where('commentable_type','App\Models\Product')->get();
        $comments_count = Comment::where('commentable_id',$product->id)->whereStatus(1)->where('commentable_type','App\Models\Product')->count();
        $likes_count = Like::where('likeable_id',$product->id)->where('likeable_type','App\Models\Product')->count();
        $relate_ids  =  RelateData::where('datable_id',$id)->where('datable_type' , 'App\Models\Product')->where('type' , 1)->pluck('relatable_id');
        $relate = Product::whereIn('id',$relate_ids)->where('not_found','0')->get();
        $complement_ids  =  RelateData::where('datable_id',$id)->where('datable_type' , 'App\Models\Product')->where('type' , 2)->pluck('relatable_id');
        $complement = Product::whereIn('id',$complement_ids)->where('not_found','0')->get();
        $tag_pro = Taggable::where('taggable_id', $product->id)->where('taggable_type','App\Models\Product')->pluck('tag_id')->toArray();

        $tags = Tag::whereIn('id',$tag_pro)->where('title','<>','')->get();
        $videos = Video::orderby('id','DESC')->where('product_id',$id)->get();
        $boxes = Box::orderby('sort','ASC')->where('product_id',$id)->get();
        $sloagens = Sloagen::where('product_id',$product->id)->get();
        return view('site.products.details', compact('product','specifications','top_properties','bottom_properties',
            'questions','comments','comments_count','specifications_types','relate','complement','tags','tag_pro','sloagens','likes_count','videos','boxes'));
    }
    public function postComment(CommentFormRequest $request)
    {

        if (Auth::check()) {
            Comment::create([
                'content' => @$request->get('content'),
                'title' => @$request->get('title'),
                'commentable_id' => @$request->get('commentable_id'),
                'commentable_type' => @$request->get('commentable_type'),
                'user_id' => Auth::id(),
                'star'=> @$request->get('star'),
                'status'=> 0,
                'readat'=> 0,
            ]);
            return \redirect()->back()->with('success','دیدگاه شما با موفقیت ثبت گردید.');
        }
        else
        {

            return \redirect()->back()->with('error','ابتدا وارد شوید.');
        }

    }
    public function postReply(Request $request)
    {


        if (Auth::check()) {
            Comment::create([
                'content' => $request->get('content'),
                'title' => $request->get('title'),
                'commentable_id' => $request->get('commentable_id'),
                'commentable_type' => $request->get('commentable_type'),
                'user_id' => Auth::id(),
                'parent_id'=>$request->get('parent_id'),
                'star'=> $request->get('star'),
                'status'=> 0,
                'readat'=> 0,
            ]);

            return \redirect()->back()->with('success','دیدگاه شما با موفقیت ثبت گردید.');
        }
        else
        {
            return \redirect()->back()->with('error','ابتدا وارد شوید.');
        }


    }
    public function postFaq(Request $request )
    {
        if (Auth::check()) {
            Question::create([
                'question' => $request->get('question'),
                'product_id' => $request->get('product_id'),
            ]);
            return \redirect()->back()->with('success','پرسش شما با موفقیت ثبت گردید.');
        }
        else
        {

            return \redirect()->back()->with('error','ابتدا وارد شوید.');
        }

    }
    public function getAbout()
    {

        return view('site.about');


    }
    public function getRules()
    {

        return view('site.rules');


    }
    public function getOrderRules()
    {

        return view('site.rules_order');


    }
    public function getPay()
    {

        return view('site.pay');


    }
    public function getFaq()
    {
        $questions = Question::whereNotNull('answer')->whereNull('product_id')->get();
        return view('site.faq.faq')
            ->with('questions',$questions);


    }

    public static function is_english($str)
    {
        if (strlen($str) != strlen(utf8_decode($str))) {
            return false;
        } else {
            return true;
        }
    }

    public function getSearch(Request $request)
    {


        $products = [];
        $products = Product::where('not_found','0')->where(function ($query){
            if (\request()->get('search') )
            {

                $keywordRaw = \request()->get('search');
                $key = explode(' ',$keywordRaw);
                if(self::is_english(\request()->get('search'))){

                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('title_en', 'LIKE', "%{$value}%");
                        }
                    });

                }else{
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('title', 'like', "%{$value}%");
                        }
                    });


                }






            }
        })->get()->sortByDesc('stockCount');

        $brands = [];
        $brands = Brand::where(function ($query){
            if (\request()->get('search') )
            {
                $query->where('title', 'LIKE', '%' . \request()->get('search') . '%');
            }
        })->get();

        $a = [];

        $count  = count($brands) + count($products);


        if($brands !== [] and $products !==[]) {
            if ($brands != null || $products != null)
            {
                $a = array_merge($brands->toArray(), $products->toArray());
            }
        }

        $all= $this->paginate($a,10);
        $search = $request->get('search');
        return view('site.search')
            ->with('all',$all)
            ->with('count',$count)
            ->with('search_products',$products)
            ->with('brands',$brands)
            ->with('search',$search);
    }
    public function paginate($items, $perPage = 10 , $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()
        ]);
    }
    public function contentListByTag($tag)
    {
        $x=str_replace('-',' ' ,$tag);
        $tags = Tag::where('title',$x)->pluck('id');
        $seo = Tag::where('title',$x)->first();
        $data = Taggable::whereIn('tag_id',$tags)->get();
        $count = Taggable::whereIn('tag_id',$tags)->count();
        return view('site.tag.tag')
            ->with('count',$count)
            ->with('tag',$tag)
            ->with('x',$x)
            ->with('seo',$seo)
            ->with('data',$data);
    }

    public function blogCat()
    {
        $blogs = Content::orderby('id', 'DESC')->ArticleCat()->get();
        return view('site.article.cat')
            ->with('blogs',$blogs);

    }
    public function blogList(Request $request, $id)
    {
        $seg = $request->segments();
        $blog_category = Content::find($id);
        $blogs = Content::orderby('id', 'DESC')->where('parent_id',$id)->get();
        return view('site.article.list')
            ->with('blog_category',$blog_category)
            ->with('blogs',$blogs);

    }
    public function blogDetail(Request $request, $id)
    {
        $seg = $request->segments();
        $blog = Content::find($id);
        if(!$blog){
            return redirect('/');
        }
        $blog->update([
            'view'=> $blog->view + 1,
        ]);
        $blogs = Content::orderby('id', 'DESC')->where('parent_id',$blog->parent_id)->where('id','<>',$id)->take(5)->get();
        $comments = Comment::where('commentable_id',$blog->id)->whereNull('parent_id')->whereStatus(1)->where('commentable_type','App\Models\Content')->get();
        $comments_count = Comment::where('commentable_id',$blog->id)->whereStatus(1)->where('commentable_type','App\Models\Content')->count();

        return view('site.article.details')
            ->with('blog',$blog)
            ->with('comments_count',$comments_count)
            ->with('comments',$comments)
            ->with('blogs',$blogs);

    }
    public function getContact()
    {

        return view('site.contact');
    }
    public function postContact(ContactRequest $request)
    {
        $input = $request->all();


        if (preg_match('/[qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM]/', $input['name']))
        {
            return redirect()->back()->with('error','لطفا برای قسمت نام از کلمات فارسی استفاده کنید');
        }
        else{


            $contact = Contact::create($input);

            return redirect()->back()->with('success', 'پیام شما با موفقیت ثبت شد.');
        }

    }

    public function tracking()
    {
        $order = null;
        return view('site.tracking')
            ->with('order',$order);


    }
    public function track(Request $request)
    {
        $input = $request->all();
        $user = User::where('mobile',Helper::persian2LatinDigit($input['mobile']))->first();
        if ($user){
            $order = Order::orderby('id','DESC')->where('user_id',$user->id)->where('id',Helper::persian2LatinDigit($input['tracking_code']))->first();
            if ($order == null){
                return redirect()->back()->with('error', 'کد پیگیری وارد شده اشتباه است');
            }else{
                return view('site.tracking')
                    ->with('order',$order);
            }
        }else{
            return redirect()->back()->with('error', 'کاربری با این شماره وجود ندارد');
        }
    }
    public function postBell(Request $request)
    {
        $input = $request->all();
        if(Auth::check()){
            $check = Bell::where('user_id',auth()->user()->id)->where('product_id',$input['reminder_id'])->whereStatus('0')->first();
            if (!$check){
                $bell = Bell::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $input['reminder_id']
                ]);
            }
            else{
                return redirect()->back()->with('error', 'شما قبلا برای این محصول درخواست ثبت کرده اید');
            }
        }else{

            return redirect('panel/login/?reminder_id='.@$request->reminder_id)->with('success', 'لطفا ابتدا وارد شوید');

        }
        return redirect()->back()->with('success', 'در صورت موجود شدن محصول به شما اطلاع داده خواهد شد');
    }

    public function fixVid(){
        set_time_limit(2000);
        $products = Product::orderby('id','desc')->whereNotNull('video_link')->where('vid_fix','0')->take(200)->get();
        foreach ($products as $pro){
            $video= Video::create([
                'product_id'=>$pro->id,
                'link'=>$pro->video_link
            ]);
            $pro->update([
                'vid_fix'=>1
            ]);

        }
    }

}
