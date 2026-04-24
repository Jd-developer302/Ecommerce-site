<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class TawseelStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:tawseel-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tawseel Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://uae.winscart.com/update_tawseel_status';

        // Use Laravel's HTTP client to send a GET request
        $response = Http::get($url);

        // Log the response status and body (optional)
        if ($response->successful()) {
            \Log::info('Command executed successfully!', ['response' => $response->body()]);
        } else {
            \Log::error('Command failed!', ['status' => $response->status(), 'response' => $response->body()]);
        }
    }
}
