<?php

namespace App\Http\Controllers;
use OpenApi\Attributes as OA;

#[
    OA\Info(version: '1.0.0', title: 'Laravel OpenApi', description: 'Laravel OpenApi description'),
    OA\Server(url: 'http://localhost:8000/', description: 'local server'),
    OA\Server(url: 'https://example.com/', description: 'staging server'),
    OA\Server(url: 'https://api.example.com/', description: 'production server'),
    OA\SecurityScheme( securityScheme: 'bearerAuth', type: 'http', name: "Autorization", in: 'header', scheme: 'bearer'),
]
abstract class Controller
{
    //
}
