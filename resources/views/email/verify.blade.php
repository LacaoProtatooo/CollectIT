<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h1>Email Verification</h1>
    <p>Hello {{ $user->username }},</p>
    <p>Please click the following link to verify your email:</p>
    <a href="http://127.0.0.1:8000/account/verify/{{ $user->email }}">Verify Email</a>
    <p>If you did not create an account, no further action is required.</p>
</body>
</html>