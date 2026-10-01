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
                        @foreach($latest as $article_latest)
                            <a href="{{ route('client.one_article', $article_latest->slug_ar??$article_latest->id) }}" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">{{ $article_latest->title }}</h5>
                                <p class="mb-1">{{ Str::limit($article_latest->sub, 100) }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="filter-section mb-5">
                    <form method="GET" action="{{ route('client.all_articles') }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="consultant" class="form-label">{{ trans('cruds.consultant') }}</label>
                                <select name="consultant_id" id="consultant" class="form-select">
                                    <option value="">{{ trans('cruds.consultant') }}</option>
                                    @foreach($consultants as $consultant)
                                        <option value="{{ $consultant->id }}" {{ request()->consultant_id == $consultant->id ? 'selected' : '' }}>
                                            {{ $consultant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="classification" class="form-label">{{ trans('cruds.classification') }}</label>
                                <select name="classification_id" id="classification" class="form-select">
                                    <option value="">{{ trans('cruds.classification') }}</option>
                                    @foreach($classifications as $classification)
                                        <option value="{{ $classification->id }}" {{ request()->classification_id == $classification->id ? 'selected' : '' }}>
                                            {{ $classification->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-gradient">{{ trans('cruds.filter') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           <div class="col-md-9">
                <div class="row gy-4">
                    @foreach($articles as $article)
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm rounded-lg">
                                <img src="{{$article->photo}}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">{{ $article->title }}</h5>
                                    <p class="card-text">{{ Str::limit($article->sub, 100) }}</p>
                                    @if($article->consultant)
                                        <p> {{ $article->consultant->name }}</p>
                                    @endif
                                    @if($article->classification)
                                        <p> {{ $article->classification->title }}</p>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('client.one_article', $article->slug_ar??$article->id) }}" class="btn btn-outline-primary w-100">{{ trans('cruds.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination mt-4">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

