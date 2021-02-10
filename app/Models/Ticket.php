<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Illuminate\Events\queueable;
use App\Notifications\AlertWifiNotif;
use Log;


class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'login', 'password', 'type','heure',
    ];

    protected static function booted()
    {
        static::deleted(queueable(function ($ticket) {
            // if(Ticket::all()->count()>5){
            //     dd("tickets suffisants");
            // }
            $totalTickets = Ticket::all()->count();
            if( $totalTickets <= 5){
                \Notification::route('mail', 'moiset.2580@gmail.com')->notify(new AlertWifiNotif());
            }
            //Log::info('deleted event call: '.$ticket); 
           // dd("deleted event call ".$ticket);
        }));
    }

}
