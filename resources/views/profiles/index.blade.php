@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="tab_box">
            <div class="btn_area">
                <p class="tab_btn active">デジタル名刺</p>
                <p class="tab_btn">実サイズ</p>
                <p class="tab_btn">レジュメ</p>
            </div>
            <div class="panel_area">
                <div class="tab_panel active">
                    <div class="card border-1 rounded-1">
                        <div class="row">
                            <div class="col-sm-4 bg-primary">
                                <div class="mx-auto text-center pt-5"><img src="{{ $user->profile->profileImage() }}"
                                        class="border-2 rounded-circle w-75 p-2 mx-auto"></div>
                                @can('update', $user->profile)
                                    <div class="text-center">
                                        <a href="/profile/{{ $user->id }}/edit_p_image" class="my-2"><button
                                                class="btn btn btn-light rounded-pill">画像を変更する</button></a>
                                    </div>
                                @endcan


                                <div class="d-flex justify-content-center px-3 pt-5">
                                    @if ($user->profile->tw)
                                        <div class="px-2 pb-5"><a href="{{ $user->profile->tw }}"
                                                class="text-white"><i class="fa-brands fa-twitter fs-4"></i></a></div>
                                    @endif
                                    @if ($user->profile->fb)
                                        <div class="px-2"><a href="{{ $user->profile->fb }}"
                                                class="text-white"><i class="fa-brands fa-facebook fs-4"></i></a></div>
                                    @endif
                                    @if ($user->profile->in)
                                        <div class="px-2"><a href="{{ $user->profile->in }}"
                                                class="text-white"><i class="fa-brands fa-instagram fs-4"></i></a></div>
                                    @endif
                                    @if ($user->profile->yt)
                                        <div class="px-2"><a href="{{ $user->profile->yt }}"
                                                class="text-white"><i class="fa-brands fa-youtube fs-4"></i></a></div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-8 px-4 py-2">
                                <div class="d-flex align-items-center">
                                    @if ($user->profile->logo)
                                        <img src="{{ $user->profile->logo() }}" class="w-75 py-3 pe-5">
                                    @else
                                        <h4 class="pt-3">{{ $user->profile->logo() }}</h4>
                                    @endif
                                    @can('update', $user->profile)
                                        <a href="/profile/{{ $user->id }}/edit_logo" class=""><button
                                            class="btn btn-outline-secondary rounded-pill">ロゴ変更</button></a>
                                    @endcan
                                </div>
                                <h4>{{ $user->profile->occupation }}</h4>
                                <h1>{{ $user->profile->username }}</h1>
                                <h3>{{ $user->profile->username_sm }}</h3>
                                <br>
                                <h6>{{ $user->profile->com_name }}</h6>
                                @if ($user->profile->p_code)
                                    <h6>〒{{ $user->profile->p_code }} {{ $user->profile->adress }}</h6>
                                @endif
                                <h6>E-mail:{{ $user->profile->email }}</h6>
                                @if ($user->profile->tel)
                                    <h6>Tel:{{ $user->profile->tel }}</h6>
                                @endif
                                @if ($user->profile->url)
                                    <a href="{{ $user->profile->url }}"
                                        class="text-dark">{{ $user->profile->url }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_panel ">
                    <div class="d-flex justify-content-center">
                        <div class="card border-1 rounded-1 " style="width:80mm; height:130mm;">
                            <div class="bg-primary">
                                <div class="mx-auto text-center py-3"><img src="{{ $user->profile->profileImage() }}"
                                        class="border-2 rounded-circle w-50 p-2 mx-auto"></div>
                            </div>
                            <div class="py-1 px-2">
                                <div class="d-flex align-items-center">
                                    @if ($user->profile->logo)
                                        <img src="{{ $user->profile->logo() }}" class="w-50 py-1">
                                    @else
                                        <h4 class="pt-3">{{ $user->profile->logo() }}</h4>
                                    @endif

                                </div>
                                <h6>{{ $user->profile->occupation }}</h4>
                                    <h4>{{ $user->profile->username }}</h1>
                                        <h6>{{ $user->profile->username_sm }}</h3>
                                            <h6 style="font-size:50%;">{{ $user->profile->com_name }}</h6>
                                            @if ($user->profile->p_code)
                                                <p class="m-0" style="font-size:50%;">
                                                    〒{{ $user->profile->p_code }} {{ $user->profile->adress }}</p>
                                            @endif
                                            <p class="m-0" style="font-size:50%;">
                                                E-mail:{{ $user->profile->email }}</p>
                                            @if ($user->profile->tel)
                                                <p class="m-0" style="font-size:50%;">
                                                    Tel:{{ $user->profile->tel }}</p>
                                            @endif

                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab_panel">
                    <p>タブ333333</p>
                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト33333
                    </p>
                </div>
            </div>
        </div>

        <div class="card-btn pb-5 d-flex justify-content-between">
            <div>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit" class=""><button
                            class="btn btn-outline-secondary rounded-pill">名刺を編集する</button></a>
                @endcan
                @cannot('update', $user->profile)
                <div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                @endcannot

            </div>

            <div>
                <a href="" class=""><button class="btn btn-secondary rounded-pill">名刺データをダウンロード</button></a>
            </div>

        </div>

        <hr>

        @foreach ($user->posts as $post)
            <div class="row">
                <div class="col-2">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 p-3 rounded-circle">
                    </a>
                </div>
                <div class="col-10 pe-3 pb-3">
                    <div class="d-flex justify-content-between">
                        <a href="/profile/{{ $post->user->id }}" class="text-dark text-decoration-none">
                            <h4>{{ $post->user->profile->username }}</h4>
                        </a>
                        <p class="text-secondary">{{ $post->created_at }}</p>
                    </div>
                    <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none">
                        <p>{{ $post->message }}</p>
                    </a>
                    @if ($post->image)
                        <div class="border-1">
                            <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none">
                                <img src="/storage/{{ $post->image }}" class="w-75">
                            </a>
                        </div>
                    @endif

                </div>
                <hr>
            </div>
        @endforeach


    </div>
@endsection
