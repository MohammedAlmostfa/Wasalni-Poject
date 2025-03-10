<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address - Wasalni</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
            margin-bottom: 20px;
        }

        .code {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #007bff;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888888;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Heading -->
        <h1>Verify Your Email Address</h1>

        <!-- Greeting -->
        <p>Hello {{ $user['email'] }},</p>

        <!-- Verification Code -->
        <p>Your verification code is:</p>
        <div class="code">{{ $code }}</div>

        <!-- Instructions -->
        <p>Please use this code to verify your email address and complete your registration on <strong>Wasalni</strong>.
        </p>

        <!-- Footer -->
        <div class="footer">
            <p>If you did not create an account, no further action is required.</p>
            <p>&copy; 2023 Wasalni.</p>
        </div>
    </div>
</body>

</html>
