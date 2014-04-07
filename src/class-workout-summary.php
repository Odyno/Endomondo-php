<?php
/**
Copyright 2012  Alessandro Staniscia  (email : alessandro@staniscia.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

User: staniscia
Date: 03/04/14
Time: 23.49

 */
/**
 * Class Workout_Summary
 * @package staniscianet\endomondo_lib
 */


namespace staniscianet\endomondo_lib;

require_once("class-sport-mapping.php");

class Workout_Summary
{
    public $id = null;
    public $start_time = null;
    public $duration_sec = null;
    public $note = null;
    public $sport = null;
    public $calorie = 0;
    public $distance_km=0;
    public $isLocated=false;


    public static function makeFromJson($json_string)
    {
        $out=new Workout_Summary();
        $jsonObject=json_decode($json_string,true);

        $out->id=$jsonObject['id'];
        $out->start_time=$jsonObject['start_time'];
        $out->duration_sec=$jsonObject['duration_sec'];
        $out->note=@$jsonObject['note'];

        if ( isset($jsonObject['sport2']) ){
            $sportnumber=$jsonObject['sport2'];
        }elseif ( isset($jsonObject['sport'])){
            $sportnumber=$jsonObject['sport'];
        }else{
            $sportnumber=-100;
        }

        $out->sport= Sport_Mapping::toString($sportnumber);

        if ( isset($jsonObject['calories']) ){
            $out->calorie=$jsonObject['calories'];
        }

        if ( isset($jsonObject['distance_km']) ){
            $out->distance_km=$jsonObject['distance_km'];
        }

        if ( isset($jsonObject['has_points']) && $jsonObject['has_points'] == 1 ){
            $out->isLocated=true;
        }

        return $out;
    }
}