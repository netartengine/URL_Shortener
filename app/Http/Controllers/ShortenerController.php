<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortenerModel;
use DB;

class ShortenerController extends Controller
{
    public $protocol;
    public $host;

    function __construct()
    {
        $this->protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
        $this->host = $_SERVER['HTTP_HOST'];
    }


    public function shortenUrl(Request $request){
        $source = $request->get('source');
        $urlExists = ShortenerModel::where('source',$source)->first();

        if($urlExists){
            $shortCode = $urlExists['short_code'];
        }else{
            $shorten = new ShortenerModel();
            $shorten->source = $source;
            $shortCode = self::random_hash(8);
            $shorten->short_code = $shortCode;
            $shorten->save();
        }

        return response()->json([
            'success' => true,
            'source'  => $source,
            'shorten' => $this->protocol."://".$this->host.'/'.$shortCode
        ]);
    }


    public function goToSource($short_code){
        $link = ShortenerModel::where('short_code',$short_code)->firstOrFail();

        return redirect($link->source);
    }

    function random_hash($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }


    function __destruct()
    {
        unset($this->protocol);
        unset($this->host);
    }
}
