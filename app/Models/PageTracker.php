<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PageTracker
 * @package App\Models
 * @property int id
 * @property string url
 */
class PageTracker extends Model
{
    use HasFactory;

    protected $guarded=[];

    /**
     * @param string $url
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }



}
