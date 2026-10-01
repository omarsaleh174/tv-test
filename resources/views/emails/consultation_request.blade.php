<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>طلب استشارة جديدة</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            direction: rtl;
            text-align: right;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 650px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ffffff;
            font-size: 26px;
            margin-bottom: 20px;
            text-align: center;
            padding: 15px;
            background-color: #4CAF50;
            border-radius: 8px;
        }

        .email-body {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .email-body p {
            margin-bottom: 12px;
        }

        .email-body strong {
            color: #444;
        }

        .highlight {
            background-color: #f9f9f9;
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid #f1f1f1;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #888888;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 20px;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }

        .divider {
            border-top: 2px solid #f4f4f4;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <div class="email-container">

        <div class="email-header">
            <h2>طلب استشارة جديدة</h2>
        </div>

        <div class="email-body">

            <p>السلام عليكم،</p>

            <p>
                لقد تم تقديم طلب استشارة جديد من قبل العميل.
                فيما يلي تفاصيل الطلب:
            </p>

            <div class="highlight">

                <p>
                    <strong>عنوان الاستشارة:</strong>
                    {{ $data->title }}
                </p>

                <p>
                    <strong>اسم العميل:</strong>
                    {{ $data->client->name }}
                </p>

                <p>
                    <strong>رقم الهاتف:</strong>
                    {{ $data->client->phone }}
                </p>

                <p>
                    <strong>البريد الإلكتروني:</strong>

                    <a
                        href="mailto:{{ $data->client->email }}"
                        style="color: #4CAF50; text-decoration: none;"
                    >
                        {{ $data->client->email }}
                    </a>
                </p>

            </div>

            <div class="divider"></div>

            <p>
                <strong>الرسالة:</strong>
            </p>

            <p>
                {{ $data->message }}
            </p>

            <div class="divider"></div>

            <p>
                <strong>وقت الطلب:</strong>
                {{ $data->created_at->format('Y-m-d H:i:s') }}
            </p>

            <a
                class="button"
                href="mailto:{{ $data->client->email }}"
            >
                يمكنك الرد على العميل
            </a>

        </div>

        <div class="footer">

            <p>
                إذا كنت بحاجة إلى المزيد من التفاصيل،
                يرجى التواصل معنا عبر

                <a href="mailto:{{ getSeoValue('footer_email') }}">
                    البريد الإلكتروني
                </a>.
            </p>

        </div>

    </div>

</body>

</html>