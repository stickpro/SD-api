<?php

namespace App\Http\Controllers;

use App\Http\Requests\Telegram\SendTelegramRequest;
use App\Service\TelegramService;

class TelegramController extends Controller
{
    public function send(SendTelegramRequest $request, TelegramService $service)
    {
        return $service->sendMessage($request->validated());
    }
}
