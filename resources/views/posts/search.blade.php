@extends('layouts.app')

@section('content')
    <div class="container px-3">

        <div class="row">
            <div class="mb-3">
                <form action="/search" method="GET">
                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control rounded-pill"
                        placeholder="検索">
                    {{-- <input type="submit" value="検索"> --}}
                </form>


            </div>

            <div class="tab_box pb-5">
                <div class="btn_area">
                    <p class="tab_btn active">メッセージ</p>
                    <p class="tab_btn">ユーザー名</p>
                    <p class="tab_btn">名刺内容</p>
                </div>
                <div class="panel_area">
                    <div class="tab_panel active">
                        <div class="result row">
                            @forelse ($posts as $post)
                                <div class="col-2">
                                    <a href="/profile/{{ $post->user->id }}">
                                        <img src="{{ $post->user->profile->profileImage() }}"
                                            class="w-100 p-2 rounded-circle">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <div class="d-flex justify-content-between">
                                        <a href="/profile/{{ $post->user->id }}" class="text-decoration-none text-dark">
                                            <h5>{{ $post->user->name }}</h5>
                                        </a>
                                        <p class="text-secondary">{{ $post->created_at }}</p>

                                    </div>
                                    <a href="/p/{{ $post->id }}" class="text-decoration-none text-dark">
                                        <p>{{ $post->message }}</p>
                                    </a>

                                    @if ($post->image)
                                        <div>
                                            <a href="/p/{{ $post->id }}" class="text-decoration-none text-dark">
                                                <img src="/storage/{{ $post->image }}" class="w-100 pb-2">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <hr>
                            @empty
                                <div>No Result!!</div>
                            @endforelse



                        </div>
                    </div>

                    <div class="tab_panel">
                        <div class="result row">
                            @forelse ($users as $user)
                                <div class="col-2">
                                    <a href="/profile/{{ $user->id }}">
                                        <img src="{{ $user->profile->profileImage() }}" class="w-100 p-2 rounded-circle">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <div class="d-flex justify-content-between">
                                        <a href="/profile/{{ $user->id }}" class="text-decoration-none text-dark">
                                            <h5>{{ $user->name }}</h5>
                                        </a>
                                    </div>
                                    <a href="/profile/{{ $user->id }}" class="text-decoration-none text-dark">
                                        <p>{{ $user->profile->bio }}</p>
                                    </a>

                                </div>
                            <hr>
                            @empty
                                <div>No Result!!</div>
                            @endforelse
                        </div>
                    </div>

                    <div class="tab_panel">
                        <div class="result row">
                            @forelse ($profiles as $profile)
                                <div class="card border-1 rounded-1">
                                    <div class="row">
                                        <div class="col-sm-4 bg-primary">
                                            <div class="mx-auto text-center pt-5"><img
                                                    src="{{ $profile->profileImage() }}"
                                                    class="border-2 rounded-circle w-75 p-2 mx-auto"></div>
                                            <div class="d-flex justify-content-center px-3 pt-5">
                                                @if ($profile->tw)
                                                    <div class="px-2 pb-5"><a href="{{ $user->profile->tw }}"
                                                            class="text-white"><i
                                                                class="fa-brands fa-twitter fs-4"></i></a></div>
                                                @endif
                                                @if ($profile->fb)
                                                    <div class="px-2"><a href="{{ $user->profile->fb }}"
                                                            class="text-white"><i
                                                                class="fa-brands fa-facebook fs-4"></i></a></div>
                                                @endif
                                                @if ($profile->in)
                                                    <div class="px-2"><a href="{{ $user->profile->in }}"
                                                            class="text-white"><i
                                                                class="fa-brands fa-instagram fs-4"></i></a></div>
                                                @endif
                                                @if ($profile->yt)
                                                    <div class="px-2"><a href="{{ $user->profile->yt }}"
                                                            class="text-white"><i
                                                                class="fa-brands fa-youtube fs-4"></i></a></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-8 px-4 py-2">
                                            <div class="d-flex align-items-center">
                                                @if ($profile->logo)
                                                    <img src="{{ $user->profile->logo() }}" class="w-75 py-3 pe-5">
                                                @else
                                                    <h4 class="pt-3">{{ $user->profile->logo() }}</h4>
                                                @endif

                                            </div>
                                            <h4>{{ $profile->occupation }}</h4>
                                            <h1>{{ $profile->username }}</h1>
                                            <h3>{{ $profile->username_sm }}</h3>
                                            <br>
                                            <h6>{{ $profile->com_name }}</h6>
                                            @if ($profile->p_code)
                                                <h6>〒{{ $profile->p_code }} {{ $user->profile->adress }}</h6>
                                            @endif
                                            <h6>E-mail:{{ $profile->email }}</h6>
                                            @if ($profile->tel)
                                                <h6>Tel:{{ $profile->tel }}</h6>
                                            @endif
                                            @if ($profile->url)
                                                <a href="{{ $profile->url }}"
                                                    class="text-dark">{{ $profile->url }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @empty
                                <div>No Result!!</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
