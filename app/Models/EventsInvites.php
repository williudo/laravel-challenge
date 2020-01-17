<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsInvites extends Model
{
    public $timestamps = true;
    protected $table = 'events_invites';

    public function scopeFilters($query){
        if (request('name_contact')) {
            $query->where('name_contact', 'rlike', request('name_contact'));
        }
        if (request('email')) {
            $query->where('email', 'rlike', request('email'));
        }
        if (request('id_event')) {
            $query->where('id_event', request('id_event'));
        }
    }
}
