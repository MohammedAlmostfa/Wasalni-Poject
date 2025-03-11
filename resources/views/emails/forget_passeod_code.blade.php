<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Wasalni</title>
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
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 4px;
            color: #007bff;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888888;
        }

        .note {
            font-size: 14px;
            color: #777777;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Heading -->
        <h1>Password Reset Request</h1>

        <!-- Greeting -->
        <p>Hello,</p>

        <!-- Instructions -->
        <p>We received a request to reset your password for your <strong>Wasalni</strong> account. Please use the
            following verification code to proceed:</p>

        <!-- Verification Code -->
        <div class="code">{{ $code }}</div>

        <!-- Note -->
        <p class="note"><strong>Note:</strong> This code is valid for 1 hour only. If you did not request a password
            reset, please ignore this email.</p>

        <!-- Footer -->
        <div class="footer">
            <p>If you have any questions, feel free to contact our support team.</p>
            <p>&copy; 2023 Wasalni.</p>
        </div>
    </div>
</body>

</html>
