<?php

function renderHtml($content){
    //$setting->list_social
    return html_entity_decode(htmlspecialchars_decode(str_replace('<pre>', '', str_replace('</pre>', '', $content))));
}

function renderHtmlWP($content){
    //$setting->list_social
    return html_entity_decode(htmlspecialchars_decode(str_replace('<pre>', '', str_replace('</pre>', '', str_replace('<p>', '', str_replace('</p>', '', $content))))));
}

function makeWordLikeId($content){
    return str_replace(" ", "", strtolower($content));
}