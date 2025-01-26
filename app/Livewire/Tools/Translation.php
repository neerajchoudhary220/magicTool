<?php

namespace App\Livewire\Tools;

use GuzzleHttp\Client;
use Livewire\Component;

class Translation extends Component
{
    public $words;
    public $translated_words;

  
    public function render()
    {
        return view('livewire.tools.translation');
    }


    public function translate(){
        $this->translation();
    }

    public function translation()
    {
        $client = new Client();
    
        try {
            $url = config('constants.translation_api_url') . $this->words;
            $headers = [
                'Accept' => 'application/json'
            ];
    
            $response = $client->request('GET', $url, [
                'headers' => $headers,
            ]);
    
            // Decode the JSON response
            $data = json_decode($response->getBody(), true);
    
            // Extract the value of the 'data' key
            $translatedText = $data['data'] ?? null;
            $this->translated_words = $translatedText;
            // Return the value or handle it as needed
            // return response()->json([
            //     'translated_text' => $translatedText,
            // ]);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
}

