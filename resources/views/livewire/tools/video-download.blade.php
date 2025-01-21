<div>
    <form wire:submit.prevent="downloadVideo">
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <input type="url" class="form-control" placeholder="Enter your video URL here..."
                        wire:model="videoUrl" aria-label="Video URL" required />
                  
                    <button 
                        class="btn btn-info btn-sm input-group-text text-white"
                        type="submit"
                        wire:loading.attr="disabled"  
                        wire:target="downloadVideo">  <!-- Specify the method being loaded -->
                        <!-- Show spinner while loading -->
                        <span wire:loading.remove>Download</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>

    @if (session('video_url'))
        <a href="{{ session('video_url') }}" target="_blank">Click here to download the video</a>
    @endif

    @if ($isLoading)
        <div class="text-center mt-3">
            <!-- Bootstrap spinner -->
            <div class="spinner-border text-info" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
