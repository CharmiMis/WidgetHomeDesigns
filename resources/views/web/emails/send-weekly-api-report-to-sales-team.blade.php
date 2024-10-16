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
            <p style="margin: 0; padding: 0;">Dear <b>{{$salesmember_name}}</b>,</p>
            <div class="inner-body" style="margin-top: 20px; text-align: left;">
                <!-- Your email content goes here -->
                <p>Here's your weekly B2B API sales summary for the week of <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($startDate))->format('Y/m/d').' - '.\Carbon\Carbon::createFromTimeStamp(strtotime($endDate))->format('Y/m/d') }}</b></p> <br>
                <p>New Client Recap:</p>
                <table style="font-size: 0.8rem;">
                    <th>User ID</th>
                    <th>User Name</th>    
                    <th>User Email</th>    
                    <th>Purchased Plan</th>    
                    <th>API Generation Count</th>    
                    <th>Purchased Date</th> 
                    <tbody>
                        @if(!empty($created_users) && count($created_users['subscriptions']) > 0)
                            @foreach($created_users['subscriptions'] as $registered_user)
                            <tr>
                                <td>{{isset($registered_user['subscriptiondetailsfromDB']['user']) ? $registered_user['subscriptiondetailsfromDB']['user']['id'] : ''}}</td>
                                <td>{{isset($registered_user['subscriptiondetailsfromDB']['user']) ? $registered_user['subscriptiondetailsfromDB']['user']['name'] : ''}}</td>
                                <td>{{isset($registered_user['subscriptiondetailsfromDB']['user']) ? $registered_user['subscriptiondetailsfromDB']['user']['email'] : ''}}</td>
                                <td>{{isset($registered_user['product']) ? $registered_user['product']: "" }}</td>
                                <td>{{isset($registered_user['subscriptiondetailsfromDB']) ? $registered_user['subscriptiondetailsfromDB']['used_credit']: "" }}</td>
                                <td>{{isset($registered_user['subscriptiondetailsfromDB']) && (isset($registered_user['subscriptiondetailsfromDB']['created_at'])) ? \Carbon\Carbon::parse($registered_user['subscriptiondetailsfromDB']['created_at'])->format('Y-m-d H:i:s'): "" }}</td>

                            </tr>
                            @endforeach
                        @else

                        <tr><td colspan="5">No new records found.</td></tr>
                        @endif
                    </tbody>
                </table>

                <br><p>Cancelled (Churned) Clients Recap:</p>

                <table style="font-size: 0.8rem;">
                    <th>User ID</th>
                    <th>User Name</th>    
                    <th>User Email</th>    
                    <th>Purchased Plan</th>    
                    <th>API Generation Count</th>    

                    <tbody>
                        @if(!empty($canceled_users) && count($canceled_users['subscriptions']) > 0)
                            @foreach($canceled_users['subscriptions'] as $canceled_user)
                            <tr>
                                <td>{{isset($canceled_user['subscriptiondetailsfromDB']['user']) ? $canceled_user['subscriptiondetailsfromDB']['user']['id'] : ''}}</td>
                                <td>{{isset($canceled_user['subscriptiondetailsfromDB']['user']) ? $canceled_user['subscriptiondetailsfromDB']['user']['name'] : ''}}</td>
                                <td>{{isset($canceled_user['subscriptiondetailsfromDB']['user']) ? $canceled_user['subscriptiondetailsfromDB']['user']['email'] : ''}}</td>
                                <td>{{isset($canceled_user['product']) ? $canceled_user['product']: "" }}</td>
                                <td>{{isset($canceled_user['subscriptiondetailsfromDB']) ? $canceled_user['subscriptiondetailsfromDB']['used_credit']: "" }}</td>
                                <td>{{isset($canceled_user['subscriptiondetailsfromDB']) && (isset($canceled_user['subscriptiondetailsfromDB']['created_at'])) ? \Carbon\Carbon::parse($canceled_user['subscriptiondetailsfromDB']['created_at'])->format('Y-m-d H:i:s'): "" }}</td>

                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="5">No new records found.</td></tr>
                        @endif
                    </tbody>
                </table>
                <br>
                <p>Important Notes:</p>
                <ul>
                    <li>Please follow up with all new clients to facilitate a smooth onboarding process and ensure they're leveraging our API to its full potential.</li>
                    <li>Consider providing onboarding resources or scheduling introductory calls as needed.</li>
                    <li>Track their API usage and offer support as needed.</li>
                    <li>Reach out to every cancelled API subscriber to understand the reasons and look for ways to get them back a subscription.</li>
                </ul></br>

            </div>
            <p style="margin: 0; padding: 0; margin-top: 20px;">Best,</p>
            <p style="margin: 0; padding: 0; font-weight: bold;">{{ config('app.name') }} Admin Bot</p>
        </div>

        <!-- Footer -->
        <div class="footer" style="padding: 20px;">
            <p style="margin: 0; padding: 0; text-align: center; color: #333333bf;">© {{ date('Y') }}
                {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
