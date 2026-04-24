<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FacebookEventService
{
    protected $accessToken;
    protected $pixelId;

    public function __construct()
    {
        $this->accessToken = env('FB_ACCESS_TOKEN');
        $this->pixelId = env('FB_PIXEL_ID');
    }

    public function sendEvent($eventName, $userData, $customData, $eventSourceUrl, $eventId = null)
    {
        $event = [
            'event_name' => $eventName,
            'event_time' => time(),
            'user_data' => [
                'em' => hash('sha256', strtolower($userData['email'])),
                'ph' => hash('sha256', $userData['phone']),
                'client_ip_address' => request()->ip(),
                'client_user_agent' => request()->userAgent(),
            ],
            'custom_data' => $customData,
            'event_source_url' => $eventSourceUrl,
            'action_source' => 'website',
        ];

        if ($eventId) {
            $event['event_id'] = $eventId;
        }

        $response = Http::post("https://graph.facebook.com/v18.0/{$this->pixelId}/events", [
            'data' => [$event],
            'access_token' => $this->accessToken,
            'test_event_code' => 'TEST29913',
        ])->json();

        // dd($response);

        return $response;
    }
}
