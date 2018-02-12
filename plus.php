<?php

function googlePlusVideo($userId, $videoId){
    
    $ch = curl_init('https://plus.google.com/photos/photo/' . $userId . '/' . $videoId);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true
    ]);
    $source = curl_exec($ch);
    curl_close($ch);
    
    preg_match_all('/https:\/\/lh3.googleusercontent.com\/(.*?)\\\u003d(m[0-9]+)/', $source, $videos);
    
    $videoLinks = [];
    foreach ($videos[2] as $key => $quality){
        if ($quality == 'm18'){
            $videoLinks['360p'] = 'https://lh3.googleusercontent.com/' . $videos[1][$key] . '=m18';
        }
        if ($quality == 'm22'){
            $videoLinks['720p'] = 'https://lh3.googleusercontent.com/' . $videos[1][$key] . '=m22';
        }
        if ($quality == 'm37'){
            $videoLinks['1080p'] = 'https://lh3.googleusercontent.com/' . $videos[1][$key] . '=m37';
        }
    }
    
    return $videoLinks;

}
