<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Shop\Entity\Merchandise as MerchandisEloquent;
class MerchandiseController extends Controller
{
    public function merchandiseCreateProcess()
    {
        $merchandise_data=[
            'status'=>'c',
            'name'=>'',
            'name_en'=>'',
            'introduction'=>'',
            'introduction_en'=>'',
            'photo'=>null,
            'price'=>0,
            'remain_count'=>0,
        ];
        $Merchandise=MerchandisEloquent::creat($merchandise_data);
        return redirect('/merchandise/'.$Merchandise->id.'/edit');
    }
}
