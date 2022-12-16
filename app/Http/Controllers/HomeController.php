<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class HomeController extends Controller
{
    public function index()
    {
        $news_head = $this->get_news();
        $url = $this->get_kakao_url();
        $sen_block = $this->get_senBlock();
        $sen_other = $this->get_otherSensor();
        $sen_total = $this->get_senTotal();

        return view('index', ['head' => $news_head, 'sen_block' => $sen_block, "sen_other" => $sen_other, "sen_total" => $sen_total, "kakao_url" => $url]);
    }

    public function get_kakao_url()
    {
        $url = DB::select('SELECT kakao_url FROM kakao_map LIMIT 1;');

        return $url;
    }

    public function get_news()
    {
        $news_head = DB::select('SELECT nh.keyword, nc.news_title, nc.news_href FROM news_head nh LEFT JOIN news_content nc ON nh.id = nc.head_id ORDER BY nc.id ASC LIMIT 11;');

        return $news_head;
    }

    public function get_news_api()
    {
        $news_head = DB::select('SELECT nh.keyword, REPLACE(REPLACE(nc.news_title, "\'", "%27"), "\"", "%22") as news_title, REPLACE(REPLACE(nc.news_href, "\'", "%27"), "\"", "%22") as news_href FROM news_head nh LEFT JOIN news_content nc ON nh.id = nc.head_id ORDER BY nc.id ASC LIMIT 11;');

        return $news_head;
    }

    public function get_senBlock()
    {
        $arr = array(
            "sen_move" => "현관문",
            "sen_kcn" => "주방",
            "sen_livroom" => "거실",
            "sen_toilet1" => "화장실1",
            "sen_toilet2" => "화장실2",
            "sen_room1" => "방1",
            "sen_room2" => "방2",
            "sen_room3" => "방3",
            "sen_room4" => "방4",
            "sen_veranda1" => "베란다1",
            "sen_veranda2" => "베란다2"
        );

        $qry = "";
        foreach ($arr as $key => $t){
            $qry .= "UNION ALL (SELECT send_date AS 'send_date', '".$key."' AS 'c', ".$key." AS 'v', '".$t."' AS 'loc'  FROM sen_info ORDER BY id DESC LIMIT 1) ";
        }

        $qry = substr($qry, 10);

        $sen_block = DB::select($qry);

        return $sen_block;
    }

    public function get_otherSensor()
    {
        $arr = array(
            "sen_temp" => "온도",
            "sen_hum" => "습도",
            "sen_gassvalve" => "가스벨브"
        );

        $qry = "";
        foreach ($arr as $key => $t){
            $qry .= "UNION ALL (SELECT send_date AS 'send_date', '".$key."' AS 'c', ".$key." AS 'v', '".$t."' AS 'loc'  FROM sen_info ORDER BY id DESC LIMIT 1) ";
        }

        $qry = substr($qry, 10);

        $sen_other = DB::select($qry);

        return $sen_other;
    }

    public function get_senTotal()
    {
        $arr = array(
            "sen_temp" => "온도",
            "sen_hum" => "습도",
            "sen_gassvalve" => "가스벨브",
            "sen_move" => "현관문",
            "sen_kcn" => "주방",
            "sen_livroom" => "거실",
            "sen_toilet1" => "화장실1",
            "sen_toilet2" => "화장실2",
            "sen_room1" => "방1",
            "sen_room2" => "방2",
            "sen_room3" => "방3",
            "sen_room4" => "방4",
            "sen_veranda1" => "베란다1",
            "sen_veranda2" => "베란다2"
        );

        $qry = "";
        foreach ($arr as $key => $t){
            $qry .= "UNION ALL (SELECT send_date AS 'send_date', '".$key."' AS 'c', ".$key." AS 'v', '".$t."' AS 'loc'  FROM sen_info ORDER BY id DESC LIMIT 1) ";
        }

        $qry = substr($qry, 10);

        $sen_total = DB::select($qry);

        return $sen_total;
    }

    public function get_newsList()
    {
        $sen_block = $this->get_senBlock();

        return response()->json($sen_block);
    }

    public function get_newsList_other()
    {
        $sen_other = $this->get_otherSensor();

        return response()->json($sen_other);
    }

    public function get_newsList_infoList()
    {
        $sen_total = $this->get_senTotal();

        return response()->json($sen_total);
    }

    public function get_newsList_map()
    {
        $url = $this->get_kakao_url();

        return response()->json($url);        
    }

    public function get_newsList_news()
    {
        $news = $this->get_news_api();

        return response()->json($news);        
    }
}
