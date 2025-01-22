@extends('layouts.master')
@section('title')
Video Download
@endsection
@section('contents')
<div class="row p-3">
    <div class="d-flex justify-content-center">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    Download Video From URL
                </div>
                <div class="card-body">
                    @livewire('tools.video-download')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection