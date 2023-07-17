@extends('site.master')
@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="{{ asset('siteassets/css/prixima_css_style.css') }}">

        <title>Prixima BS5 Template</title>
        <style class="redeviation-bs-style" data-name="content">
            /*! (c) Philipp Koenig under GPL-3.0 */
            body>div#redeviation-bs-indicator>div {
                opacity: 0;
                pointer-events: none
            }

            body>#redeviation-bs-overlay.redeviation-bs-visible,
            body>#redeviation-bs-sidebar.redeviation-bs-visible {
                opacity: 1;
                pointer-events: auto
            }

            body.redeviation-bs-noscroll {
                overflow: hidden !important
            }

            body>div#redeviation-bs-indicator>div {
                position: absolute;
                transform: translate3d(-24px, 0, 0);
                top: 0;
                left: 0;
                width: 24px !important;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                border-radius: 0 10px 10px 0;
                transition: opacity .3s, transform .3s;
                z-index: 2
            }

            body>div#redeviation-bs-indicator>div>span {
                -webkit-mask: no-repeat center/24px;
                -webkit-mask-image: url(chrome-extension://jdbnofccmhefkmjbkkdkfiicjkgofkdh/img/icon-bookmark.svg);
                background-color: #ffffff;
                position: absolute;
                display: block;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%
            }

            body>div#redeviation-bs-indicator[data-pos=right] {
                left: auto;
                right: 0
            }

            body>div#redeviation-bs-indicator[data-pos=right]>div {
                transform: translate3d(24px, 0, 0);
                left: auto;
                right: 0;
                border-radius: 10px 0 0 10px
            }

            body>div#redeviation-bs-indicator.redeviation-bs-fullHeight>div {
                border-radius: 0
            }

            body>div#redeviation-bs-indicator.redeviation-bs-hover>div {
                transform: translate3d(0, 0, 0);
                opacity: 1
            }

            body>div#redeviation-bs-indicator[data-pos=left].redeviation-bs-has-lsb {
                height: 100% !important;
                top: 0 !important
            }

            body>div#redeviation-bs-indicator[data-pos=left].redeviation-bs-has-lsb>div {
                background: rgba(0, 0, 0, 0)
            }

            body>div#redeviation-bs-indicator[data-pos=left].redeviation-bs-has-lsb>div>span {
                -webkit-mask-position-y: 20px
            }

            body>#redeviation-bs-sidebar {
                width: 350px;
                max-width: none;
                height: 0;
                z-index: 2147483646;
                background-color: rgba(0, 0, 0, 0.6) !important;
                color-scheme: auto !important;
                speak: none;
                border: none;
                display: block !important;
                transform: translate3d(-350px, 0, 0);
                transition: width 0s .3s, height 0s .3s, opacity .3s, transform .3s
            }

            body>#redeviation-bs-sidebar[data-pos=right] {
                left: auto;
                right: 0;
                transform: translate3d(350px, 0, 0)
            }

            body>#redeviation-bs-sidebar.redeviation-bs-visible {
                width: calc(100% + 350px);
                height: 100%;
                transform: translate3d(0, 0, 0);
                transition: opacity .3s, transform .3s
            }

            body>#redeviation-bs-sidebar.sidepanel {
                width: 100% !important
            }

            body>#redeviation-bs-sidebar.redeviation-bs-hideMask {
                background: none !important
            }

            body>#redeviation-bs-sidebar.redeviation-bs-hideMask:not(.redeviation-bs-hover) {
                width: calc(350px + 50px)
            }

            body>#redeviation-bs-overlay {
                width: 100%;
                max-width: none;
                height: 100%;
                z-index: 2147483647;
                border: none;
                speak: none;
                background: rgba(0, 0, 0, 0.5) !important;
                color-scheme: auto !important;
                transition: opacity .3s
            }
        </style>
    </head>
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro center" style="text-align: center;">
                        <h6 class="h2 fs-1 mb-4">Experts</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($experts as $expert)
                    <div class="col-md-3">
                        <article class="blog-post">
                            <img src="{{ asset(Storage::url($expert->image)) }}" alt="">
                            <a href="{{ route('site.expert', $expert->id) }}" class="tag"
                                style="background-color: blue">
                                <i class="fa fa-arrow-alt-circle-right"></i>
                            </a>
                            <div class="content">
                                @php
                                    $availableTime = $expert->availableTime()->count();
                                    $activeAvailableTimeCount = $expert
                                        ->availableTime()
                                        ->where('status', '=', 1)
                                        ->count();
                                @endphp
                                <h6 class="h5 text-bold">{{ $expert->name }}</h6>
                                <span>{{ Str::words(strip_tags($expert->description), 4, '...') }}</span>
                                <span class="d-block">AvailableTime count :{{ $availableTime }}</span>
                                <span class="d-block">Active AvailableTime count : {{ $activeAvailableTimeCount }}</span>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

@stop
