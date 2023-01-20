<?php

namespace App\Models;

use App\Http\Controllers\Inertia\EventController;
use App\Http\Controllers\Front\ScheduleController;
use App\Support\Links;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function getLinksAttribute(): Links
    {
        return new Links(
            index: action([EventController::class, 'index']),
            create: action([EventController::class, 'create']),
            store: action([EventController::class, 'store']),
            show: action([ScheduleController::class], $this),
            edit: action([EventController::class, 'edit'], $this),
            update: action([EventController::class, 'update'], $this),
            destroy: action([EventController::class, 'destroy'], $this),
        );
    }

    public static function links(): Links
    {
        return new Links(
            index: action([EventController::class, 'index']),
            create: action([EventController::class, 'create']),
            store: action([EventController::class, 'store']),
        );
    }
}
