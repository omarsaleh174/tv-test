<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ§Øª</title>
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
          /*background: red;*/
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
        Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ§Øª
      </div>
      <div>
     
        @foreach ($tenders as $tender)
        <table style="width: 100%">
          <tr>
            <th>Ù†Ø´Ø§Ø· Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ©</th>
            <td>{{ $tender->categories->pluck('title')->join(', ') ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ù…ÙˆØ¶ÙˆØ¹ Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ©</th>
            <td>{{ $tender->title ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ù†ÙˆØ¹ Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ©</th>
            <td>{{ $tender->typeData->title ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ø§Ù„Ø¨Ù„Ø¯</th>
            <td>{{ $tender->country->title ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ø§Ù„Ù…Ø¯ÙŠÙ†Ø©</th>
            <td>{{ $tender->city->title ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ù…ÙƒØ§Ù† Ø§Ù„ØªÙ‚Ø¯ÙŠÙ…</th>
            <td>{{ $tender->submission_place ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ø±Ù‚Ù… Ø§Ù„ØªÙˆØ§ØµÙ„</th>
            <td>{{ $tender->phone ?? 'ØºÙŠØ± Ù…ØªÙˆÙØ±' }}</td>
          </tr>
          <tr>
            <th>Ø±Ù‚Ù… Ø§Ù„Ù‡Ø§ØªÙ Ø§Ù„Ø¯Ø§Ø®Ù„ÙŠ</th>
            <td>{{ $tender->internal_phone ?? 'ØºÙŠØ± Ù…ØªÙˆÙØ±' }}</td>
          </tr>
          <tr>
            <th>Ù‚ÙŠÙ…Ø© ÙƒØ±Ø§Ø³Ø© Ø§Ù„Ø´Ø±ÙˆØ·</th>
            <td>{{ $tender->bid_docs_price ? $tender->bid_docs_price  : 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯Ø©' }}</td>
          </tr>
          <tr>
            <th>Ù…ÙƒØ§Ù† Ø¨ÙŠØ¹ ÙƒØ±Ø§Ø³Ø© Ø§Ù„Ø´Ø±ÙˆØ·</th>
            <td>{{ $tender->docs_sale_place ?? 'ØºÙŠØ± Ù…ØªÙˆÙØ±' }}</td>
          </tr>
          <tr>
            <th>'Ø§Ø®Ø± Ù…ÙˆØ¹Ø¯ / ØªÙ…Ø¯ÙŠØ¯ÙˆØªÙ‚Ø¯ÙŠÙ… Ø§Ù„ØºØ±Ø¶</th>
            <td>{{ arabicDate($tender->closing_date) ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ù…ÙˆØ¹Ø¯ / ØªÙ…Ø¯ÙŠØ¯ ÙØªØ­ Ø§Ù„ØºØ±Ø¶</th>
            <td>{{ arabicDate($tender->opening_date) ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>   Ø§Ø³Ù… Ø§Ù„Ø¬Ù‡Ø© Ø§Ù„Ù…Ø¹Ù„Ù†Ø©</th>
            <td>{{ $tender->publisher_name ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>     Ø±Ù‚Ù… Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ©</th>
            <td>{{ $tender->tender_code ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
          <tr>
            <th>Ø§Ù„Ù…ØµØ¯Ø±</th>
              <td>{{ $tender->reference ?? 'ØºÙŠØ± Ù…Ø­Ø¯Ø¯' }}</td>
          </tr>
        </table>
        <hr />
        @endforeach
      </div>
    </div>
  </body>
</html>

