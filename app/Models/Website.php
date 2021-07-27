<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Website extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public const BUTTON_1_LINK_SELECT = [
        '/'             => 'Home',
        '/services'     => 'Services',
        '/about-us'     => 'About',
        '/contact-us'   => 'Contact',
    ];

    public const BUTTON_2_LINK_SELECT = [
        '/'             => 'Home',
        '/services'     => 'Services',
        '/about-us'     => 'About',
        '/contact-us'   => 'Contact',
    ];

    public $table = 'websites';

    protected $appends = [
        'hero_image',
        'about_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hero_title',
        'hero_title_2',
        'hero_text',
        'button_1_title',
        'button_1_link',
        'button_2_title',
        'button_2_link',
        'about_us_text',
        'our_team_text',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getHeroImageAttribute()
    {
        $file = $this->getMedia('hero_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getAboutImageAttribute()
    {
        $file = $this->getMedia('about_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
