<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Widget</title>
    <!-- Other head elements -->
    
</head>

<body>
    <div>
        <div class="competitive-inner-left">
            <div class="video-inner">
                Test content here ...
            </div>
        </div>

        <script src="http://127.0.0.1:8000/embed.js?id=230" async></script>
    </div>
</body>

{{-- <script src="{{ asset('webWidget/js/jquery.min.js') }}"></script> --}}
</html>
