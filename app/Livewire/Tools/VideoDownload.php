<?php

namespace App\Livewire\Tools;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;



class VideoDownload extends Component
{
    public $videoUrl;
    public $isLoading = false;
    public function render()
    {
        return view('livewire.tools.video-download');
    }

    public function downloadVideo()
    {
        // Validate the video URL input
        if (empty($this->videoUrl)) {
            session()->flash('error', 'Please provide a valid video URL.');
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
            session()->flash('error', 'Failed to download the video.');
            return;
        }

        $logOutput = implode("\n", $output);
        // session()->flash('message', 'Video download logs: ' . $logOutput);
        session()->flash('message', "Success, Please Click The Link To Download");


        // After the video is downloaded, return the storage link
        $storageFilePath = 'storage/videos/' . basename($output[count($output) - 1]);
        $downloadLink = url($storageFilePath);
        
        session()->flash('video_url', $downloadLink);  // Share the download link in session for use in the view
        $this->resetUrl();
    }

    public function resetUrl(){
        $this->videoUrl='';

    }
}
