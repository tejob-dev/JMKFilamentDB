@php 

$setting = App\Models\Setting::first();

@endphp


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
                                <li class="current dropdown">
                                    <div class="">
                                        <span class="ag-advans_globe icon"></span>
                                        <a href="#">Nous découvrir</a>
                                    </div>
                                    <ul>
                                        <li><a href="notre-mission.html">Notre mission</a></li>
                                        <li><a href="notre-vision.html">Notre vision</a></li>
                                        <li><a href="nos-valeurs.html">Nos valeurs</a></li>
                                        <li><a href="notre-equipe.html">Notre equipe</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <div class="">
                                            <span class="ag-advans_profil icon"></span>
                                            <a href="#">Notre métier</a>
                                    </div>
                                    <ul>
                                        <li><a href="nos-services.html">Nos services</a></li>
                                        <li><a href="nos-produits.html">Nos produits</a></li>
                                        <li><a href="notre-impact.html">Notre impact</a></li>
                                        <li><a href="nos-projetsactivits.html">Nos projets/activités</a></li>
                                    </ul>
                                    <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                </li>
                                <!-- <li class="dropdown"><a href="#">Services</a>
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
                                </li> -->
                                <li class="dropdown">
                                    <div class="">
                                            <span class="ag-advans_aboutus icon"></span>
                                            <a href="#">Carrière</a>
                                    </div>
                                    <ul>
                                        <li><a href="notre-culture.html">Notre culture</a></li>
                                        <li><a href="nos-opportunits.html">Nos opportunités</a></li>
                                        <li><a href="nous-rejoindre.html">Nous réjoindre</a></li>
                                    </ul>
                                    <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                </li>
                                <li class="dropdown">
                                    <div class="">
                                            <span class="ag-advans_media icon"></span>
                                            <a href="#">Media</a>
                                    </div>
                                    <ul>
                                        <li><a href="actualites.html">Actualités</a></li>
                                        <li><a href="publications.html">Publications</a></li>
                                        <li><a href="photos.html">Photos</a></li>
                                        <li><a href="videos.html">Vidéos</a></li>
                                    </ul>
                                    <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                </li>
                                <li class="dropdown">
                                    <div class="">
                                            <span class="ag-advans_team icon"></span>
                                            <a href="#">Consortium</a>
                                    </div>
                                    <ul>
                                        <li><a href="jmk-consulting-caompany.html">JMK Consulting Caompany</a></li>
                                        <li><a href="genie-bio.html">Génie Bio</a></li>
                                        <li><a href="sicadevd.html">Sicadevd</a></li>
                                    </ul>
                                    <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>
                                </li>
                                <!-- <li><a href="actualites.html">Actualités</a></li> -->
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