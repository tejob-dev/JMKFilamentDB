<?php

use App\Models\Accueilclientitem;

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

function formatRequiredTextList($content, $limit = false){
    $compositeBanniereRequiredList = explode(",", $content);
    if($limit) return $compositeBanniereRequiredList;

    $replaceRequiredList = [];
    foreach ($compositeBanniereRequiredList as $compositeBanniereRequired) {
        $replaceRequiredList[] = "{$compositeBanniereRequired}";
    }
    return $replaceRequiredList;
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
    $str = str_replace('.html', '', $str);
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

function sanitizeJsonString($jsonString, $compositeBanniereRequiredListSimple) {
    foreach(array_reverse($compositeBanniereRequiredListSimple) as $key=>$compositeBanniereRequiredListSimpleIt){
        $jsonString = str_replace($compositeBanniereRequiredListSimpleIt.":", '"'.$compositeBanniereRequiredListSimpleIt.'":', $jsonString);
    }
    // Replace single quotes with double quotes
    $jsonString = str_replace("\n", '', $jsonString);
    // removeSpaces($jsonString);
    $jsonString = preg_replace('/,\s*([\]}])/m', '$1', $jsonString);
    $jsonString = preg_replace('/"\[/', '[', $jsonString);
    $jsonString = preg_replace('/\]"/', ']', $jsonString);
    return ($jsonString);
}

function sanitizeJsonStringExt($jsonString) {
    // Replace single quotes with double quotes
    $jsonString = str_replace("'", '"', $jsonString);

    // Remove trailing commas before closing braces and brackets
    $jsonString = preg_replace('/,\s*([\]}])/m', '$1', $jsonString);

    // Ensure special characters are properly escaped within strings
    $jsonString = preg_replace_callback('/"([^"\\\\]*(?:\\\\.[^"\\\\]*)*)"/', function($matches) {
        return '"' . addcslashes($matches[1], "\r\n\t\"\\") . '"';
    }, $jsonString);

    return $jsonString;
}

function removeSpaces(&$content) {
    do {
        $content = str_replace(' ', '', $content);
    } while (preg_match("/\\s/", $content));
}

function removeSpacesFromArray(&$array) {
    foreach ($array as &$value) {
        if (is_array($value)) {
            removeSpacesFromArray($value);
        } else {
            $value = str_replace(' ', '', $value);
        }
    }
}

// Method to format the 'boutonlien' attribute
function formatBoutonLien($replacer, $boutonlien, $title)
{
    // Add your formatting logic here
    // For example, you can prepend 'http://' if it's not present
    $slug = $boutonlien;
    if($boutonlien != null){
        $slug = formatSlug($boutonlien, "$replacer", ".html");
    }else{
        $slug = formatSlug($title, "$replacer", ".html");
    }
    // Other formatting logic can be added here
    return $slug;
}

function serializeButtonurlFunc($data, $type){
    $type = str_replace("/", "", $type);
    // dd($type, $data);
    if(preg_match("/\/$type\//i", $data['boutonlien']) == false){
        $data['boutonlien'] = formatBoutonLien("/$type/", $data['boutonlien'], $data['title']);
    }
    return $data;
}

