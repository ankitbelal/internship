<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #dddddd;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333333;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            margin: 0 0 10px;
            font-size: 16px;
            color: #666666;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #dddddd;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Email Notification</h1>
        </div>
        <div class="content">
            <p>Dear {{ $subject }},</p>
            <p>{{ $mailMessage }}</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} MYAPP. All rights reserved.</p>
        </div>
    </div>
</body>
</html>