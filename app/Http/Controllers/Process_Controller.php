<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// お応募商号マスタ
use App\Models\oubo_mst;
use App\Models\content_msts;

class Process_Controller extends Controller
{
    public function index() {
        return view("index");
    }

    public function itiran() {
        $Shibo_name = DB::table('oubo_msts')->get();
        return view("itiran",[
            'shibo_content' => "",
            'Shibo_name' => $Shibo_name
        ]);
    }

    public function regit_proces(Request $req) {
        // 応募テーブル
        $oubo_mst = new oubo_mst();

        // 必要情報格納テーブル
        $content_msts = new content_msts();

        // 求人の志望名
        $Shibo_Name =  $req->shibo_name;

        // 質問
        // $question_naiyo = $req->all();
        $question_naiyo = $req->input('question_title_name');
        // 内容
        $content = $req->input('question_content_name');

        // 応募情報登録
        $oubo_mst->create([
            'Shibo_name' => $Shibo_Name,
        ]);

        // 最終商号ID（商号）
        $Last_Shogo_ID = DB::table('oubo_msts')->latest('id')->first();
        $Shogo_ID = $Last_Shogo_ID->id;



        // 質問内容テーブル
        $Last_content_msts_ID = DB::table('content_msts')->latest('id')->first();

        if($Last_content_msts_ID != NULL) {
            $content_msts_ID = $Last_content_msts_ID->id;
        } else {
            $content_msts_ID = 1;
        }


        $i = 0;
        // 内容の格の繰り返し
        foreach ($question_naiyo as $key => $value) {
            $content_msts->create([
                'oubo_id' => $Shogo_ID,
                'question_content' => $value,
                'Content' => $content[$i],
                'html_id' => "qs_sid".$Shogo_ID."_qs_tcid".strval($i+$content_msts_ID+1),
            ]);
            $i++;
        }

        return view("index");
    }

    public function select_shogo_get(Request $req) {
        // $Shibo_name = DB::table('oubo_msts')->get();
        // return view("itiran",['Shibo_name' => $Shibo_name]);
        $shogo_id =  $req->select_shogo;
        $oubo_content = DB::select('SELECT * FROM oubo_msts as oubo LEFT JOIN content_msts as content on oubo.id = content.oubo_id WHERE content.oubo_id = '.$shogo_id.'');
        // foreach($Shibo_name as $item) {
        //     // echo $item["id"]." ";
        //     foreach
        // }
        // var_dump($Shibo_name);
        $Shibo_name = DB::table('oubo_msts')->get();
        return view('itiran', [
            'shibo_content' => $oubo_content,
            'Shibo_name' => $Shibo_name
        ]);
    }



}
