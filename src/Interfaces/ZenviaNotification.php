<?php

namespace ThallisPHP\LaravelZenviaNotification\Interfaces;

interface ZenviaNotification
{
    /**
     * Conteúdo da mensagem SMS
     *
     * @param  NotifiableByZenvia  $notifiable
     * @return string
     */
    public function toZenvia(NotifiableByZenvia $notifiable): string;
}
