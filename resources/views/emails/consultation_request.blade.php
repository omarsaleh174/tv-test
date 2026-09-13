<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ø·Ù„Ø¨ Ø§Ø³ØªØ´Ø§Ø±Ø© Ø¬Ø¯ÙŠØ¯Ø©</title>
    <style> body { font-family: 'Arial', sans-serif; direction: rtl; text-align: right; background-color: #f4f7fc; margin: 0; padding: 0; } .email-container { max-width: 650px; margin: 40px auto; background-color: #ffffff; padding: 35px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); } h2 { color: #ffffff; font-size: 26px; margin-bottom: 20px; text-align: center; padding: 15px; background-color: #4CAF50; border-radius: 8px; } .email-body { margin-top: 20px; font-size: 16px; line-height: 1.6; color: #333; } .email-body p { margin-bottom: 12px; } .email-body strong { color: #444; } .highlight { background-color: #f9f9f9; padding: 12px; border-radius: 8px; margin-top: 15px; margin-bottom: 15px; border: 1px solid #f1f1f1; } .footer { margin-top: 30px; text-align: center; font-size: 14px; color: #888888; } .footer a { color: #4CAF50; text-decoration: none; } .button { display: inline-block; background-color: #4CAF50; color: white; padding: 12px 25px; font-size: 18px; border-radius: 8px; text-decoration: none; margin-top: 20px; text-align: center; width: 100%; box-sizing: border-box; cursor: pointer; transition: background-color 0.3s; } .button:hover { background-color: #45a049; } .divider { border-top: 2px solid #f4f4f4; margin: 20px 0; }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <h2>Ø·Ù„Ø¨ Ø§Ø³ØªØ´Ø§Ø±Ø© Ø¬Ø¯ÙŠØ¯Ø©</h2>
        </div>
        <div class="email-body">
            <p>Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ…ØŒ</p>
            <p>Ù„Ù‚Ø¯ ØªÙ… ØªÙ‚Ø¯ÙŠÙ… Ø·Ù„Ø¨ Ø§Ø³ØªØ´Ø§Ø±Ø© Ø¬Ø¯ÙŠØ¯ Ù…Ù† Ù‚Ø¨Ù„ Ø§Ù„Ø¹Ù…ÙŠÙ„. ÙÙŠÙ…Ø§ ÙŠÙ„ÙŠ ØªÙØ§ØµÙŠÙ„ Ø§Ù„Ø·Ù„Ø¨:</p>
            <div class="highlight">
                <p><strong>Ø¹Ù†ÙˆØ§Ù† Ø§Ù„Ø§Ø³ØªØ´Ø§Ø±Ø©:</strong> {{ $data->title }}</p> <!-- Ø¥Ø¶Ø§ÙØ© Ø¹Ù†ÙˆØ§Ù† Ø§Ù„Ø§Ø³ØªØ´Ø§Ø±Ø© -->
                <p><strong>Ø§Ø³Ù… Ø§Ù„Ø¹Ù…ÙŠÙ„:</strong> {{ $data->client->name }}</p>
                <p><strong>Ø±Ù‚Ù… Ø§Ù„Ù‡Ø§ØªÙ:</strong> {{ $data->client->phone }}</p>
                <p><strong>Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠ:</strong> <a href="mailto:{{ $data->client->email }}" style="color: #4CAF50; text-decoration: none;">{{ $data->client->email }}</a></p>
            </div>
            <div class="divider"></div>
            <p><strong>Ø§Ù„Ø±Ø³Ø§Ù„Ø©:</strong></p>
            <p>{{ $data->message }}</p>
            <div class="divider"></div>
            <p><strong>ÙˆÙ‚Øª Ø§Ù„Ø·Ù„Ø¨:</strong> {{ $data->created_at->format('Y-m-d H:i:s') }}</p>
            <a class="button" href="mailto:{{ $data->client->email }}">ÙŠÙ…ÙƒÙ†Ùƒ Ø§Ù„Ø±Ø¯ Ø¹Ù„ÙŠ Ø§Ù„Ø¹Ù…ÙŠÙ„</a>
        </div>
        <div class="footer">
            <p>Ø¥Ø°Ø§ ÙƒÙ†Øª Ø¨Ø­Ø§Ø¬Ø© Ø¥Ù„Ù‰ Ø§Ù„Ù…Ø²ÙŠØ¯ Ù…Ù† Ø§Ù„ØªÙØ§ØµÙŠÙ„ØŒ ÙŠØ±Ø¬Ù‰ Ø§Ù„ØªÙˆØ§ØµÙ„ Ù…Ø¹Ù†Ø§ Ø¹Ø¨Ø± <a href="mailto:{{getSeoValue("footer_email")}}">Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠ</a>.</p>
        </div>
    </div>
</body>
</html>
