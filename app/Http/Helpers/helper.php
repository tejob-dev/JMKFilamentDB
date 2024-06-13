<?php

function renderHtml($content){
    //$setting->list_social
    // $content = str_replace('<strong>', '', str_replace('</strong>', '', $content));
    // $content = str_replace('&nbsp;', '', $content);
    return html_entity_decode(htmlspecialchars_decode(str_replace('<pre>', '', str_replace('</pre>', '', $content))));
}

function renderHtmlWP($content){
    //$setting->list_social
    return html_entity_decode(htmlspecialchars_decode(str_replace('<pre>', '', str_replace('</pre>', '', str_replace('<p>', '', str_replace('</p>', '', $content))))));
}

function makeWordLikeId($content){
    return str_replace(" ", "", strtolower($content));
}

function formatSlug($str, $prefix = null, $suffix = null) {
    // Convert the string to lowercase
    $str = strtolower($str);

    // Replace accented characters with their non-accented counterparts
    $accented_chars = array(
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
        'Æ' => 'AE', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
        'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
        'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
        'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
        'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
        'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'd',
        'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y',
        'þ' => 'th', 'ÿ' => 'y'
    );
    $str = strtr($str, $accented_chars);

    // Replace spaces and other special characters with hyphens
    $str = preg_replace('/[^a-z0-9]+/', '-', $str);
    $str = trim($str, '-'); // Remove any leading or trailing hyphens
    
    // Ensure the string ends with '.html'
    if($suffix){
        $suffixs = str_replace(".", "\.", $suffix);
        if (preg_match("/$suffixs/i", $str) == false) {
            $str .= $suffix;
        }
    }

    // Prepend '/services/' if not already present
    if($prefix){
        $prefixs = str_replace("/", "\/", $prefix);
        if (preg_match("/$prefixs/i", $str) == false) {
            $str = $prefix . $str;
        }
    }

    // Prepend '/' if not already present at the start
    if (substr($str, 0, 1) !== '/') {
        $str = '/' . $str;
    }

    $str = preg_replace('/\/\//', '/', $str);

    return $str;
}
