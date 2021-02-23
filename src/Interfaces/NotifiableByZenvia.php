<?php

namespace ThallisPHP\LaravelZenviaNotification\Interfaces;

interface NotifiableByZenvia
{
    /**
     * Número do telefone celular do destinatário
     * Formato aceito: "5511222223333"
     *
     * @param  ZenviaNotification  $notification
     *
     * @return string
     */
    public function routeForZenvia(ZenviaNotification $notification) : string;
}
