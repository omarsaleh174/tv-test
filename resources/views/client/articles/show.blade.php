@extends('client.layout.client')

@section('content')
<br><br><br><br>
<style>
        .btn-gradient {
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
            font-size: 1.1rem;
            border-radius: 50px;
            padding: 10px 25px;
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #00c6ff, #007bff);
            color: #fff;
        }

        .latest-articles {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .latest-articles .section-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #007bff;
        }

        .list-group-item {
            border: none;
            padding: 15px;
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        .card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-radius: 10px 10px 0 0;
            transition: transform 0.3s ease;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            padding: 10px;
            background-color: #f8f9fa;
        }

        .card-footer a {
            font-weight: bold;
        }

        .form-select {
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
        }

        .pagination {
            justify-content: center;
            margin-top: 30px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            border-radius: 50%;
            background-color: #f8f9fa;
            color: #007bff;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: white;
        }

</style>
<section id="articles" class="articles section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-md-3">
                <div class="latest-articles">
                    <h3 class="section-title">{{ trans('cruds.latest_articles') }}</h3>
                    <div class="list-group">
                        @foreach($posts as $article_latest)
                            <a href="{{ route('client.one_article', $article_latest->slug_ar ?? $article_latest->id) }}" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">{{ $article_latest->title }}</h5>
                                <p class="mb-1">{{ Str::limit($article_latest->sub, 100) }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="article-detail">
                    <h1>{{ $article->title }}</h1>
                    <img src="{{ $article->photo }}" alt="{{ $article->title }}" class="img-fluid rounded mb-4">
                    <p>{{ $article->sub_desc }}</p> 
                    {!! $article->desc !!}
                    
                    @if($article->consultant)
                        <p> {{ $article->consultant->name }}</p>
                    @endif

                    @if($article->classification)
                        <p> {{ $article->classification->title }}</p>
                    @endif

                    @if(!empty($article->tags_ar))
                        <p>
                        @foreach($article->tags_ar as $tag)
                            <span class="badge bg-primary">{{ $tag }}</span>
                        @endforeach
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

