@extends('layouts.master')
@section('title')
Translation
@endsection
@section('contents')
<div class="row p-3">
    <div class="d-flex justify-content-center">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    English To Hindi 
                </div>
                <div class="card-body">
                   @livewire('tools.translation')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection