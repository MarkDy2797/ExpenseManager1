<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\DataUser;
use App\DataEc;

class MainController extends Controller
{
    public function storeItem(Request $req){
        $data = new Data();
        $data->displayname =  $req->displayname;
        $data->description =  $req->description;
        $data->save();
        return $data;   

    }
    public function getItems(Request $req){
        $data = Data::all();
        return $data;

    }
    public function deleteItem(Request $req){
        $data = Data::find($req->iid)->delete();
    }
    public function storeItemUser(Request $req){
        $data = new DataUser();
        $data->name =  $req->name;
        $data->emailaddress =  $req->emailaddress;
        $data->urole =  $req->urole;
        $data->save();
        return $data;   

    }
    public function getItemsUser(Request $req){
        $data = DataUser::all();
        return $data;

    }
    public function storeItemEc(Request $req){
        $data = new DataEc();
        $data->displaynameec =  $req->displaynameec;
        $data->descriptionec =  $req->descriptionec;
        $data->save();
        return $data;   

    }
    public function getItemsEc(Request $req){
        $data = DataEc::all();
        return $data;

    }
}
