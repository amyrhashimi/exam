@php
    $lang = \App\Models\Language::where('language', app()->getLocale() )->first();
@endphp
<!DOCTYPE html>
<html lang="{{ $lang->language }}" dir="{{ $lang->dir }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam @yield('title')</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    @if ($lang->dir == 'rtl')
        <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <style>
        @media only screen and (max-width: 992px) {
            #main .col-lg-6{
                border-left: unset !important;
                border-right: unset !important;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        @include('livewire.section.navbar')
    </div>

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/assets/media/illustrations/sketchy-1/14.png">
            @yield('content')
        </div>
    </div>


    <script>var hostUrl = "/assets/";</script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>

    @yield('script')

    @if($errors->any())
        <script type="text/javascript">
            $(document).ready(function(){
                $('#kt_modal_add_user').modal('show');
            });
        </script>
    @endif
</body>
</html>
