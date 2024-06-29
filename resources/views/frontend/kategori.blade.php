@extends('frontend.template')

@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>{{ $current_kategori['nama_kategori'] }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="block category-listing category-style2">
                        <h3 class="news-title"><span>{{ $current_kategori['nama_kategori'] }}</span></h3>

                        @foreach($berita_per_kategori as $berita)
                        <div class="post-block-wrapper post-list-view clearfix">
                            <div class="row">
                                <div class="col-md-5 col-sm-6">
                                    <div class="post-thumbnail thumb-float-style">
                                        <a href="/berita/{{ $berita['slug'] }}">
                                            <img class="img-fluid" src="/{{ $berita['gambar'] }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-6">
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <a href="/berita/{{ $berita['slug'] }}#comments">{{ $berita['parsed_created_at']}}</a>
                                            </span>

                                            <span class="post-author">
                                                <a href="author.html" class="text-dark">by Admin </a>
                                            </span>
                                        </div>
                                        <h2 class="post-title title-large ">
                                            <a href="/berita/{{ $berita['slug'] }}">{{ $berita['judul'] }}</a>
                                        </h2>


                                        <p>{{ $berita['deskripsi'] }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <nav>
                        {{$berita_per_kategori->render()}}
                    </nav>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h3 class="news-title">
                            <span>Stay in touch</span>
                        </h3>

                        <ul class="list-inline social-widget">
                            <li class="list-inline-item">
                                <a class="social-page youtube" href="#">
                                    <i class="fa fa-play"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page twitter" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page pinterest" href="#">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page linkedin" href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a class="social-page youtube" href="#">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <div class="widget">
                        <h3 class="news-title">
                            <span>Editor's Pick</span>
                        </h3>

                        <div class="post-overlay-wrapper">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="/{{ $berita_pilihan[0]['gambar'] }}" alt="post-thumbnail" />
                            </div>
                            <div class="post-content">
                                <a class="post-category white" href="{{ route('frontend.kategori', $berita_pilihan[0]['kategori']['slug']) }}">{{ $berita_pilihan[0]['kategori']['nama_kategori'] }}</a>
                                <h2 class="post-title">
                                    <a href="{{ route('frontend.berita', $berita_pilihan[0]['slug']) }}">{{ \Illuminate\Support\Str::limit($berita_pilihan[0]['judul'], 70, '...') }}</a>
                                </h2>
                                <div class="post-meta white">
                                    @if($berita_pilihan[0]['diff_hours'] > 1)
                                    <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>@if($berita_pilihan[0]['diff_hours']>=24) {{ $berita_pilihan[0]['parsed_created_at'] }} @else {{ $berita_pilihan[0]['diff_hours'] }} hours ago @endif</span>
                                    @else
                                    <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>{{ $berita_pilihan[0]['diff_hours'] }} hour ago</span>
                                    @endif
                                    <span> by </span>
                                    <span class="post-Admin">
                                        <a>Admin</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="post-list-block">
                            @for($i = 1; $i < $berita_pilihan_count; $i++)
                            <div class="post-block-wrapper post-float ">
                                <div class="post-thumbnail">
                                    <a href="{{ route('frontend.berita', $berita_pilihan[$i]['slug']) }}">
                                        <img class="img-fluid" src="/{{ $berita_pilihan[$i]['gambar'] }}" alt="post-thumbnail" />
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="{{ route('frontend.berita', $berita_pilihan[$i]['slug']) }}">{{ $berita_pilihan[$i]['judul'] }}</a>
                                    </h2>
                                    <div class="post-meta">
                                        @if($berita_pilihan[$i]['diff_hours'] > 1)
                                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>@if($berita_pilihan[$i]['diff_hours']>=24) {{ $berita_pilihan[$i]['parsed_created_at'] }} @else {{ $berita_pilihan[$i]['diff_hours'] }} hours ago @endif</span>
                                        @else
                                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>{{ $berita_pilihan[$i]['diff_hours'] }} hour ago</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
