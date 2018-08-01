<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Seosight - Index Page</title>

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="app/css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50 {
            padding: 40px;
        }

        .text-center {
            text-align: center;
        }

    </style>

</head>


<body class=" ">

    <div class="content-wrapper">

        @include('includes.header');
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset($latestPost->featured)}}" alt="seo">
                            <div class="overlay"></div>
                            <a href="app/img/post1.jpg" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center">
                                    <a href="15_blog_details.html">{{$latestPost->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$latestPost->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                    <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">Video</a>
                                        </span>

                                    <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>


                <div class="col-lg-2"></div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset($secondPost->featured)}}" alt="seo">
                            <div class="overlay"></div>
                            <a href="app/img/2.png" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="15_blog_details.html">{{$secondPost->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                        {{$secondPost->created_at}}        
                                                     </time>

                                        </span>

                                    <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">Video</a>
                                        </span>

                                    <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset($thirdPost->featured)}}" alt="seo">
                            <div class="overlay"></div>
                            <a href="app/img/3.jpg" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="15_blog_details.html">{{$thirdPost->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$thirdPost->created_at}}
                                            </time>

                                        </span>

                                    <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">Video</a>
                                        </span>

                                    <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="offers">
                            <div class="row">
                               
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$sport->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                   @foreach($sport->posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="app/img/3.jpg" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="padded-50"></div>
                        <div class="offers">
                            <div class="row">
                               
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$economics->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                   @foreach($economics->posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="app/img/3.jpg" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{route('post.show',['slug'=>$post->slug])}}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Form -->

        <div class="container-fluid bg-green-color">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="subscribe scrollme">
                            <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                                <h4 class="subscribe-title">Email Newsletters!</h4>
                                <form class="subscribe-form" method="post" action="">
                                    <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                                    <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                                </form>
                                <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                            </div>

                            <div class="images-block">
                                <img src="app/img/subscr-gear.png" alt="gear" class="gear">
                                <img src="app/img/subscr1.png" alt="mail" class="mail">
                                <img src="app/img/subscr-mailopen.png" alt="mail" class="mail-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Subscribe Form -->
    </div>



    <!-- Footer -->
@include('includes.footer')
</body>

</html>
