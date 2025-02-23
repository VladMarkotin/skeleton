<?php
namespace App\Facades\Request;


use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\InputBag;

class Request extends SymfonyRequest 
{
    private $postData = [];
    private $getData = [];
    public  InputBag $request;
}