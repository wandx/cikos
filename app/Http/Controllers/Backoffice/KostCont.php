<?php

namespace App\Http\Controllers\Backoffice;

use App\Libs\Bo;
use App\Models\Facility;
use App\Models\Kost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class KostCont extends Controller
{
    // Kost
    public function lists(){

    }

    public function add(){

    }

    public function store(Request $req){
        $data = [
            'name' => $req->name,
            'slug' => Bo::alphanumeric_filter($req->name),
            'seen' => 0,
            'address' => $req->address,
            'district_id' => $req->district_id,
            'latitude' => $req->latitude,
            'longitude' => $req->longitude,
            'width' => $req->width,
            'length' => $req->length,
            'user_id' => $req->user_id
        ];

        $kost = Kost::create($data);

        // Facility
        $ids = [];
        if($req->facilities != null){
            foreach($req->facilities as $f){
                $id = Facility::firstOrCreate([
                    'name' => Bo::alphanumeric_filter($f),
                    'display_name' => $f
                ]);
                array_push($ids,$id);
            }
            $kost->facilities()->sync($ids);
        }

        // Public facilities
        foreach ($req->public_facilities_name as $k=>$name){
            foreach ($req->public_facilities_distance as $k2=>$distance){
                if($k == $k2){
                    $data = [
                        'name' => Bo::alphanumeric_filter($name),
                        'distance' => $distance,
                        'display_name' => $name
                    ];
                    $kost->public_facilities()->create($data);
                }

            }
        }

        // Rents
        foreach ($req->rent_type as $k=>$type){
            foreach($req->rent_price as $k2=>$price){
                if($k == $k2){
                    $data = [
                        'type' => $type,
                        'price' => $price
                    ];

                    $kost->rents()->create($data);
                }
            }
        }

        // Pictures
        foreach($req->pictures as $k=>$p){
            foreach ($req->picture_type as $k2=>$pt){
                if($k == $k2){
                    $name = str_random(10);
                    $path = 'uploads/images/';
                    $thumb = 'thumb_'.$name.'.jpg';
                    $ori = $name.'.jpg';

                    Image::make($p)->save($path.$ori);
                    Image::make($p)->save($path.$thumb)->fit(200,200);

                    $data = [
                        'thumbnail' => $path.$thumb,
                        'original' => $path.$ori,
                        'type' => $pt
                    ];

                    $kost->pictures()->create($data);
                }
            }
        }
    }

    public function edit($id){

    }

    public function update(Request $req,$id){

    }

    public function destroy($id){

    }

    // Facility

    public function facility(){

    }

    public function store_facility(Request $req){

    }

    public function delete_facility($id){

    }

    public function edit_facility(Request $req,$id){

    }

    // Public Facility

    public function public_facility(){

    }

    public function store_public_facility(Request $req){

    }

    public function delete_public_facility($id){

    }

    public function edit_public_facility(Request $req,$id){

    }
}
