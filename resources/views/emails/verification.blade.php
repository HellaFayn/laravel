<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
    <meta charset="UTF-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 120px;
        }

        h1 {
            font-size: 24px;
            color: #111827;
            margin-bottom: 16px;
            text-align: center;
        }

        p {
            font-size: 16px;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            display: block;
            width: fit-content;
            margin: 0 auto;
            background-color: #10b981;
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
        }

        .alt-link {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }

        .alt-link a {
            color: #3b82f6;
            word-break: break-all;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo">
            <!-- Replace with your logo -->
            <img src="{{ asset('images/cacao_care_logo1.jpg')}}" alt="CacaoCare Logo">
        </div>
        <h1>Verify your email</h1>
        <p>Welcome to CacaoCare! Click the button below to confirm your email address and activate your account.</p>
        <button href="{{ $url }}" class="btn">Verify Email</button>

        <div class="alt-link">
            If the button above doesn't work, copy and paste this link into your browser:
            <br>
            <a href="{{ $url }}">{{ $url }}</a>
        </div>

        <div class="footer">
            © {{ date('Y') }} CacaoCare. All rights reserved.
        </div>
    </div>
</body>
</html>
