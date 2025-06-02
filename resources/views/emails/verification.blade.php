<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Community!</h1>
        <p>Hi there,</p>
        <p>Thank you for registering. Please confirm your email address by clicking the button below. This helps us keep your account secure and provide better service.</p>
        <a href="{{ $url }}" class="btn">Verify Email</a>
        <p>If the button doesn't work, copy and paste the following link into your browser:</p>
        <p><a href="{{ $url }}">{{ $url }}</a></p>
        <div class="footer">
            &copy; {{ date('Y') }} Cacao Care. All rights reserved.
        </div>
    </div>
</body>
</html>
