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
  Date: 08/04/14
  Time: 15.52
  
 */

namespace net\staniscia\endomondo_php;

use net\staniscia\endomondo_php\stub\EndoStub;

require_once("src/class-workout.php");
require_once("class-endo-stub.php");

class WorkoutTest extends \PHPUnit_Framework_TestCase {

    public function testCreationByJson_1(){
        $STRING='{"duration_sec":2972,"sport":20,"speed_kmh_avg":1.2113055181695829,"device_workout_id":"6574285060008231337","sport2":20,"feed_id":293348079,"id":1,"hydration":0.327398,"has_playlist":false,"burgers_burned":1.0833334,"start_time":"2014-04-01 18:00:05 UTC","calories":585,"distance_km":1,"has_points":false}';
        $obj= Workout::makeFromJson($STRING,EndoStub::getEndoUserFake());
        $this->assertEquals($obj->getId(),1);
        $this->assertEquals($obj->getDurationSec(),2972);
        $this->assertEquals($obj->getSport(),'Swimming');
        $this->assertEquals($obj->getSpeedKmhAvg(),1.2113055181695829);
        $this->assertEquals($obj->getHydration(),0.327398);
        $this->assertEquals($obj->getStartTime(),"2014-04-01 18:00:05 UTC");
        $this->assertEquals($obj->getCalories(),585);
        $this->assertEquals($obj->getDistanceKm(),1);
        $this->assertEquals($obj->isLocated(),false);
    }


    public function testCreationByJson_2(){
        $STRING='{"duration_sec":6432,"cadence_avg_rpm":32,"sport":18,"steps":181,"speed_kmh_avg":4.1719097699692,"device_workout_id":"-3153923514664170604","feed_id":284282486,"sport2":18,"id":2,"altitude_m_max":64.4,"hydration":0.322875,"altitude_m_min":31.1,"has_playlist":false,"burgers_burned":0.90925926,"start_time":"2014-03-15 15:13:34 UTC","cadence_max_rpm":251,"calories":491,"speed_kmh_max":10.0423,"distance_km":7.453812122344971,"has_points":true}';
        $obj= Workout::makeFromJson($STRING ,EndoStub::getEndoUserFake());
        $this->assertEquals($obj->getId(),2);
        $this->assertEquals($obj->getDurationSec(),6432);
        $this->assertEquals($obj->getSport(),'Walking');
        $this->assertEquals($obj->getSpeedKmhAvg(),4.1719097699692);
        $this->assertEquals($obj->getHydration(),0.322875);
        $this->assertEquals($obj->getStartTime(),"2014-03-15 15:13:34 UTC");
        $this->assertEquals($obj->getCalories(),491);
        $this->assertEquals($obj->getDistanceKm(),7.453812122344971);
        $this->assertEquals($obj->isLocated(),true);
        $this->assertEquals($obj->getSpeedKmhMax(),10.0423);
        $this->assertEquals($obj->getCadenceMaxRpm(),251);
        $this->assertEquals($obj->getCadenceAvgRpm(),32);
        $this->assertEquals($obj->getAltitudeMMin(),31.1);
        $this->assertEquals($obj->getAltitudeMMax(),64.4);
    }


}
