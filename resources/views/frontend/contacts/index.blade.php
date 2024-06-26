<!DOCTYPE html>
<html lang="fr">

@php 

$setting = App\Models\Setting::first();
$servicecur = App\Models\Contact::find($slug);
$listContent = $servicecur->contentViews;//->leftJoin("content_view_types", "content_views.content_view_type_id", "=", "content_view_types.id");
$banniere = $listContent->filter(function ($contentView) {
        return preg_match("/BANNIERE/i", $contentView->contentViewType->title);
    })->first();

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

        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="upper-box">
                                                <div class="light-icon"><i class="flaticon-headphone"></i></div>
                                                <h3>Contact</h3>
                                                <p>{{ $setting->contact_site }}</p>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="upper-box">
                                                <div class="light-icon"><i class="flaticon-mail"></i></div>
                                                <h3>Envoyez-nous un email</h3>
                                                <p>{{ $setting->email_site }}</p>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="upper-box">
                                                <div class="light-icon"><i class="flaticon-location-1"></i></div>
                                                <h3>Addresse</h3>
                                                <p>{{ $setting->position_site }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- contact-style-two -->
        <section class="contact-style-two">
            <div class="outer-container sec-pad">
                <div class="pattern-layer">
                    <div class="pattern-1"></div>
                    <div class="pattern-2"></div>
                </div>
                <!-- <figure class="image-layer"><img src="img/contact-1.png" alt=""></figure> -->
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                            <div class="sec-title light">
                                <!-- <span class="sub-title">Drop a Line</span> -->
                                <h2>{{ ($servicecur->title) }}</h2>
                                <p>{!! renderHtml($servicecur->text) !!}</p>
                            </div>
                            <div class="content-inner">
                                @foreach( App\Models\Accueilserviceitem::get()->take(2) as $serviceit )
                                <div class="news-block-two" >
                                    <div class="inner-box" style="background-color: white;padding: 12px;min-height: auto;">
                                        <div class="content-box">
                                            <h3><a href="#">{{ limitText($serviceit->title, 40)}}</a></h3>
                                            <p>{!! limitText(renderHtml($serviceit->text), 150) !!}</p>
                                            <div class="link"><a href="{{ $serviceit->boutonlien }}"><span>{{ $serviceit->boutontitre }}</span></a></div>
                                            <!-- <i class="flaticon-agriculture" style="font-size: 50px;"></i> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
                                <div class="form-inner">
                                    <form method="post" action="{{ route('front.all-contact-data.create') }}" id="contact-form" class="default-form"> 
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <label>Nom et prénom*</label>
                                                <input type="text" name="nom_prenoms" placeholder="" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <label>Numéro de téléphone*</label>
                                                <input type="text" name="phone" placeholder="" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <label>Addresse email*</label>
                                                <input type="email" name="email" required="" placeholder="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <label>Le sujet</label>
                                                <input type="text" name="sujet" required="" placeholder="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label>Selectionner un service:</label>
                                                <div class="select-box">
                                                    <select name="service" class="selectmenu">
                                                        <option>---</option>
                                                        @foreach( App\Models\Accueilserviceitem::pluck("title", "id") as $serviceit )
                                                        <option value="{{$serviceit}}">{{$serviceit}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label>Message</label>
                                                <textarea name="message" placeholder=""></textarea>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <div class="check-box">
                                                    <input class="check" type="checkbox" name="lu_approuve" id="checkbox1">
                                                    <label for="checkbox1">Cliquez ici pour confirmer que vous avez lu notre politique de confidentialité*</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <button class="theme-btn btn-two" type="submit" name="submit-form"><span>Soumettre</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->


        @include("layouts.footer")


    </div>

    @include("layouts.jsscripts")



</body><!-- End of .page_wrapper -->

</html>