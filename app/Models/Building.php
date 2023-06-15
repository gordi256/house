<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
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
            'buildings.name' => 10,
            'buildings.street' => 9,
            // 'buildings.organization' => 10,
            'buildings.description' => 5,

        ]
    ];
    protected $guarded = [];

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
        $this->addMediaCollection('documents');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'building_id');
    }

    public function info()
    {
        return $this->hasOne(BuildingInfo::class, 'building_id');
    }
    
    public function getHasInfoAttribute()
    {
        if (count((array)$this->info)> 0) {
            return true;
        }
        return false;
    }

    public function getEditLinkAttribute()
    {
        return   "/building/" . $this->id . "/edit";
    }

    public function getShowLinkAttribute()
    {
        return   "/building/" . $this->id;
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
