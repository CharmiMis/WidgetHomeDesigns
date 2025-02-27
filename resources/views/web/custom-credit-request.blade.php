<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'HomeDesignsAI')</title>
    <link rel="shortcut icon" href="{{ asset('web/images/favicon.ico') }}" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.css') }}?v={{ config('app.style_css_version') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/animate.css') }}">

    <link rel="preconnect" href="https://stijndv.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/Eudoxus-Sans.css') }}">
    {{-- <link rel="stylesheet" href="https://stijndv.com/fonts/Eudoxus-Sans.css"> --}}

    <link rel="preconnect" type="text/css" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('web/css/main-style.css')}}?v={{ config('app.main_style_css_version') }}" rel="stylesheet" >
    <link href="{{ asset('web/css/responsive.css')}}" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/googleapisFonts.css')}}">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kalam&family=Karla&display=swap" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .brandpush-logo-container-item {
            height: 100px;
            position: relative;
        }

        .brandpush-vertical-center {
            margin: 0;
            position: relative;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            text-align: center;
        }

        .brandpush-vertical-center img.brandpush-news-logo {
            width: 100%;
            max-width: 100px;
            height: auto;
            margin: 7px 10px;
        }

        @media screen and (min-width: 585px) {
            .brandpush-leaf {
                opacity: 0.2 !important;
            }

            .brandpush-logo-container {
                padding: 0 20px;
            }
        }

        @media screen and (max-width: 584px) {
            .brandpush-news-logo {
                max-width: 70px !important;
            }

            .brandpush-title {
                font-size: 15px;
                top: -5px;
                letter-spacing: 6px;
            }
        }

        @media screen and (max-width: 340px) {
            .brandpush-title-hr {
                display: none;
                !important;
            }

            .brandpush-title {
                font-size: 14px;
                padding: 0 !important;
            }

            .brandpush-footer {
                font-size: 11px !important;
                margin: 20px 0 25px 0 !important;
                letter-spacing: 2px !important;
            }

            .brandpush-news-logo {
                max-width: 50px !important;
            }
        }

        #brandpush-trust-badge {
            box-shadow: 0 18px 50px rgb(0 0 0 / 7%);
            -webkit-transition: box-shadow 0.3s;
        }

        .text_switch_yearly {
            font-size: 13px;
            color: #0d6efd;
            font-weight: 600;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #7558ea;
            border-color: #7558ea;
        }
        .btn-primary:focus {
            color: #fff;
            background-color: #7558ea;
            border-color: #7558ea;
        }
        .pricing-inner {
            padding: 49px 0px 107px !important;
        }
    </style>

</head>
<body>
    <?php
    $isloggedIn = auth()->check();
    ?>

    <!-- pricing cards section -->
    <section id="buy">
        <div class="pricing-outer">
            <div class="container">
                <div class="pricing-inner">
                    <div class="text-center">
                        {{-- <span class="cmn-small-title">Special Discount Expiring Soon</span> --}}
                        <h4 class="cmn-title">API Custom Credit Request</h4><br>
                    </div>
                    <div class="prv-cardmain">
                        <div class="row">
                            <div class="col-md-12 right_api_form">
                                <form class="api_form row" autocomplete="off">
                                    @csrf
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="fullName">Full Name: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full Name" name="fullName">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="email">Email Address: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="email" placeholder="Enter your registered email address" name="email">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="customCredit">Custom Requested Credits: <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" id="customCredit" placeholder="Enter your company name" name="customCredit">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="description">Description: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="description" placeholder="Describe your suggestions or custom token related request message" name="description">
                                    </div>
                                    <button type="submit" class="btn btn-primary api-credit-send-button">Send Request!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing cards section -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"> </script>
<script src="{{ asset('web/js/owl.carousel.js') }}"></script>


<script>
    $(document).ready(function() {
        $(".api_form").validate({
            rules: {
                fullName: "required",
                email: {
                    required: true,
                    email: true
                },
                customCredit: "required",
                description: "required",
            },
            messages: {
                fullName: "Please enter your full name",
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                customCredit: "Please enter custom requested credits",
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function (form) {
                var formData = $(form).serialize();
                $.ajax({
                    type: 'POST',
                    url: "{{route('api.custom-credit-email')}}",
                    data: formData,
                    beforeSend: function() {
                    // setting a timeout
                    $(".api-credit-send-button").html("<i class='fa fa-spinner fa-spin m-0'></i> Sending...");
                    },
                    success: function (response) {
                        $(".api-credit-send-button").html("Your request has been received!");
                        alert(response.message);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        });
    });
</script>
</body>
</html>
