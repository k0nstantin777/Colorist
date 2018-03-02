<?php

namespace App\Includes\Classes;

/**
 * Возвращает дату в разных форматах
 *
 * @author Noskov Konstantin <noskov.kos@gmail.com>
 */
class FormatData
{
    public function all($timestamp = '')
    {
        return date("H:i d.m.Y", $this->getTimestamp($timestamp));
    }
    
    public function time($timestamp = '')
    {
        return date("H:i", $this->getTimestamp($timestamp));
    }
    
    public function data($timestamp = '')
    {
        return date("d-m-Y", $this->getTimestamp($timestamp));
    }
    
    public function day ($timestamp = '')
    {
        return date("d", $this->getTimestamp($timestamp));
    }
    
    public function month ($timestamp = '')
    {
        $month = date("M", $this->getTimestamp($timestamp));
        return strtoupper($month);
    }
    
    public function dataLocale($timestamp = '')
    {
        return date('Y-m-d\TH:i:s', $this->getTimestamp($timestamp));
    }
       
    private function getTimestamp($timestamp)
    {
        if($timestamp === ''){
            return time();
        }
        return strtotime($timestamp);
    }
}
