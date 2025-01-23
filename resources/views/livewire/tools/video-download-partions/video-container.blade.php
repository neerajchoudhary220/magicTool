<div wire:loading.remove>
    @if (!empty($downloadLink))
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <video width="600" height="340" controls>
                            <source src="{{ $downloadLink }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>


                    </div>
                </div>
            </div>

        </div>
    @endif


    @if (!empty($downloadLink))
        <div class="alert alert-success mt-3">
            <a href="{{ $downloadLink }}" target="_blank">Click here to download the video</a>
        </div>
    @endif

    @error('video-url')
        <div class="alert alert-danger mt-3">
            {{ $message }}
        </div>
    @enderror
</div>
