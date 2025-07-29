<!DOCTYPE html>
<html>
<head>
    <title>Client Account Verification</title>
</head>
<body>
    <h2>Hello {{ $client->name }},</h2>
    <p>Thank you for registering. Please click the link below to verify and activate your client account:</p>
   <a href="{{ $verificationLink }}" 
               style="display: inline-block; padding: 12px 25px; background-color: #4CAF50; color: #fff; text-decoration: none; border-radius: 5px; font-size: 16px;">
               Activate My Account
            </a>
    <p>If the link doesn't work, copy and paste this URL into your browser:</p>
    <p>{{ $verificationLink }}</p>
    <br>
    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
