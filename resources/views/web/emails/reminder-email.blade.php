<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
</head>

<body>
    <div style="width: 100%;background-color: #baeaea;">
        <!-- Header -->
        <div class="header" style="padding: 20px;text-align: center;">
            <a href="{{ config('app.url') }}"
                style="display: inline-block; color: #000000e0; text-decoration: none; font-weight: bold;">
                <img src="https://homedesigns.ai/web/images/NewHomeDesignsAILogo.png" alt="homedesignsai logo" style="width: 30%;" />
            </a>
        </div>

        <!-- Email Body -->
        <div class="body" style="background-color: #fff; padding: 20px; max-width: 600px; margin: 0 auto;">
            <!-- Body content -->
            <p style="margin: 0; padding: 0;">Dear <b>{{$subscriber_name}}</b>,</p>
            <div class="inner-body" style="margin-top: 20px; text-align: left;">
                <!-- Your email content goes here -->
                <p>I hope you're doing well! I wanted to let you know that Trustpilot will reach out today or tomorrow with an invitation to leave a verified review for HomeDesigns AI. We’d really appreciate it if you could take just 2 minutes to share your thoughts.</p> <br>
                <p>Honestly, Trustpilot’s AI has been removing many organic reviews, which hurts our rating. I personally find Verified reviews are the best way to keep your feedback visible. Your help would mean a lot to us!</p>
                <br>
                <p>As a thank you, we’re giving you <b>a free month of access and lifetime access to our BETA program.</b> Just let me know once you’ve left your review, and I’ll set it up for you.</p>
                <br>
                <p>Thanks for being awesome!</p>
                <br>
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
            <a href="http://homedesigns.ai" >http://homedesigns.ai</a>
        </div>
    </div>
</body>

</html>
