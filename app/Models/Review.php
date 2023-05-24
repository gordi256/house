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

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approver_id', 'id');
    }

    public function getEditLinkAttribute()
    {
        return   "/review/" . $this->id . "/edit";
    }

    public function getSummaryAttribute()
    {
        $summa = 0;

        foreach ($this->item  as $item) {
            $summa +=  $item->value  * $item->rate;
        }
        return number_format(round($summa, 2), 2, '.', '');
    }
}
