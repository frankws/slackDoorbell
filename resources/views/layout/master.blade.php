@include('layout.header')

<div class="container">
    <div class="row padding-top-10">
        <div class="col-md-8">
            &nbsp;
        </div>
        <div class="col-md-4">
            <a href="{{ route('setLocale', 'en') }}" class="pull-right">
                <img src="/img/locales/en.png" width="38px" alt="">
            </a>

            <a href="{{ route('setLocale', 'nl') }}" class="pull-right">
                <img src="/img/locales/nl.png" width="30px" style="margin-right:5px;" alt="">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center padding-top-20">
            <a href="/"><img class="logo" src="/img/logo.png" alt="" width="200px"></a>
        </div>
    </div>

    @yield('content')
</div>

@include('layout.footer')