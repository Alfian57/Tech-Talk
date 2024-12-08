@extends('app.layouts.main')

@section('content')
    <div class="tt-tab-wrapper">
        <div class="tt-wrapper-inner">
            <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                <li class="nav-item">
                    <a class="nav-link show active" data-toggle="tab" href="#tt-tab-01" role="tab"><span>Tentang</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tt-tab-02" role="tab"><span>Visi Misi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tt-tab-03" role="tab"><span>FAQ</span></a>
                </li>
                <li class="nav-item tt-hide-xs">
                    <a class="nav-link" data-toggle="tab" href="#tt-tab-04" role="tab"><span>Ketentuan
                            Layanan</span></a>
                </li>
                <li class="nav-item tt-hide-md">
                    <a class="nav-link" data-toggle="tab" href="#tt-tab-05" role="tab"><span>Privasi</span></a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            @include('app.components.about-us.about')
            @include('app.components.about-us.guidelines')
            @include('app.components.about-us.faq')
            @include('app.components.about-us.terms-of-service')
            @include('app.components.about-us.privacy')
        </div>
    </div>
@endsection
