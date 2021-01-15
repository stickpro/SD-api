<?php


namespace App\Service;

use Illuminate\Http\Client\PendingRequest;

class TelegramService
{
    protected PendingRequest $client;

    protected string $chatId = '274483640';

    public function __construct(PendingRequest $client)
    {
        $apiKey = config('telegram.api_key');
        $client->baseUrl("https://api.telegram.org/bot{$apiKey}/");
        $this->client = $client;
    }

    public function sendMessage(array $data = []): int
    {
        return $this->client
                ->post("sendMessage?text={$this->toString($data)}&chat_id={$this->chatId}&parse_mode=html")
                ->status();
    }

    protected function toString(array $data = []): string
    {
        return urlencode("
        <b>ФИО:</b> {$data['name']}\n<b>E-Mail:</b> {$data['email']}\n<b>Телефон:</b> {$data['phone']}\n<b>Сообщение:</b>\n
        {$data['message']}");
    }
}