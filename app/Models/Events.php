<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Events extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'events';

    /*
     * Apply filter to query
     */
    public function scopeFilters($query){
        if (request('title')) {
            $query->where('title', 'rlike', request('title'));
        }
        if (request('description')) {
            $query->where('description', 'rlike', request('description'));
        }
        if (request('event_date')) {
            $query->whereDate('event_starts_at', '>=', request('event_date'))
                  ->whereDate('event_ends_at', '<=', request('event_date'));
        }
        $query->whereNull('deleted_at');
    }

    public function scopeNextDays($query, $days){
        $today = Carbon::today();
        $query->whereBetween('event_starts_at', $today, $today->addDays($days)->toDateTimeString());
    }
    public function scopeToday($query){
        $today = Carbon::today();
        dd($today);
        //$query->where('event_starts_at', '>=' $today, $today->addDays($days));
    }
}
