@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                </div>
                @foreach ($announcements as $announcement)
                <div class="card">
                    <div >
                        {{$announcement->name}}
                    </div>
                    <div>
                        {{$announcement->desc}}
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>
@endsection
