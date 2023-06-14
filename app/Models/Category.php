<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;
    use SearchableTrait;
    use SoftDeletes;


    protected $guarded = [];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public function item()
    {
        return $this->hasMany(Item::class, 'category_id', 'id')->orderBy('id');
    }

    public function getEditLinkAttribute()
    {
        return    "/category/" . $this->id . "/edit";
    }

    public function getShowLinkAttribute()
    {
        return    "/category/" . $this->id  ;
    }
}
