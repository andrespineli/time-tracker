<?php

declare(strict_types=1);

namespace TimeTracker;

class Config
{
    public static function keys(): array
    {
        $file = json_decode(file_get_contents('tracker.json'), true);
        $words = explode(',', $file['monitoring']);
        return array_map('trim', $words);
    }
    
    public static function register($register, $fileName)
    {  
        file_put_contents("./result/{$fileName}.json", $register);
    }
}
