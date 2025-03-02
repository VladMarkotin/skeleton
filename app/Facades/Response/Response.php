<?php
namespace App\Facades\Response;


class Response
{
    public static function away(string $url)
    {
        header('Location: ' . $url);
        exit();
    }
}