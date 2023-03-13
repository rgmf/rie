<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    use HasFactory;

    protected $dateFormat = 'U';

    protected $table = 'medias';

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }
}
