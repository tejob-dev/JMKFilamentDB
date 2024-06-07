<!DOCTYPE html>
<html lang="en">

@php 

$setting = App\Models\Setting::first();
$slides = App\Models\Slide::get();
$accueilabout = App\Models\Accueilabout::first();
$accueilservice = App\Models\Accueilservice::first();
$services = $accueilservice?->accueilserviceitems;
$accueilvideo = App\Models\Accueilvideo::first();
$accueilvmanager = App\Models\Accueilmanager::first();
$accueilvmanageritems = $accueilvmanager?->accueilmanageritems;
$partners = App\Models\Partner::get();
$accueilclient = App\Models\Accueilclient::first();
$accueilclientitems = $accueilclient?->accueilclientitems;
$accueilformation = App\Models\Accueilformation::first();
$formations = $accueilformation?->formations;
$typeformations = App\Models\Typeformation::get();
$accueilactu = App\Models\Accueilactu::first();
$actualites = $accueilactu?->actualites;
$accueiltemoin = App\Models\Accueiltemoin::first();
$equipes = $accueiltemoin?->equipes;
$lienfooters = App\Models\Lienfooter::get();

@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{$setting->nom_site}}</title>

    <!-- Fav Icon -->
    <link rel="icon" href="img/jmkfile/accueil/favicon.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="css/font-awesome-all.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/nice-select.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="txt-loading">
                            <span data-text-preloader="J" class="letters-loading">
                                J
                            </span>
                            <span data-text-preloader="M" class="letters-loading">
                                M
                            </span>
                            <span data-text-preloader="K" class="letters-loading">
                                K
                            </span>
                            <span data-text-preloader="-" class="letters-loading">
                                -
                            </span>
                            <span data-text-preloader="C" class="letters-loading">
                                C
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="u" class="letters-loading">
                                u
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                            <span data-text-preloader="g" class="letters-loading">
                                g
                            </span>
                        </div>
                        <div class="txt-loading">
                            <span data-text-preloader="Co" class="letters-loading">
                                Co
                            </span>
                            <span data-text-preloader="mp" class="letters-loading">
                                mp
                            </span>
                            <span data-text-preloader="an" class="letters-loading">
                                an
                            </span>
                            <span data-text-preloader="y" class="letters-loading">
                                y
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->


        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box clearfix">
                    <figure class="logo-box pull-left"><a href="index_1.html"><img src="img/logo.png" alt=""></a></figure>
                    <div class="close-search pull-right"><i class="fa-solid fa-xmark"></i></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="/">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value="" placeholder="Type your keyword and hit" required="">
                                    <button type="submit"><i class="flaticon-loupe"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- sidebar cart item -->
        <div class="xs-sidebar-group info-group info-sidebar">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-overlay xs-overlay-2 xs-bg-black"></div>
            <div class="xs-overlay xs-overlay-3 xs-bg-black"></div>
            <div class="xs-overlay xs-overlay-4 xs-bg-black"></div>
            <div class="xs-overlay xs-overlay-5 xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget"><i class="fa fa-times"></i></a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="/"><img src="{{Storage::url($setting->logo_site)}}" alt=""></a>
                                </div>
                                <div class="content-box">
                                    <h4>A PROPOS</h4>
                                    <p>Créateur de compétences, d’innovation et d’opportunités. Nous vous accompagnons dans votre développement stratégique au quotidien.</p>
                                    <br>
                                    <a href="a-propos.html" class="theme-btn btn-two">Lire plus</a>
                                </div>
                                <div class="contact-info">
                                    <h4>Contacts</h4>
                                    <ul>
                                        <li>{{($setting->position_site)}}</li>
                                        <li><a href="tel:{{str_replace(' ', '', $setting->contact_site)}}">{{($setting->contact_site)}}</a></li>
                                        <li><a href="mailto:{{($setting->email_site)}}">{{($setting->email_site)}}</a></li>
                                    </ul>
                                </div>
                                <ul class="social-box clearfix">
                                    {!! renderHtml($setting->list_social) !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->


        <!-- main header -->
        <header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="outer-container">
                    <ul class="info-list clearfix">
                        <li><span class="ttm-textcolor-skincolor" style="color: white;"><i class="fa fa-map"></i>
                                {{($setting->position_site)}}</span></li>
                        <!-- <li><a href="contacts.html">Contacts</a></li> -->
                    </ul>
                    <ul class="social-links clearfix">
                        <li>
                            <h5>Envoyer un Email: {{($setting->email_site)}}</h5>
                        </li>
                        {!! renderHtml($setting->list_social) !!}
                    </ul>
                </div>
            </div>
            <!-- header-upper -->

            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="menu-area" style="display: contents;">

                            <figure class="logo-box" style="
                                    width: fit-content;
                                    display: inline-block;
                                "><a href="/">
                                    <img src="{{Storage::url($setting->logo_site)}}" alt=""></a>
                            </figure><!--Mobile Navigation Toggler-->
                            <nav class="main-menu navbar-expand-md navbar-light" style="">

                                <div class="collapse navbar-collapse show clearfix" style="display: flex!important; flex-direction: row;" id="navbarSupportedContent">

                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="/">Accueil</a>
                                        </li>
                                        <li class="dropdown"><a href="#">A Propos</a>
                                            <ul>
                                                <li><a href="presentation.html">Présentation</a></li>
                                                <li><a href="equipe.html">Notre équipe</a></li>
                                                <li><a href="approche.html">Notre approche</a></li>
                                            </ul>
                                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                        </li>
                                        <li class="dropdown"><a href="#">Services</a>
                                            <ul>
                                                <li><a href="services-detail-agriculture.html">Négoce de matière première</a></li>
                                                <li class="dropdown"><a href="#">Environnement &amp; foresterie</a>
                                                    <ul>
                                                        <li><a href="changement_climatique.html">Changement climatique &amp; biodiversité</a>
                                                        </li>
                                                        <li><a href="amenagement_forestier.html">Aménagement forestier &amp; du territoire</a>
                                                        </li>
                                                        <li><a href="ecosysteme.html">Gestion des écosystèmes</a></li>
                                                        <li><a href="agroforesterie.html">Agroforesterie &amp; Agroécologie</a></li>
                                                        <li><a href="audit_environnement.html">Diagnostics &amp; audits</a></li>
                                                        <li><a href="monitoring_environnement.html">Monitoring environnementaux</a>
                                                        </li>
                                                    </ul>
                                                    <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                                </li>
                                                <li><a href="services-detail-agriculture.html">Agriculture Intelligente &amp; Innovante</a></li>
                                                <li><a href="services-detail-entreprise.html">Developpement des entreprises</a></li>
                                                <li><a href="services-detail-gestion_projet.html">Étude et gestion de projets</a></li>
                                                <li><a href="service-detail-btp.html">Bâtiment et Travaux Publics</a></li>
                                                <li><a href="service-detail-incubation.html">Incubation des organisations agricole</a></li>
                                                <li><a href="service-detail-import.html">Import et export</a></li>
                                            </ul>
                                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                        </li>
                                        <li class="dropdown"><a href="#">Nos produits</a>
                                            <ul>
                                                <li><a href="#agrotransparence.html">Agro Transparence</a></li>
                                                <li><a href="#fieldconnect.html">FieldConnect</a></li>
                                                <li><a href="#geniebio.html">ONG GénieBio</a></li>
                                            </ul>
                                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                        </li>
                                        <li><a href="actualites.html">Actualités</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content right-column">
                            <div class="phone">
                                <h3><a href="tel:{{str_replace(' ', '', $setting->contact_site)}}">{{($setting->contact_site)}}</a></h3>
                            </div>
                            <div class="btn-box"><a href="contact.html" class="theme-btn btn-one">Contactez-nous</a></div>
                            <div class="search-box">
                            </div>
                            <div class="language-box" style="padding-left: 30px;">
                                <h5><img src="img/icon-3.png" alt=""></h5>
                                <div class="select-box">
                                    <select class="selectmenu">
                                        <option>Fr</option>
                                        <option>Eng</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="nav-btn nav-toggler navSidebar-button clearfix">
                                <img src="img/icon-4.png" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-right-content right-column">
                            <div class="phone">
                                <h3><a href="tel:{{str_replace(' ', '', $setting->contact_site)}}">{{($setting->contact_site)}}</a></h3>
                            </div>
                            <div class="btn-box"><a href="contact.html" class="theme-btn btn-one">Contactez-nous</a></div>
                            <div class="search-box">
                                <!-- <div class="search-box-outer search-toggler" style="padding-left: 20px;">
                                    &nbsp;<img src="img/icon-2.png" alt="">
                                </div> -->
                            </div>
                            <div class="language-box" style="padding-left: 30px;">
                                <h5><img src="img/icon-3.png" alt=""></h5>
                                <div class="select-box">
                                    <select class="selectmenu">
                                        <option>Fr</option>
                                        <option>Eng</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="nav-btn nav-toggler navSidebar-button clearfix">
                                <img src="img/icon-4.png" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="{{Storage::url($setting->logo_site)}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="contact-info">
                    <h4>Contacts</h4>
                    <ul>
                        <li>{{($setting->position_site)}}</li>
                        <li><a href="tel:{{str_replace(' ', '', $setting->contact_site)}}">{{($setting->contact_site)}}</a></li>
                        <li><a href="mailto:{{($setting->email_site)}}">{{($setting->email_site)}}</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        {! $setting->list_social !}
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->


        <!-- banner-section -->
        <section class="banner-section">
            <div class="banner-carousel owl-theme owl-carousel">
                @foreach($slides as $slide)
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url({{ Storage::url($slide->image) }}); height:820px;"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>{!! renderHtml($slide->title) !!}</h2>
                            <div class="lower-box">
                                <!-- <div class="icon-box"><i class="{{ $slide->icone }}"></i></div> -->
                                <div class="text">{!! renderHtml($slide->soustitle) !!}</div>
                                <a href="{{ $slide->boutonlien }}" class="theme-btn btn-two">{{ $slide->boutontitre }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- banner-section end -->


        <!-- about-section -->
        <section class="about-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <div class="image-shape">
                                <div class="shape-1" style="background-image: url(img/shape-1.png);"></div>
                                <div class="shape-2" style="background-image: url(img/shape-2.png);"></div>
                                <!-- <div class="shape-3" style="background-image: url(img/shape-3.png);"></div> -->
                                <div class="shape-3" style="background-image: url(img/shape-1ex.png);"></div>
                                <div class="shape-4" style="background-image: url(img/shape-2ex.png);"></div>
                            </div>
                            <figure class="image"><img src="{{ Storage::url($accueilabout?->image) }}" alt=""></figure>
                            <div class="experience-box">
                                <!-- <h2>9</h2> -->
                                <h6>{{ $accueilabout?->imagetitle }}</h6>
                            </div>
                            {!! renderHtml($accueilabout?->imagetextlist) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <span class="sub-title">{{$accueilabout?->section}}</span>
                                <h2>{{ $accueilabout?->title }}</h2>
                            </div>
                            <div class="text-box">
                                {!! renderHtml($accueilabout?->text) !!}
                            </div>
                            <ul class="list-item clearfix">
                                {!! renderHtml($accueilabout?->subservice) !!}
                            </ul>
                            <div class="btn-box">
                                <a href="{{ $accueilabout?->boutonlien }}" class="theme-btn btn-two">{{ $accueilabout?->boutontitre }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->

        <!-- service-section -->
        <section class="service-section sec-pad">
            <div class="pattern-layer">
                <!-- <div class="pattern-1" style="background-image: url(img/shape-5.png);"></div> -->
                <!-- <div class="pattern-2" style="background-image: url(img/shape-6.png);"></div> -->
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="sub-title">{{ $accueilservice?->secton }}</span>
                    <h2>{{ $accueilservice?->title }}</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                    @foreach($services as $service  )
                    <div class="service-block-one {{ $loop->index%3==0?'block-one':'block-two' }} {{ $loop->index%2==0?'block-two':'block-three' }}">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-analytics"></i></div>
                                <span class="count-text">0{{$loop->index + 1}}</span>
                            </div>
                            <h3><a href="{{ $service?->boutonlien }}">{{ renderHtml($service?->title) }}</a></h3>
                            <div class="link"><a href="{{ $service?->boutonlien }}"><span>{{ $service?->boutontitre }}</span></a></div>
                            <p>{!! renderHtml($service?->text) !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- service-section end -->

        <!-- video-section -->
        <section class="video-section sec-pad">
            <!-- <div class="pattern-layer" style="background-image: url(img/shape-4.png);"></div> -->
            <div class="auto-container outer-container">
                <div class="video-inner">
                    <div class="bg-layer" style="background-image: url({{ Storage::url($accueilvideo?->image) }});"></div>
                    <div class="btn-box">
                        <a href="{{ ($accueilvideo?->videolien) }}" class="lightbox-image video-btn" data-caption=""><i class="flaticon-play-button"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- video-section end -->


        <!-- service-section -->
        <section class="service-section sec-pad">
            <div class="pattern-layer">
                <!-- <div class="pattern-2" style="background-image: url(img/shape-6.png);"></div> -->
            </div>
        </section>
        <!-- service-section end -->


        <!-- growth-section -->
        <section class="growth-section sec-pad">
            <div class="pattern-layer" style="background-image: url(img/shape-7.png);"></div>
            <div class="auto-container">
                <div class="growth-inner">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
                                <figure class="image-box"><img src="{{ Storage::url($accueilvmanager?->image) }}" alt="{{ ($accueilvmanager?->imagetitle) }}"></figure>
                                <div class="sec-title light">
                                    <span class="sub-title">{{ ($accueilvmanager?->section) }}</span>
                                    <h2>{!! renderHtml($accueilvmanager?->title) !!}</h2>
                                </div>
                                <div class="text-box">
                                    <p>{!! renderHtml($accueilvmanager?->text) !!}</p>
                                    <a href="{{ ($accueilvmanager?->boutonlien) }}" class="theme-btn btn-two"><span>{{ ($accueilvmanager?->boutontitre) }}</span></a>
                                </div>
                                <div class="progress-box">
                                    {!! renderHtml($accueilvmanager?->textentreprise) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 inner-column">
                            <div class="growth-content">
                                @foreach($accueilvmanageritems as $accueilvmanageritem)
                                <div class="growth-block-one">
                                    <div class="inner-box">
                                        <h3><a href="{{ $accueilvmanageritem?->boutonlien }}">{{ $accueilvmanageritem?->title }}</a></h3>
                                        {!! renderHtml($accueilvmanageritem?->text) !!}
                                        <div class="icon-box"><i class="{{ $accueilvmanageritem?->icone }}"></i></div>
                                        <div class="link-box"><a href="{{ $accueilvmanageritem?->boutonlien }}"><span>{{ $accueilvmanageritem?->boutontitre }}</span></a></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clients-section">
                    <ul class="five-item-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                        @foreach($partners as $partner)
                        <li>
                            <figure class="clients-logo"><a href="#"><img src="{{ Storage::url($partner?->image) }}" style="height: 100px;" alt="{{ ($partner?->imagetile) }}"></a></figure>
                        </li>
                        @endforeach
                    </ul>
                    <!-- <div class="more-text centred">
                        <h5>2.6k Companies &amp; Individuals Trusted  Us. <a href="index_1.html"><i class="flaticon-right-chevron"></i>View All Clients</a></h5>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- growth-section end -->


        <!-- chooseus-section -->
        <!-- <section class="chooseus-section sec-pad">
            <span class="big-text">Why <br>Choose Us</span>
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="sub-title">Why Coose Us</span>
                    <h2>Reason for Choosee Counsolve</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 left-column">
                        <div class="inner-content">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-knowledge"></i></div>
                                    <div class="static-content">
                                        <h3>Extensive Knowledge</h3>
                                        <p>Foresee the pain trouble all that rationally encounter</p>
                                    </div>
                                    <div class="overlay-content">
                                        <p>Foresee the pain trouble all that rationally encounter to the claims of the obligations of business it will frequently occur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-united"></i></div>
                                    <div class="static-content">
                                        <h3>Team Approach</h3>
                                        <p>How all this mistaken idea any denouncing pleasure</p>
                                    </div>
                                    <div class="overlay-content">
                                        <p>How all this mistaken idea any denouncing pleasure to the claims of the obligations of business it will frequently occur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-clock"></i></div>
                                    <div class="static-content">
                                        <h3>Time Savings</h3>
                                        <p>Actual teachings of the great it explorer of the truth</p>
                                    </div>
                                    <div class="overlay-content">
                                        <p>Actual teachings of the great it explorer of the truth to the claims of the obligations of business it will frequently occur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                        <div class="image-box">
                            <figure class="image"><img src="img/chooseus-1.jpg" alt=""></figure>
                            <div class="image-shape"><img src="img/shape-8.png" alt=""></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 right-column">
                        <div class="inner-content">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-risk-management"></i></div>
                                    <div class="static-content">
                                        <h3>Risk Management</h3>
                                        <p>One rejects, dislikes, or avoids pleasure all itself</p>
                                    </div>
                                    <div class="overlay-content">
                                        <p>One rejects, dislikes, or avoids pleasure all itself to the claims of the obligations of business it will frequently occur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-monitor"></i></div>
                                    <div class="static-content">
                                        <h3>Advanced Tech</h3>
                                        <p>Rationally encounter that are consequences extremely</p>
                                    </div>
                                    <div class="overlay-content">
                                        <p>Rationally encounter that are consequences extremely to the claims of the obligations of business it will frequently occur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-advice"></i></div>
                                    <div class="static-content">
                                        <h3>Customized Advice</h3>
                                        <p>How all this mistaken idea of denouncing pleasure</p>
                                    </div>
                                    <div class="overlay-content">
                                        <p>How all this mistaken idea of denouncing pleasure to the claims of the obligations of business it will frequently occur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- chooseus-section end -->


        <!-- working-section -->
        <section class="working-section centred sec-pad">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="sub-title">{{ $accueilclient?->section }}</span>
                    <h2>{{ $accueilclient?->title }}</h2>
                </div>
                <div class="inner-content">
                    <div class="shape" style="background-image: url(img/shape-9.png);"></div>
                    <div class="row clearfix">
                        @foreach($accueilclientitems as $accueilclientitem)
                        <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                            <div class="working-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ Storage::url($accueilclientitem?->image) }}" alt="{{ $accueilclientitem?->title }}" style="max-height: 162px;"></figure>
                                        <div class="icon-box"><i class="{{ ($accueilclientitem?->icone) }}"></i></div>
                                    </div>
                                    <div class="lower-content">
                                        <h3>{{ $accueilclientitem?->title }}</h3>
                                        {!! renderHtml($accueilclientitem?->text) !!}
                                        <h2>0{{ $loop->index + 1 }}</h2>
                                        <!-- <span>st step</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- <div class="more-text centred">
                    <h5>Start Investing with Smart Ideas. <a href="index_1.html"><i class="flaticon-right-chevron"></i>Appointment</a></h5>
                </div> -->
            </div>
        </section>
        <!-- working-section end -->


        <!-- project-section -->
        <section class="project-section sec-pad">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="sub-title">{{ $accueilformation?->section }}</span>
                    <h2>{{ $accueilformation?->title }}</h2>
                </div>
                <div class="project-tab">
                    <div class="shape" style="background-image: url(img/shape-10.png);"></div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-12 col-sm-12 btn-column">
                            <div class="tab-btn-box">
                                <ul class="tab-btns project-tab-btns clearfix">
                                    <li class="p-tab-btn active-btn" data-tab="#tab-all">TOUS VOIR</li>
                                    @foreach($typeformations->take(4) as $typeformation)
                                    <li class="p-tab-btn" data-tab="#tab-{{ makeWordLikeId($typeformation?->title) }}">{{ $typeformation?->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 content-column">
                            <div class="p-tabs-content">
                                <div class="p-tab active-tab" id="tab-all">
                                    <div class="four-item-carousel owl-carousel owl-theme">
                                        @foreach($formations as $formation)
                                        <div class="project-block-one">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{ Storage::url($formation?->image) }}" alt=""></figure>
                                                <div class="content-inner">
                                                    <div class="text-box">
                                                        <h6>{{ ($formation?->typeformation?->title) }}</h6>
                                                        <h3><a href="{{ ($formation?->boutonlien) }}">{{ ($formation?->title) }}</a></h3>
                                                    </div>
                                                    <div class="link">
                                                        <a href="{{ ($formation?->boutonlien) }}"><i class="flaticon-diagonal-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($typeformations->take(4) as $typeformation)
                                <div class="p-tab" id="tab-{{ makeWordLikeId($typeformation?->title) }}">
                                    <div class="four-item-carousel owl-carousel owl-theme">
                                        @foreach($typeformation?->formations as $formation)
                                        <div class="project-block-one">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{ Storage::url($formation?->image) }}" alt=""></figure>
                                                <div class="content-inner">
                                                    <div class="text-box">
                                                        <h6>{{ ($formation?->typeformation?->title) }}</h6>
                                                        <h3><a href="{{ ($formation?->boutonlien) }}">{{ ($formation?->title) }}</a></h3>
                                                    </div>
                                                    <div class="link">
                                                        <a href="{{ ($formation?->boutonlien) }}"><i class="flaticon-diagonal-arrow"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- project-section end -->


        <!-- news-section -->
        <section class="news-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="sub-title">{{ $accueilactu?->section }}</span>
                    <h2>{{ $accueilactu?->title }}</h2>
                </div>
                <div class="row clearfix">
                    @foreach($actualites as $actualite)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="upper-box">
                                    <span class="category">{{ $actualite?->section }}</span>
                                    <ul class="post-info clearfix">
                                        <li><span></span> {{ Carbon\Carbon::parse($actualite?->dateactu)->diffForHumans() }}</li>
                                        <li><span>Par</span> <a href="{{ $actualite?->boutonlien }}">{{ $actualite?->managernom }}</a></li>
                                    </ul>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ $actualite?->boutonlien }}"><img src="{{ Storage::url($actualite?->image) }}" alt="" style="max-height: 210px;"></a></figure>
                                    <div class="view-btn"><a href="{{ Storage::url($actualite?->image) }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom-in"></i></a></div>
                                </div>
                                <div class="lower-box">
                                    <h3><a href="{{ $actualite?->boutonlien }}">{!! renderHtmlWP($actualite?->title) !!}</a></h3>
                                    <div class="link"><a href="{{ $actualite?->boutonlien }}"><span>{{ $actualite?->boutontitre }}</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- news-section end -->


        <!-- testimonial-section -->
        <section class="testimonial-section sec-pad" style="margin-bottom: 70px;">
            <div class="pattern-layer" style="background-image: url(img/shape-11.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title light">
                                <span class="sub-title">{{ $accueiltemoin?->section }}</span>
                                <h2>{{ $accueiltemoin?->title }}</h2>
                            </div>
                            <!-- <div class="inner-box">
                                <div class="single-item">
                                    <div class="icon-box"><img src="img/icon-7.png" alt=""></div>
                                    <h5>Avg.Rating 4.8/5 <br>Based on 2,500 Client Reviews</h5>
                                </div>
                                <div class="tag">Excellent Service</div>
                            </div>
                            <div class="link">
                                <a href="index_1.html"><span>Read All Reviews</span></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="testimonial-content">
                            <div class="testimonial-slider">
                                <div class="bxslider">
                                    @foreach($equipes as $equipe)
                                    <div class="slider-content">
                                        <div class="testimonial-block-one">
                                            <figure class="thumb-box"><img src="{{ Storage::url($equipe?->image) }}" alt="{{ ($equipe?->title) }}"></figure>
                                            <div class="inner-box">
                                                <div class="icon-box"><i class="flaticon-quote"></i></div>
                                                <h4>{{ $equipe?->title }}</h4>
                                                <p>{!! renderHtml($equipe?->text) !!}</p>
                                                <h3>{{ $equipe?->nom_prenom }}</h3>
                                                <span class="designation">{{ $equipe?->fonction }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-section end -->

        <!-- main-footer -->
        <section class="main-footer">
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner">
                        <ul class="footer-nav">
                            @foreach($lienfooters as $lienfooter)
                            <li><a href="{{ $lienfooter?->lien_page }}">{{ $lienfooter?->titre }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- main-footer end -->

        <button class="scroll-top scroll-to-target open" data-target="html">
            <i class="flaticon-up-arrow"></i>
        </button>

    </div>


    <!-- jequery plugins -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/isotope.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/nav-tool.js"></script>
    <script src="js/jquery.lettering.min.js"></script>
    <script src="js/jquery.circleType.js"></script>
    <script src="js/bxslider.js"></script>

    <!-- main-js -->
    <script src="js/script.js"></script>



</body><!-- End of .page_wrapper -->

</html>