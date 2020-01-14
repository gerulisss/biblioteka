<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    const SORT = 
    [

        'az' => 'A-Z',
        'za' => 'Z-A',
        'azt' => 'Virsuje naujausi',
        'zat' => 'Virsuje seniausi'

    ];

    
    public function bookAuthor()
    {
    return $this->belongsTo('App\Author', 'author_id', 'id');
    }

    public static function getSort() 
    {
        $collection = collect();
        foreach(self::SORT as $key => $val) {
            $collection->add((object)['value' => $key, 'text' => $val]);
        }
        return $collection;
    }

}
