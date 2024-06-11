<!DOCTYPE html>
<html lang="fr">

@php 

$setting = App\Models\Setting::first();
$servicecur = App\Models\Accueilserviceitem::find($slug);
$listContent = $servicecur->contentViews;//->leftJoin("content_view_types", "content_views.content_view_type_id", "=", "content_view_types.id");
$banniere = $listContent->filter(function ($contentView) {
        return preg_match("/BANNIERE/i", $contentView->contentViewType->title);
    })->first();
$sidebars = $listContent->filter(function ($contentView) {
        return preg_match("/BARRE LATERAL/i", $contentView->contentViewType->title);
    });
$bodys = $listContent->filter(function ($contentView) {
        return preg_match("/CORPS/i", $contentView->contentViewType->title);
    });

@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ $servicecur?->title.' | '.$setting->nom_site }}</title>

    @include("layouts.metadata")

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        @include("layouts.header")


        <!-- page-title -->
        {!! renderHtml($banniere?->content) !!}
        <!-- page-title end -->

        <!-- service-details -->
        <section class="service-details sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            @foreach($bodys as $bodyIt)
                            {!! renderHtml($bodyIt?->content) !!}
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar">
                            @foreach($sidebars as $sidebarIt)
                            {!! renderHtml($sidebarIt?->content) !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-details end -->


        @include("layouts.footer")


    </div>

    @include("layouts.jsscripts")



</body><!-- End of .page_wrapper -->

</html>