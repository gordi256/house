<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\ItemEnum;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoItem  extends Model implements Sortable
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

    public function buildSortQuery()
    {
        return static::query()->where('info_category_id', $this->info_category_id);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(InfoCategory::class, 'info_category_id', 'id');
    }
    public function getEditLinkAttribute()
    {
        return    "/info_item/" . $this->id . "/edit";
    }
}
