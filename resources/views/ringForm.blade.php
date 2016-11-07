@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('ringDoorbell')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row padding-top-10">
                    <div class="form-group">
                        <label for="name" class="col-md-3">{{ucfirst(trans('general.your name'))}}</label>

                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" placeholder="Jan Janssen">
                        </div>
                    </div>
                </div>

                <div class="row padding-top-10">
                    <div class="form-group">
                        <label for="name" class="col-md-3">{{ucfirst(trans('general.take picture'))}}</label>

                        <div class="col-md-9">
                            <input type="file" name="picture" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row padding-top-20">
                    <div class="col-md-4 pull-right">
                        <button type="submit" class="btn btn-success pull-right">{{ucfirst(trans('general.send'))}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection