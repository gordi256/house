<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\ItemEnum;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class Item extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;
    use SearchableTrait;


    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function getEditLinkAttribute()
    {
        return    "/item/" . $this->id . "/edit";
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    // protected $casts = [
    //     'unit' => ItemEnum::class
    // ];
}
