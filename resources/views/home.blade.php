@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>{{ucfirst(trans('general.please scan the QR code to ring the doorbell'))}}</h3>
                @if (!isset($message))
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F{{env('QR_URL')}}%2fring%2F&choe=UTF-8" title="Link to Google.com" />
                @else
                    <h5>{{ $message }}</h5>
                @endif
            </div>
        </div>
    </div>
@endsection