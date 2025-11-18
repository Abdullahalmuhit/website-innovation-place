<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #6366f1;
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .message-box {
            background-color: #f0f4ff;
            border-left: 4px solid #6366f1;
            padding: 15px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Thank You for Contacting Us!</h2>
    </div>
    <div class="content">
        <p>Dear {{ $data['name'] }},</p>

        <p>Thank you for reaching out to Innovation Place BD. We have received your message and our team will review it shortly.</p>

        <div class="message-box">
            <strong>Your Message Details:</strong><br>
            <strong>Subject:</strong> {{ $data['subject'] }}<br>
            <strong>Message:</strong> {{ $data['message'] }}
        </div>

        <p>We typically respond within 24-48 business hours. If your inquiry is urgent, please feel free to call us at <strong>+88 01731146077</strong>.</p>

        <p>In the meantime, feel free to explore our products and services on our website.</p>

        <div class="footer">
            <p><strong>Innovation Place BD</strong></p>
            <p>
                House: B/ 151, Road No: 22<br>
                Mohakhali DOHS, Dhaka- 1213, Bangladesh<br>
                Email: info@innovationplacebd.com<br>
                Phone: +88 01731146077
            </p>
        </div>
    </div>
</div>
</body>
</html>
