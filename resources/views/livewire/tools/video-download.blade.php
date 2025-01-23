<div>
    <form wire:submit.prevent="downloadVideo">
        <div class="row mb-3">
            <div class="col-12">
                <div class="input-group">
                    <input type="url" class="form-control" placeholder="Enter your video URL here..."
                        wire:model="videoUrl" aria-label="Video URL" required />

                    <button class="btn btn-light btn-sm input-group-text" type="submit" wire:loading.attr="disabled"
                        wire:target="downloadVideo"> <!-- Specify the method being loaded -->
                        <!-- Show spinner while loading -->
                        <span wire:loading.remove>Download</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>

 @include('livewire.tools.video-download-partions.video-container')
  
    
</div>
