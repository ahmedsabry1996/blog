@extends('layouts.frontend')
@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$post->title}}</h1>
    </div>
</div>
                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">Admin</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                {{$post->created_at->toFormattedDateString()}}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="#">{{$post->category->name}}</a>
                            </span>

                        </div>

                        <div class="post__content-info">

                            <div class="testimonial-item quote-left">

                                <h5 class="h5 testimonial-text">
                                  {{$post->content}}
                                </h5>

                                <div class="author-info-wrap table">
                                    <div class="author-info table-cell">
                                        <h6 class="author-name c-primary">Admin</h6>
                                        <div class="author-company">{{$settings->site_name}}</div>
                                    </div>
                                </div>

                                <div class="quote">
                                    <i class="seoicon-quotes"></i>
                                </div>

                            </div>

                      
                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                   @foreach($post->tags as $tag)
                                    <a href="#" class="w-tags-item">{{$tag->tag}} </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

@endsection