<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Portfolio
 *
 * @property int $id
 * @property mixed $slug
 * @property int|null $filter_id
 * @property int|null $mockup_id
 * @property int|null $image_id
 * @property mixed $gallery
 * @property mixed $seo_title
 * @property mixed $seo_description
 * @property mixed $seo_keywords
 * @property mixed $title
 * @property mixed $description
 * @property string $external_link
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Image|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereExternalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereFilterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereMockupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Filter|null $filter
 * @property-read array $translations
 * @property-read \App\Models\Image|null $mockup
 */
class Portfolio extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
            'slug',
            'filter_id',
            'mockup_id',
            'image_id',
            'gallery',
            'seo_title',
            'seo_description',
            'seo_keywords',
            'title',
            'description',
            'external_link',
    ];

    public $translatable = [
            'slug',
            'seo_title',
            'seo_description',
            'seo_keywords',
            'title',
            'description'
    ];


    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function mockup()
    {
        return $this->belongsTo(Image::class);
    }

    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }

}
