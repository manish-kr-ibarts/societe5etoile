<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FAF6F0; padding: 20px; color: #333; }
        .container { background-color: #ffffff; padding: 40px; border-radius: 12px; max-width: 600px; margin: 0 auto; box-shadow: 0 10px 25px -5px rgba(176, 132, 83, 0.1); text-align: center; }
        .logo { max-width: 120px; margin-bottom: 30px; }
        h2 { color: #1e293b; font-size: 24px; font-weight: 800; margin-bottom: 20px; }
        p { color: #64748b; line-height: 1.6; font-size: 16px; margin-bottom: 15px; }
        .btn-wrapper { margin: 35px 0; }
        .btn { display: inline-block; padding: 14px 28px; background-color: #B08453; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px; transition: background-color 0.3s; }
        .btn:hover { background-color: #996C3E; }
        .footer { margin-top: 40px; font-size: 14px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('storage/logo/logo.jfif') }}" alt="{{ config('app.name') }} Logo" class="logo">
        
        <h2>Reset Your Password</h2>
        
        <p style="text-align: left;">Hello {{ $user->name ?? 'User' }},</p>
        <p style="text-align: left;">We received a request to reset the password for your account. Click the button below to choose a new password.</p>
        
        <div class="btn-wrapper">
            <a href="{{ $url }}" class="btn">Reset Password</a>
        </div>
        
        <p style="text-align: left;">If you did not request a password reset, no further action is required.</p>
        
        <div class="footer">
            <p>Thanks,<br>{{ config('app.name') }} Team</p>
        </div>
    </div>
</body>
</html>
