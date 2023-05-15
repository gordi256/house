<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;



class Review extends Model
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
        // 'columns' => [
        //     'reviews.name' => 10,
        // ]

        'columns' => [
            'buildings.name' => 10,
            'buildings.street' => 8,
            'users.first_name' => 8,
            'users.last_name' => 10,
            'reviews.description' => 8,

        ],
        'joins' => [
            'buildings' => ['reviews.building_id', 'buildings.id'],
            'users' => ['reviews.user_id', 'users.id'],
        ],


    ];

    public function item()
    {
        return $this->hasMany(ReviewItem::class, 'review_id', 'id')->orderBy('id');
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }


    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getEditLinkAttribute()
    {
        // config('app.url') .
        return   "/review/" . $this->id . "/edit";
    }
}
