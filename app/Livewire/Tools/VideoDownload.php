<?php

namespace App\Livewire\Tools;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class VideoDownload extends Component
{
    public $videoUrl;
    public $isLoading = false;
    public $downloadLink='';
    public function render()
    {
        return view('livewire.tools.video-download');
    }

    public function downloadVideo()
    {
       $this->resetValidation();
       $this->resetErrorBag();
       $this->downloadLink ='';
        // Validate the video URL input
        if (empty($this->videoUrl)) {
            throw ValidationException::withMessages(['video-url'=>'Please provide a valid video URL.']);
            return;
        }


        $videoUrl = $this->videoUrl;

        // Construct the shell command to call the Python script
        $command = base_path('run_video_download.sh') . " " . escapeshellarg($videoUrl);

        // Execute the command
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);


        if ($resultCode !== 0) {
            throw ValidationException::withMessages(['video-url'=>'Failed to download the video.']);
            return;
        }
       
    
        $logOutput = implode("\n", $output);

        // After the video is downloaded, return the storage link
        $storageFilePath = 'storage/videos/' . basename($output[count($output) - 1]);
        try {
            $this->validateVideoFile(url($storageFilePath));
        } catch (ValidationException $e) {
            // $this->resetUrl();
            throw ValidationException::withMessages(['video-url'=>$e->getMessage()]);
            return;

        
        }
        $this->downloadLink = url($storageFilePath);
        
        $this->resetUrl();
    }

    
    public function readVideoLogs(){
        $logFilePath = base_path('python-scripts/tools/app.log'); // Path to the log file

        if (File::exists($logFilePath)) {
            // Read the file contents into an array (each line as an element)
            $lines = File::lines($logFilePath);
    
            // Get the last 10 lines or all if less than 10
            $latestLogs = $lines->slice(-2)->toArray()[1]; // Adjust the number as needed
    
            return $latestLogs;
        }
    }


    public function resetUrl(){
        $this->videoUrl='';

    }



public function validateVideoFile($url)
{
    // Extract the file extension from the URL
    $extension = pathinfo($url, PATHINFO_EXTENSION);

    // Define a list of valid video file extensions
    $validExtensions = ['mp4', 'avi', 'mov', 'mkv', 'flv', 'webm'];

    // logger()->alert(in_array(strtolower($extension), $validExtensions));
    // Check if the extension is not in the valid list
    if (!in_array(strtolower($extension), $validExtensions)) {
        throw ValidationException::withMessages([
            'video-url' => "Invalid URL!",
        ]);
    }

    // If valid
}

// Example usage


}
