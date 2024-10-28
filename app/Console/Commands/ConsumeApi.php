<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Data;
use Illuminate\Support\Facades\Http;

class ConsumeApi extends Command
{
    protected $signature = 'api:consume';
    protected $description = 'Consume API and save data to database';

    public function handle()
    {
        $response = Http::get('URL_API'); // Ganti dengan URL API yang sesuai
        $data = $response->json();

        foreach ($data as $item) {
            Data::updateOrCreate(
                ['id' => $item['id']], // Ganti dengan field unik
                [
                    'category' => $item['category'],
                    'content' => $item['content'],
                    'last_update' => now(),
                ]
            );
        }

        $this->info('Data has been consumed and stored.');
    }
}