@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if (!isset($message))
                    <h3>{{ucfirst(trans('general.please scan the QR code to ring the doorbell'))}}</h3>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{env('QR_URL')}}&choe=UTF-8" title="Link to Doorbell" />
                @else
                    <h5>{{ $message }}</h5>
                @endif
            </div>
        </div>
    </div>
@endsection