<div>
    <div class="row mb-3">
        <table class="table table-responsive table-bordered">
            <thead class="text-center table-light">
                <tr>
                    <th>English</th>
                    <th>Hindi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-50">
                        <textarea class="form-control" rows="6" wire:model="words" wire:keydown="translation" placeholder="Write Here..."></textarea>
                    </td>
                    <td class="w-50">
                        <div class="translation-output border p-2 overflow-auto" style="height: 156px; width: 100%;">
                           {{ $translated_words }}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12 text-end">
            <button class="btn btn-light" wire:click="translate">
            <span wire:loading.remove>Translate</span>
            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                aria-hidden="true"></span>
            </button>
        </div>
    </div>

</div>
