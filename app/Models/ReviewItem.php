<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Nicolaslopezj\Searchable\SearchableTrait;


class ReviewItem extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    use SearchableTrait;

    protected $guarded = [];

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }


    public function getIndexAttribute()
    {
        return    $this->item->category->id . '.' . $this->item->order_column;
    }
}
