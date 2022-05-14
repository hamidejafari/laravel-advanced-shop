<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    protected $table = 'setting';
    use SoftDeletes;
    protected $fillable = [
        'title', 'logo','abouttitle', 'about', 'about2','aboutimg', 'contact', 'phone', 'maps', 'email', 'address', 'description_seo','favicon'
       ,'rules','tax','alert','disable','admin_number','order','pay','banner','banner2','black_friday','fixing_price','fixed_price_count'
        ,'last_fixed_price_id','sale_background'
    ];
    public function scopeSet($query)
    {
        $records = $query->whereType(1);
        return $records;
    }
    public function scopeDaily($query)
    {
        $records = $query->whereType('daily');
        return $records;
    }
    public function scopeMonthly($query)
    {
        $records = $query->whereType('monthly');
        return $records;
    }
    public function scopeWeekly($query)
    {
        $records = $query->whereType('weekly');
        return $records;
    }
    public function scopeYearly($query)
    {
        $records = $query->whereType('yearly');
        return $records;
    }
}
