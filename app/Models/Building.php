<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Building extends Model
{
    use HasFactory;
    use SearchableTrait;

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
            'buildings.name' => 10,
            'buildings.organization' => 10,
            'buildings.description' => 5,

        ]
    ];
    protected $guarded = [];

    public function review()
    {
        return $this->hasMany(Review::class, 'building_id');
    }

    public function getEditLinkAttribute()
    {
        return   "/building/" . $this->id . "/edit";
    }

    public function getReportLinkAttribute()
    {
        return   "/building/" . $this->id . "/review";
    }
    
    public function getNewReportLinkAttribute()
    {
        return   "/building/" . $this->id . "/new";
    }
}
