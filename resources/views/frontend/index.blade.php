@extends('frontend.template')

@section('content')

@if($search_state == 'inactive')

<section class="featured-posts">
    <div class="container">
        <div class="row no-gutters">

        <!-- Big Headline -->
        @for ($i = 0; $i < 2; $i++)
            <div class="col-md-6 col-xs-12 col-lg-4">
                <div class="featured-slider mr-md-3 mr-lg-3">
                    <div class="item" style="background-image:url({{ $headline[$i]['gambar'] }})">
                        <div class="post-content">
                            <a class="post-category" href="/kategori/{{$headline[$i]['kategori']['slug'] }}">{{ $headline[$i]['kategori']['nama_kategori'] }}</a>
                            <h2 class="slider-post-title">
                                <a href="/berita/{{ $headline[$i]['slug'] }}">{{ $headline[$i]['judul'] }}</a>
                            </h2>
                            <div class="post-meta mt-2">
                                @if($headline[$i]['diff_hours'] > 1)
                                <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>@if($headline[$i]['diff_hours']>=24) {{ $headline[$i]['parsed_created_at'] }} @else {{ $headline[$i]['diff_hours'] }} hours ago @endif</span>
                                @else
                                <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{ $headline[$i]['diff_hours'] }} hour ago</span>
                                @endif
                                <span class="post-Admin">
                                    by
                                    <a>Admin</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor

        <!-- Small Headline -->
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-4">
                <div class="row mt-3 mt-lg-0">

                @for ($i = 2; $i < 4; $i++)
                    <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                        <div class="post-featured-style" style="background-image:url({{ $headline[$i]['gambar'] }})">
                            <div class="post-content">
                                <a class="post-category" href="/kategori/{{$headline[$i]['kategori']['slug'] }}">{{ $headline[$i]['kategori']['nama_kategori'] }}</a>
                                <h2 class="post-title">
                                    <a href="/berita/{{ $headline[$i]['slug'] }}">{{ \Illuminate\Support\Str::limit($headline[$i]['judul'], 70, '...') }}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    @if($headline[$i]['diff_hours'] > 1)
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>@if($headline[$i]['diff_hours']>=24) {{ $headline[$i]['parsed_created_at'] }} @else {{ $headline[$i]['diff_hours'] }} hours ago @endif</span>
                                    @else
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{ $headline[$i]['diff_hours'] }} hour ago</span>
                                    @endif
                                    <span class="post-Admin">
                                        <span> by </span>
                                        <a>Admin</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </div>
</section>


<section class="block-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="all-news-block">
                    <h3 class="news-title">
                        <span>Berita Terbaru</span>
                    </h3>
                    <div class="all-news">
                        <div class="row">
                            @foreach($berita_terbaru as $terbaru)
                            <div class="col-lg-6 col-md-6">
                                <div class="post-block-wrapper post-float-half clearfix">
                                    <div class="post-thumbnail">
                                        <a href="/berita/{{ $terbaru->slug }}">
                                            <img class="img-fluid" src="{{ $terbaru->gambar }}" alt="post-thumbnail">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category" href="/kategori/{{ $terbaru->kategori->slug }}">{{ $terbaru->kategori->nama_kategori }}</a>
                                        <h2 class="post-title mt-3">
                                            <a href="/berita/{{ $terbaru->slug }}">{{ $terbaru->judul }}</a>
                                        </h2>
                                        <div class="post-meta">
                                            @if($terbaru->diff_hours > 1)
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>@if($terbaru->diff_hours>=24) {{ $terbaru->parsed_created_at }} @else {{ $terbaru->diff_hours }} hours ago @endif</span>
                                            @else
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{ $terbaru->diff_hours }} hour ago</span>
                                            @endif
                                            <span class="post-Admin">by
                                                <a href="">Admin</a>
                                            </span>
                                        </div>
                                        <p>{{ $terbaru->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <nav>
                {{ $berita_terbaru->render() }}
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

@elseif($search_state == 'active')

<section class="block-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="all-news-block">
                    <h3 class="news-title">
                        <span>Hasil Pencarian '{{ $keywords }}'</span>
                    </h3>
                    <div class="all-news">
                        <div class="row">
                            @foreach($berita_terbaru as $terbaru)
                            <div class="col-lg-6 col-md-6">
                                <div class="post-block-wrapper post-float-half clearfix">
                                    <div class="post-thumbnail">
                                        <a href="{{ route('frontend.berita', $terbaru->slug) }}">
                                            <img class="img-fluid" src="{{ $terbaru->gambar }}" alt="post-thumbnail">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category" href="{{ route('frontend.kategori', $terbaru->kategori->slug) }}">{{ $terbaru->kategori->nama_kategori }}</a>
                                        <h2 class="post-title mt-3">
                                            <a href="{{ route('frontend.berita', $terbaru->slug) }}">{{ $terbaru->judul }}</a>
                                        </h2>
                                        <div class="post-meta">
                                            @if($terbaru->diff_hours > 1)
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>@if($terbaru->diff_hours>=24) {{ $terbaru->parsed_created_at }} @else {{ $terbaru->diff_hours }} hours ago @endif</span>
                                            @else
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{ $terbaru->diff_hours }} hour ago</span>
                                            @endif
                                            <span class="post-Admin">by
                                                <a href="">Admin</a>
                                            </span>
                                        </div>
                                        <p>{{ $terbaru->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <nav>
                {{ $berita_terbaru->render() }}
                </nav>


			</div>
        </div>
    </div>
</section>

@endif

@endsection
