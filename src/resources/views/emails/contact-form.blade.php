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
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: bold;
            color: #6366f1;
            margin-bottom: 5px;
        }
        .field-value {
            padding: 10px;
            background-color: #f5f5f5;
            border-left: 3px solid #6366f1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>New Contact Form Submission</h2>
    </div>
    <div class="content">
        <p>You have received a new message from your website contact form:</p>

        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $data['name'] }}</div>
        </div>

        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">{{ $data['email'] }}</div>
        </div>

        @if(!empty($data['phone']))
            <div class="field">
                <div class="field-label">Phone:</div>
                <div class="field-value">{{ $data['phone'] }}</div>
            </div>
        @endif

        <div class="field">
            <div class="field-label">Subject:</div>
            <div class="field-value">{{ $data['subject'] }}</div>
        </div>

        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ $data['message'] }}</div>
        </div>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">

        <p style="color: #666; font-size: 14px;">
            This email was sent from the Innovation Place BD contact form.
        </p>
    </div>
</div>
</body>
</html>
