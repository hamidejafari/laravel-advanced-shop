<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Convert\Post;
use App\Models\Convert\PostMeta;
use App\Models\Convert\TermMeta;
use App\Models\Convert\TermRelation;
use App\Models\Convert\Terms;
use App\Models\Convert\TermType;
use App\Models\Convert\UserMeta;
use App\Models\Convert\WpUser;
use App\Models\InventoryReceipt;
use App\Models\Price;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use App\Models\ProductSpecificationType;
use App\Models\Properties;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Library\WebClientCustom;
use DOMDocument;
use Exception;
use function Ramsey\Uuid\v1;
use DomXPath;

class ConvertUserController extends Controller
{
    public function convertUsers(){
        $users = WpUser::orderBy('id','ASC')->take(10)->get();
        foreach($users as $row){
            $first_name = UserMeta::where('user_id',$row->id)->where('meta_key','first_name')->first();
            $last_name = UserMeta::where('user_id',$row->id)->where('meta_key','last_name')->first();

            $user = User::create([
                'old_id'=>$row->id,
                'name'=>@$first_name->meta_value,
                'family'=>@$last_name->meta_value,
                'mobile'=>$row->user_login,
                'email'=>$row->user_email,
                'password'=>bcrypt($row->user_login),
                'mobile_confirm'=>1,
                'email_confirm'=>1,
                'status'=>1,
                'admin'=>0,
                'gender'=>null,
                'created_at'=>$row->user_registered
            ]);

            $orders_ids = PostMeta::where('meta_key','_customer_user')->where('meta_value',$row->id)->pluck('post_id');
            $orders = PostMeta::whereIn();
            foreach($orders as $order){

            }
            dd('finish');
        }
    }

    public function convertOrders(){
        $orders = Post::where('post_type','shop_order')->orderBy('id','ASC')->take(10)->get();
        foreach($orders as $row){
            $user_id = PostMeta::where('post_id',$row->id)->where('meta_key','_customer_user')->first();

        }
    }
}
