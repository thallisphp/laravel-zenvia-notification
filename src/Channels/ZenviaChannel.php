<?php

namespace ThallisPHP\LaravelZenviaNotification\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use ThallisPHP\LaravelZenviaNotification\Interfaces\NotifiableByZenvia;
use ThallisPHP\LaravelZenviaNotification\Interfaces\ZenviaNotification;

class ZenviaChannel
{
    /**
     * @param  NotifiableByZenvia  $notifiable
     * @param  Notification|ZenviaNotification  $notification
     * @return bool
     */
    public function send(NotifiableByZenvia $notifiable, ZenviaNotification $notification): bool
    {
        return Http
            ::withHeaders(['X-API-TOKEN' => config('services.zenvia.token')])
            ->baseUrl('https://api.zenvia.com/v2/')
            ->post('channels/sms/messages', [
                'from' => config('services.zenvia.from'),
                'to' => $notifiable->routeForZenvia($notification),
                'contents' => [
                    [
                        'type' => 'text',
                        'text' => $notification->toZenvia($notifiable),
                    ],
                ],
            ])
            ->successful();
    }
}
