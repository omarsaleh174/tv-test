@extends('layouts.master')

@section('content')

    <h1>أكثر الصفحات زيارة في آخر 7 أيام</h1>

    <ul>
        @foreach($pages as $page)
            <li>
                <strong>{{ $page['page'] }}</strong>
                -
                {{ $page['views'] }} زيارة
            </li>
        @endforeach
    </ul>

@endsection