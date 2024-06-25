<!DOCTYPE html>
<html lang="fr">

@php 

$setting = App\Models\Setting::first();
$servicecur = App\Models\Actualite::find($slug);
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
        @php 


            
            $ItContent = $banniere?->content;
            $mycompo = App\Models\CompositeView::find($banniere?->composite_view_id);
            $compositeBanniereContent = $mycompo?->content;
            
            
            if($mycompo){
                $compositeBanniereRequiredList = formatRequiredTextList($mycompo?->required);
                $compositeBanniereRequiredListSimple = formatRequiredTextList($mycompo?->required, true);

                if(preg_match("/\{content\}/i", $compositeBanniereContent) == true){
                    $content = explode(";", $compositeBanniereContent)[0];
                    $content2 = explode(";", $compositeBanniereContent)[1];
                    $items = json_decode(sanitizeJsonString($ItContent, $compositeBanniereRequiredListSimple), true);
                    //dd($items);
                    $newContent = "$content2";
                    $newContentList = [];
                    foreach ($items as $item) {
                        foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                            $newContent = str_replace(
                                "{".$compositeBanniereRequiredListIt."}",
                                $item[$compositeBanniereRequiredListSimple[$key]],
                                $newContent
                            );
                        }
                        $newContentList[] = $newContent;
                        $newContent = "$content2";
                    }
                    $lastContent = str_replace("{content}",implode("\n", $newContentList),$content);
                    foreach ($items as $item) {
                        foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                            $lastContent = str_replace(
                                "{".$compositeBanniereRequiredListIt."}",
                                $item[$compositeBanniereRequiredListSimple[$key]],
                                $lastContent
                            );
                        }
                        
                    }
                    echo renderHtml($lastContent);
                }else{
                    $items = json_decode(sanitizeJsonString($ItContent, $compositeBanniereRequiredListSimple), true);
                    foreach ($items as $item) {
                        foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                            $compositeBanniereContent = str_replace(
                                "{".$compositeBanniereRequiredListIt."}",
                                $item[$compositeBanniereRequiredListSimple[$key]],
                                $compositeBanniereContent
                            );
                        }
                        
                    }
                    echo renderHtml($compositeBanniereContent);
                }
            }
        @endphp
        <!-- page-title end -->

        <!-- service-details -->
        <section class="service-details sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            @foreach($bodys as $bodyIt)
                                @php 
                                    
                
                                        $ItContent = $bodyIt?->content;
                                        $mycompo = App\Models\CompositeView::find($bodyIt->composite_view_id);
                                        $compositeBanniereContent = $mycompo?->content;
                                        
                                        
                                        if($mycompo){
                                            $compositeBanniereRequiredList = formatRequiredTextList($mycompo?->required);
                                            $compositeBanniereRequiredListSimple = formatRequiredTextList($mycompo?->required, true);

                                            if(preg_match("/\{content\}/i", $compositeBanniereContent) == true){
                                                $content = explode(";", $compositeBanniereContent)[0];
                                                $content2 = explode(";", $compositeBanniereContent)[1];
                                                $items = json_decode(sanitizeJsonString($ItContent, $compositeBanniereRequiredListSimple), true);
                                                //dd($items);
                                                $newContent = "$content2";
                                                $newContentList = [];
                                                foreach ($items as $item) {
                                                    foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                                                        $newContent = str_replace(
                                                            "{".$compositeBanniereRequiredListIt."}",
                                                            $item[$compositeBanniereRequiredListSimple[$key]],
                                                            $newContent
                                                        );
                                                    }
                                                    $newContentList[] = $newContent;
                                                    $newContent = "$content2";
                                                }
                                                $lastContent = str_replace("{content}",implode("\n", $newContentList),$content);
                                                foreach ($items as $item) {
                                                    foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                                                        $lastContent = str_replace(
                                                            "{".$compositeBanniereRequiredListIt."}",
                                                            $item[$compositeBanniereRequiredListSimple[$key]],
                                                            $lastContent
                                                        );
                                                    }
                                                    
                                                }
                                                echo renderHtml($lastContent);
                                            }else{
                                                $items = json_decode(sanitizeJsonString($ItContent, $compositeBanniereRequiredListSimple), true);
                                                foreach ($items as $item) {
                                                    foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                                                        $compositeBanniereContent = str_replace(
                                                            "{".$compositeBanniereRequiredListIt."}",
                                                            $item[$compositeBanniereRequiredListSimple[$key]],
                                                            $compositeBanniereContent
                                                        );
                                                    }
                                                    
                                                }
                                                echo renderHtml($compositeBanniereContent);
                                            }
                                        }
                                        
                                    
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar">
                            @php 
                                foreach($sidebars as $sidebarIt){
            
                                    $ItContent = $sidebarIt?->content;
                                    $mycompo = App\Models\CompositeView::find($sidebarIt->composite_view_id);
                                    $compositeBanniereContent = $mycompo?->content;
                                    
                                    
                                    if($mycompo){
                                        $compositeBanniereRequiredList = formatRequiredTextList($mycompo?->required);
                                        $compositeBanniereRequiredListSimple = formatRequiredTextList($mycompo?->required, true);

                                        if(preg_match("/\{content\}/i", $compositeBanniereContent) == true){
                                            $content = explode(";", $compositeBanniereContent)[0];
                                            $content2 = explode(";", $compositeBanniereContent)[1];
                                            $items = json_decode(sanitizeJsonString($ItContent, $compositeBanniereRequiredListSimple), true);
                                            
                                            $newContent = "$content2";
                                            $newContentList = [];
                                            foreach ($items as $item) {
                                                foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                                                    $newContent = str_replace(
                                                        "{".$compositeBanniereRequiredListIt."}",
                                                        $item[$compositeBanniereRequiredListSimple[$key]],
                                                        $newContent
                                                    );
                                                }
                                                $newContentList[] = $newContent;
                                                $newContent = "$content2";
                                            }
                                            $lastContent = str_replace("{content}",implode("\n", $newContentList),$content);
                                            foreach ($items as $item) {
                                                foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                                                    $lastContent = str_replace(
                                                        "{".$compositeBanniereRequiredListIt."}",
                                                        $item[$compositeBanniereRequiredListSimple[$key]],
                                                        $lastContent
                                                    );
                                                }
                                                
                                            }
                                            echo renderHtml($lastContent);
                                        }else{
                                            $items = json_decode(sanitizeJsonString($ItContent, $compositeBanniereRequiredListSimple), true);
                                            foreach ($items as $item) {
                                                foreach($compositeBanniereRequiredList as $key=>$compositeBanniereRequiredListIt){
                                                    $compositeBanniereContent = str_replace(
                                                        "{".$compositeBanniereRequiredListIt."}",
                                                        $item[$compositeBanniereRequiredListSimple[$key]],
                                                        $compositeBanniereContent
                                                    );
                                                }
                                                
                                            }
                                            echo renderHtml($compositeBanniereContent);
                                        }
                                    }
                                }
                            @endphp
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