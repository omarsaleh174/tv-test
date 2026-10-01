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
        <h2>{{ $siteTitle }} - طلب إعادة تعيين كلمة المرور</h2>
    </div>

    <p>مرحباً {{ $user->name }}،</p>

    <p>
        لقد تلقينا طلباً لإعادة تعيين كلمة المرور الخاصة بك.
        يمكنك إعادة تعيينها من خلال الضغط على الزر أدناه:
    </p>

    <p style="text-align: center;">
        <a href="{{ $resetUrl }}" class="button">
            إعادة تعيين كلمة المرور
        </a>
    </p>

    <p>
        إذا لم تكن قد طلبت إعادة تعيين كلمة المرور،
        يرجى تجاهل هذا البريد الإلكتروني أو الاتصال بالدعم.
    </p>

    <div class="footer">
        <p>أطيب التحيات،</p>
        <p>{{ $siteTitle }}</p>
    </div>
    </div>
</body>
</html>

