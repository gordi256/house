<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InfoCategory extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;
    use SearchableTrait;
    use SoftDeletes;

        /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'info_categories.name' => 10,
        ]
    ];
    protected $guarded = [];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public function item()
    {
        return $this->hasMany(InfoItem::class, 'info_category_id', 'id')->orderBy('id');
    }

    public function getEditLinkAttribute()
    {
        return    "/info_category/" . $this->id . "/edit";
    }

    public function getShowLinkAttribute()
    {
        return    "/info_category/" . $this->id;
    }
}
