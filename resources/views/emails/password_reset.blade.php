<!-- resources/views/emails/password_reset.blade.php -->

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteTitle }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            direction: rtl;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>{{ $siteTitle }} - Ø·Ù„Ø¨ Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ† ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±</h2> <!-- Custom site title in Arabic -->
        </div>
        <p>Ù…Ø±Ø­Ø¨Ø§Ù‹ {{ $user->name }}ØŒ</p>
        <p>Ù„Ù‚Ø¯ ØªÙ„Ù‚ÙŠÙ†Ø§ Ø·Ù„Ø¨Ø§Ù‹ Ù„Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ† ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ± Ø§Ù„Ø®Ø§ØµØ© Ø¨Ùƒ. ÙŠÙ…ÙƒÙ†Ùƒ Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ†Ù‡Ø§ Ù…Ù† Ø®Ù„Ø§Ù„ Ø§Ù„Ø¶ØºØ· Ø¹Ù„Ù‰ Ø§Ù„Ø²Ø± Ø£Ø¯Ù†Ø§Ù‡:</p>
        <p style="text-align: center;">
            <a href="{{ $resetUrl }}" class="button">Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ† ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±</a>
        </p>
        <p>Ø¥Ø°Ø§ Ù„Ù… ØªÙƒÙ† Ù‚Ø¯ Ø·Ù„Ø¨Øª Ø¥Ø¹Ø§Ø¯Ø© ØªØ¹ÙŠÙŠÙ† ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±ØŒ ÙŠØ±Ø¬Ù‰ ØªØ¬Ø§Ù‡Ù„ Ù‡Ø°Ø§ Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠ Ø£Ùˆ Ø§Ù„Ø§ØªØµØ§Ù„ Ø¨Ø§Ù„Ø¯Ø¹Ù….</p>
        <div class="footer">
            <p>Ø£Ø·ÙŠØ¨ Ø§Ù„ØªØ­ÙŠØ§ØªØŒ</p>
            <p>{{ $siteTitle }}</p> <!-- Custom site name in Arabic -->
        </div>
    </div>
</body>
</html>

