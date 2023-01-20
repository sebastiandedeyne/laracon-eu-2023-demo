<?php

namespace App\Models;

use App\Http\Controllers\Admin\VenueController;
use App\Support\Links;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function getLinksAttribute(): Links
    {
        return new Links(
            index: action([VenueController::class, 'index']),
            create: action([VenueController::class, 'create']),
            store: action([VenueController::class, 'store']),
            edit: action([VenueController::class, 'edit'], $this),
            update: action([VenueController::class, 'update'], $this),
            destroy: action([VenueController::class, 'destroy'], $this),
        );
    }

    public static function links(): Links
    {
        return new Links(
            index: action([VenueController::class, 'index']),
            create: action([VenueController::class, 'create']),
            store: action([VenueController::class, 'store']),
        );
    }
}
