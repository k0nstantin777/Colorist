<?php

/**
 * Определение IP пользователя
 * @return string
 */
function getIp()
{
    if ( getenv('REMOTE_ADDR') && strcasecmp( getenv('REMOTE_ADDR'), 'unknown') )
        return getenv("REMOTE_ADDR");
    elseif ( !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
        return $_SERVER['REMOTE_ADDR'];
    else
        return "unknown";
}



/**
 * Определние города по IP
 * @param string $ip
 * @return string
 */
function detectCity($ip) {
        
        $default = 'UNKNOWN';
 
        if (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost')
            $ip = '8.8.8.8';
 
        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }
 
        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
    }
    
    
/**
 *  Выбор правильного склонения слова "комментарий" в зависимости от количества
 *  1,21,31,41,51 и т.д. комментариЙ
 *  2,3,4,22,23,24 и т.д. комментариЯ
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. комментариЕВ
 *      
 * @param int $count
 * @return string
 */    
function commentsCountEnding($count){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        return 'й';
    }
    if ($mod >= 2 && $mod <= 4 && $count != 12 && $count != 13 && $count != 14)  {
        return 'я';
    }
    
    return 'ев';
        
}  

/**
 *  Выбор правильного склонения слова "сообщение" в зависимости от количества
 *  1,21,31,41,51 и т.д. сообщениЕ
 *  2,3,4,22,23,24 и т.д. сообщениЯ
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. сообщениЙ
 *      
 * @param int $count
 * @return string
 */    
function messagesCountEnding($count){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        return 'е';
    }
    if ($mod >= 2 && $mod <= 4 && $count != 12 && $count != 13 && $count != 14)  {
        return 'я';
    }
    
    return 'й';
        
} 

/**
 *  Выбор правильного склонения слова "тег" в зависимости от количества
 *  1,21,31,41,51 и т.д. тег
 *  2,3,4,22,23,24 и т.д. тегA
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. тегОВ
 *      
 * @param int $count
 * @return string
 */    
function tagsCountEnding($count){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        return '';
    }
    if ($mod >= 2 && $mod <= 4 && $count != 12 && $count != 13 && $count != 14)  {
        return 'а';
    }
    
    return 'ов';
        
}  

/**
 *  Выбор правильного склонения слова "категория" в зависимости от количества
 *  1,21,31,41,51 и т.д. категориЯ
 *  2,3,4,22,23,24 и т.д. категориИ
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. категориЙ
 *      
 * @param int $count
 * @return string
 */    
function catsCountEnding($count){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        return 'я';
    }
    if ($mod >= 2 && $mod <= 4 && $count != 12 && $count != 13 && $count != 14)  {
        return 'и';
    }
    
    return 'й';
        
}  

/**
 *  Выбор правильного склонения слова "заявка" в зависимости от количества
 *  1,21,31,41,51 и т.д. заявка
 *  2,3,4,22,23,24 и т.д. звявки
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. заявок
 *
 * @param int $count
 * @return string
 */
function ordersCountEnding($count){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        return 'ка';
    }
    if ($mod >= 2 && $mod <= 4 && $count != 12 && $count != 13 && $count != 14)  {
        return 'ки';
    }

    return 'ок';

}

/**
 *  Выбор правильного склонения слова "отзыв" в зависимости от количества
 *  1,21,31,41,51 и т.д. отзыв
 *  2,3,4,22,23,24 и т.д. отзывА
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. отзывОВ
 *
 * @param int $count
 * @return string
 */
function reviewCountEnding($count){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        return '';
    }
    if ($mod >= 2 && $mod <= 4 && $count != 12 && $count != 13 && $count != 14)  {
        return 'а';
    }

    return 'ов';

}

/**
 *  Выбор правильного склонения слова "новый" в зависимости от количества и контекста
 *  1,21,31,41,51 и т.д. МР новый, ЖР новая, СР новое
 *  2,3,4,22,23,24 и т.д. МР новыx, ЖР новых, СР новых
 *  0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 и т.д. МР новыx, ЖР новых, СР новых
 *
 * @param int $count
 * @param int desline
 * @return string
 */
function newCountEnding($count, $desline){
    $mod = $count%10;
    if ($mod == 1 && $count != 11){
        if($desline === 1){
            return 'ый';
        }
        if($desline === 2){
            return 'ая';
        }
        if($desline === 2){
            return 'ое';
        }

    }

    return 'ых';

}
