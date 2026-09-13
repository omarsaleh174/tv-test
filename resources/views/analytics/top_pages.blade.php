@extends('layouts.master')
@section('content')
    <h1>Ø£ÙƒØ«Ø± Ø§Ù„ØµÙØ­Ø§Øª Ø²ÙŠØ§Ø±Ø© ÙÙŠ Ø¢Ø®Ø± 7 Ø£ÙŠØ§Ù…</h1>
    <ul>
        @foreach($pages as $page)
            <li>
                <strong>{{ $page['page'] }}</strong> - {{ $page['views'] }} Ø²ÙŠØ§Ø±Ø©
            </li>
        @endforeach
    </ul>
@endsection

