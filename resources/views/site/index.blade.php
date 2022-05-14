@extends('layouts.site.master')
@section('content')
    @include('layouts.site.blocks.content.header')
    <main class="content">
        @include('layouts.site.blocks.content.mobile-baner')
        @include('layouts.site.blocks.content.discount')
        <div class="bg-two py-3">
            <div class="container px-xs-0">
                @include('layouts.site.blocks.content.categories')
                @include('layouts.site.blocks.content.products')
            </div>
        </div>
        @include('layouts.site.blocks.content.baner')
        @include('layouts.site.blocks.content.most')
        @include('layouts.site.blocks.content.mobile-baner2')
        @include('layouts.site.blocks.content.services')
        @include('layouts.site.blocks.content.blog')
        <div class="py-3">
            <div class="container">
                @include('layouts.site.blocks.content.brands')
            </div>
        </div>
        @include('layouts.site.blocks.content.consulting')
    </main>
@stop
