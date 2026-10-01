<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>قائمة المناقصات</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
        }

        a {
            width: 50vw !important;
            margin-bottom: 80px !important;
        }

        @media screen and (max-width: 778px) {
            a {
                width: 42vw;
                height: 100px;
            }

            td {
                max-width: 80%;
                height: auto;
            }
        }
    </style>
</head>

<body dir="rtl">

    <div style="background-color: #ffffff; padding: 10px; border: 1px solid white">

        <div style="height: fit-content; background-color: #f68026; font-size: 25px; font-weight: bold; padding: 20px;">
            قائمة المناقصات
        </div>

        <div>

            @foreach ($tenders as $tender)

                <table style="width: 100%">

                    <tr>
                        <th>نشاط المناقصة</th>
                        <td>{{ $tender->categories->pluck('title')->join(', ') ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>موضوع المناقصة</th>
                        <td>{{ $tender->title ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>نوع المناقصة</th>
                        <td>{{ $tender->typeData->title ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>البلد</th>
                        <td>{{ $tender->country->title ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>المدينة</th>
                        <td>{{ $tender->city->title ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>مكان التقديم</th>
                        <td>{{ $tender->submission_place ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>رقم التواصل</th>
                        <td>{{ $tender->phone ?? 'غير متوفر' }}</td>
                    </tr>

                    <tr>
                        <th>رقم الهاتف الداخلي</th>
                        <td>{{ $tender->internal_phone ?? 'غير متوفر' }}</td>
                    </tr>

                    <tr>
                        <th>قيمة كراسة الشروط</th>
                        <td>{{ $tender->bid_docs_price ? $tender->bid_docs_price : 'غير محددة' }}</td>
                    </tr>

                    <tr>
                        <th>مكان بيع كراسة الشروط</th>
                        <td>{{ $tender->docs_sale_place ?? 'غير متوفر' }}</td>
                    </tr>

                    <tr>
                        <th>آخر موعد / تمديد تقديم العرض</th>
                        <td>{{ arabicDate($tender->closing_date) ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>موعد / تمديد فتح العرض</th>
                        <td>{{ arabicDate($tender->opening_date) ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>اسم الجهة المعلنة</th>
                        <td>{{ $tender->publisher_name ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>رقم المناقصة</th>
                        <td>{{ $tender->tender_code ?? 'غير محدد' }}</td>
                    </tr>

                    <tr>
                        <th>المصدر</th>
                        <td>{{ $tender->reference ?? 'غير محدد' }}</td>
                    </tr>

                </table>

                <hr />

            @endforeach

        </div>

    </div>

</body>
</html>