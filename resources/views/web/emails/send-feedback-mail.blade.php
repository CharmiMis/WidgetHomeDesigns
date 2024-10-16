<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        .btn-primary {
            background: #7558ea;
            border-color: #7558ea;
            font-size: 15px;
            cursor: pointer;
            padding: 11px;
            text-align: center;
            display: inline-block;
            color: #ffffffe0;
            text-decoration: none;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div style="width: 100%;background-color: #baeaea;">
        <!-- Header -->
        <div class="header" style="padding: 20px;text-align: center;">
            <a href="{{ config('app.url') }}"
                style="display: inline-block; color: #000000e0; text-decoration: none; font-weight: bold;">
                {{ config('app.name') }}
            </a>
        </div>

        <!-- Email Body -->
        <div class="body" style="background-color: #fff; padding: 20px; max-width: 600px; margin: 0 auto;">
            <!-- Body content -->
            <p style="margin: 0; padding: 0;">Hello {{$emailData['user_name']}},</p>
            <div class="inner-body" style="margin-top: 20px; text-align: left;">
                <!-- Your email content goes here -->
                <p>Sofia here, Customer Success Manager at HomeDesigns AI. I noticed you've just reached the awesome milestone of 100 designs within our platform and I wanted to touch base!</p>
                <p>I wanted to check in and see if there's anything I can help with to make the most of your design journey. If you have questions about features, got stuck with some of our modules, need design assistance, or have feedback to share, just hit reply to this email and I’ll do my best to assist!</p>
                <p>If I happen to be off-duty, one of my amazing colleagues from the Customer Success team will gladly step in to assist.</p>
                <p>Looking forward to your reply.</p>
            </div>
            <p style="margin: 0; padding: 0; margin-top: 20px;">Best,</p>
            <div style="display:flex; gap: 5px;">
                <img src="https://homedesigns.ai/web/images/sofia_profile.png" alt="homedesignsai logo" style="width: 15%;border-radius: 50%"/>
                <div style="margin-left: 18px;margin-top: 4px">
                    <p style="margin: 0;">Sofia Thill</p>
                    <p style="margin: 0;">Customer Success Manager</p>
                    <p style="margin: 0;"><a href="https://homedesigns.ai/">homedesigns.ai</a></p>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <div class="footer" style="padding: 20px;">
            <p style="margin: 0; padding: 0; text-align: center; color: #333333bf;">© {{ date('Y') }}
                {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
