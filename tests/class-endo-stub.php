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
  Time: 17.45
  
 *//**
 * Class EndoStub
 * @package netstaniscia\endomondo_php
 */


namespace net\staniscia\endomondo_php\stub;


use net\staniscia\endomondo_php\requests\Request;
use net\staniscia\endomondo_php\requests\Response;
use net\staniscia\endomondo_php\User;
use net\staniscia\endomondo_php\requests\Requests_Engine_Interface;
use net\staniscia\endomondo_php\Workout_List;


class EndoStub implements Requests_Engine_Interface{

    /**
     * Insert the user agent of request
     *
     * @param $userAgent
     * @return mixed  none;
     */
    function  set_user_agent($userAgent)
    {
        // TODO: Implement set_user_agent() method.
    }

    /**
     * Execute a get request
     * @param url $
     * @param array $queryParam
     * @return response as array where response['status_code']= the test status code, response['body']= the body content
     */
    function get(Request $request)
    {
        $url = $request->url;
        $queryParam = $request->queryParam;
        if ($url=="https://api.mobile.endomondo.com/mobile/auth"){
            return $this->manageAuth($url, $queryParam);
        }else if ($url == "http://api.mobile.endomondo.com/mobile/api/workout/list"){
            return  $this->manageList($url, $queryParam);
        }else{
            return Response::BadRequest();
        }
    }

    private function manageAuth($url, $queryParam)
    {

        if ($queryParam['email']=="pippo" && $queryParam['password']=="pluto"){
            $out="OK\naction=PAIRED\nauthToken=x2345678901234567890xx\nmeasure=METRIC\ndisplayName=Pippo e Franco\nuserId=9999999\nfacebookConnected=false\nsecureToken=qwertyuioplkjhgfdsazxc\n";
        }else if ($queryParam['email']=="pippo"){
            $out="USER_EXISTS_PASSWORD_WRONG\n";
        }else{
            $out="USER_UNKNOWN\n";
        }
        $outme= Response::OK() ;
        $outme->body=$out;
        return $outme;
    }

    public static function getEndoUserFake()
    {
        return User::make("9999999", "Pippo e Franco","x2345678901234567890xx","qwertyuioplkjhgfdsazxc");
    }

    private function manageList($url, $queryParam)
    {
        $outme= Response::OK() ;
        $outme->body='{"data":[{"id":1,"duration_sec":2972,"sport":20,"speed_kmh_avg":1.2113055181695829,"device_workout_id":"6574285060008231337","sport2":20,"feed_id":293348079,"hydration":0.327398,"has_playlist":false,"burgers_burned":1.0833334,"start_time":"2014-04-01 18:00:05 UTC","calories":585,"distance_km":1,"has_points":false},{"id":2,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"device_workout_id":"-1385344507802528341","sport2":27,"feed_id":293348407,"hydration":0.881308,"has_playlist":false,"burgers_burned":3.038889,"start_time":"2014-03-31 18:30:40 UTC","calories":1641,"distance_km":0,"has_points":false},{"id":3,"duration_sec":957,"cadence_avg_rpm":38,"sport":18,"steps":63,"speed_kmh_avg":2.4355749351477547,"device_workout_id":"838515814916302472","feed_id":289611931,"sport2":18,"altitude_m_max":103.9,"hydration":0.038988,"altitude_m_min":84.2,"has_playlist":false,"burgers_burned":0.10185185,"start_time":"2014-03-26 12:35:24 UTC","cadence_max_rpm":212,"calories":55,"speed_kmh_max":5.13516,"distance_km":0.6474570035934448,"has_points":true},{"id":5,"duration_sec":5400,"has_playlist":false,"burgers_burned":3.038,"start_time":"2014-03-24 19:30:00 UTC","calories":1640.52,"sport":27,"feed_id":289619060,"sport2":27,"has_points":false},{"id":10,"duration_sec":6432,"cadence_avg_rpm":32,"sport":18,"steps":181,"speed_kmh_avg":4.1719097699692,"device_workout_id":"-3153923514664170604","feed_id":284282486,"sport2":18,"altitude_m_max":64.4,"hydration":0.322875,"altitude_m_min":31.1,"has_playlist":false,"burgers_burned":0.90925926,"start_time":"2014-03-15 15:13:34 UTC","cadence_max_rpm":251,"calories":491,"speed_kmh_max":10.0423,"distance_km":7.453812122344971,"has_points":true},{"id":6,"duration_sec":3478,"sport":20,"speed_kmh_avg":1.0868314630070797,"device_workout_id":"-6764630525049750987","sport2":20,"feed_id":286928731,"hydration":0.383139,"has_playlist":false,"burgers_burned":1.2685186,"start_time":"2014-03-20 18:57:32 UTC","calories":685,"distance_km":1.0499999523162842,"has_points":false},{"id":7,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"device_workout_id":"-5210347193615943721","sport2":27,"feed_id":286928251,"hydration":0.881308,"has_playlist":false,"burgers_burned":3.038889,"start_time":"2014-03-19 19:30:17 UTC","calories":1641,"distance_km":0,"has_points":false},{"id":8,"duration_sec":2997,"has_playlist":false,"burgers_burned":0.74125,"start_time":"2014-03-18 18:45:00 UTC","calories":400.275,"sport":20,"distance_km":1,"speed_kmh_avg":1.2012012012012012,"feed_id":286063887,"sport2":20,"has_points":false},{"id":9,"duration_sec":5400,"has_playlist":false,"burgers_burned":3.038,"start_time":"2014-03-17 19:30:00 UTC","calories":1640.52,"sport":27,"feed_id":286062847,"sport2":27,"has_points":false},{"id":4,"duration_sec":3591,"has_playlist":false,"burgers_burned":0.88866854,"start_time":"2014-03-25 19:00:00 UTC","calories":479.881,"sport":20,"distance_km":1.2,"speed_kmh_avg":1.2030075187969926,"feed_id":289618795,"sport2":20,"has_points":false},{"id":11,"duration_sec":1980,"has_playlist":false,"burgers_burned":0.48952964,"start_time":"2014-03-13 19:00:00 UTC","calories":264.346,"sport":20,"distance_km":0.66,"speed_kmh_avg":1.2,"feed_id":286062530,"sport2":20,"has_points":false},{"id":12,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"sport2":27,"feed_id":283007248,"has_playlist":false,"burgers_burned":3.038,"name":"boxyng","calories":1640.52,"start_time":"2014-03-12 19:30:00 UTC","distance_km":0,"has_points":false},{"id":13,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"device_workout_id":"5367169594774771442","sport2":27,"feed_id":282102153,"hydration":0.881308,"has_playlist":false,"burgers_burned":3.038889,"start_time":"2014-03-10 19:30:05 UTC","calories":1641,"distance_km":0,"has_points":false},{"id":14,"duration_sec":5398,"cadence_avg_rpm":43,"sport":18,"steps":198,"speed_kmh_avg":2.94840054054444,"device_workout_id":"6063426088673709529","feed_id":281006443,"sport2":18,"altitude_m_max":252.5,"hydration":0.453035,"altitude_m_min":81.2,"has_playlist":false,"burgers_burned":0.63148147,"start_time":"2014-03-09 13:11:14 UTC","cadence_max_rpm":156,"calories":341,"speed_kmh_max":7.89611,"distance_km":4.420962810516357,"has_points":true}]}';
        return $outme;

    }

    public static function getWorklistFake(){
        $out='{"data":[{"id":1,"duration_sec":2972,"sport":20,"speed_kmh_avg":1.2113055181695829,"device_workout_id":"6574285060008231337","sport2":20,"feed_id":293348079,"hydration":0.327398,"has_playlist":false,"burgers_burned":1.0833334,"start_time":"2014-04-01 18:00:05 UTC","calories":585,"distance_km":1,"has_points":false},{"id":2,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"device_workout_id":"-1385344507802528341","sport2":27,"feed_id":293348407,"hydration":0.881308,"has_playlist":false,"burgers_burned":3.038889,"start_time":"2014-03-31 18:30:40 UTC","calories":1641,"distance_km":0,"has_points":false},{"id":3,"duration_sec":957,"cadence_avg_rpm":38,"sport":18,"steps":63,"speed_kmh_avg":2.4355749351477547,"device_workout_id":"838515814916302472","feed_id":289611931,"sport2":18,"altitude_m_max":103.9,"hydration":0.038988,"altitude_m_min":84.2,"has_playlist":false,"burgers_burned":0.10185185,"start_time":"2014-03-26 12:35:24 UTC","cadence_max_rpm":212,"calories":55,"speed_kmh_max":5.13516,"distance_km":0.6474570035934448,"has_points":true},{"id":5,"duration_sec":5400,"has_playlist":false,"burgers_burned":3.038,"start_time":"2014-03-24 19:30:00 UTC","calories":1640.52,"sport":27,"feed_id":289619060,"sport2":27,"has_points":false},{"id":10,"duration_sec":6432,"cadence_avg_rpm":32,"sport":18,"steps":181,"speed_kmh_avg":4.1719097699692,"device_workout_id":"-3153923514664170604","feed_id":284282486,"sport2":18,"altitude_m_max":64.4,"hydration":0.322875,"altitude_m_min":31.1,"has_playlist":false,"burgers_burned":0.90925926,"start_time":"2014-03-15 15:13:34 UTC","cadence_max_rpm":251,"calories":491,"speed_kmh_max":10.0423,"distance_km":7.453812122344971,"has_points":true},{"id":6,"duration_sec":3478,"sport":20,"speed_kmh_avg":1.0868314630070797,"device_workout_id":"-6764630525049750987","sport2":20,"feed_id":286928731,"hydration":0.383139,"has_playlist":false,"burgers_burned":1.2685186,"start_time":"2014-03-20 18:57:32 UTC","calories":685,"distance_km":1.0499999523162842,"has_points":false},{"id":7,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"device_workout_id":"-5210347193615943721","sport2":27,"feed_id":286928251,"hydration":0.881308,"has_playlist":false,"burgers_burned":3.038889,"start_time":"2014-03-19 19:30:17 UTC","calories":1641,"distance_km":0,"has_points":false},{"id":8,"duration_sec":2997,"has_playlist":false,"burgers_burned":0.74125,"start_time":"2014-03-18 18:45:00 UTC","calories":400.275,"sport":20,"distance_km":1,"speed_kmh_avg":1.2012012012012012,"feed_id":286063887,"sport2":20,"has_points":false},{"id":9,"duration_sec":5400,"has_playlist":false,"burgers_burned":3.038,"start_time":"2014-03-17 19:30:00 UTC","calories":1640.52,"sport":27,"feed_id":286062847,"sport2":27,"has_points":false},{"id":4,"duration_sec":3591,"has_playlist":false,"burgers_burned":0.88866854,"start_time":"2014-03-25 19:00:00 UTC","calories":479.881,"sport":20,"distance_km":1.2,"speed_kmh_avg":1.2030075187969926,"feed_id":289618795,"sport2":20,"has_points":false},{"id":11,"duration_sec":1980,"has_playlist":false,"burgers_burned":0.48952964,"start_time":"2014-03-13 19:00:00 UTC","calories":264.346,"sport":20,"distance_km":0.66,"speed_kmh_avg":1.2,"feed_id":286062530,"sport2":20,"has_points":false},{"id":12,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"sport2":27,"feed_id":283007248,"has_playlist":false,"burgers_burned":3.038,"name":"boxyng","calories":1640.52,"start_time":"2014-03-12 19:30:00 UTC","distance_km":0,"has_points":false},{"id":13,"duration_sec":5400,"sport":27,"speed_kmh_avg":0,"device_workout_id":"5367169594774771442","sport2":27,"feed_id":282102153,"hydration":0.881308,"has_playlist":false,"burgers_burned":3.038889,"start_time":"2014-03-10 19:30:05 UTC","calories":1641,"distance_km":0,"has_points":false},{"id":14,"duration_sec":5398,"cadence_avg_rpm":43,"sport":18,"steps":198,"speed_kmh_avg":2.94840054054444,"device_workout_id":"6063426088673709529","feed_id":281006443,"sport2":18,"altitude_m_max":252.5,"hydration":0.453035,"altitude_m_min":81.2,"has_playlist":false,"burgers_burned":0.63148147,"start_time":"2014-03-09 13:11:14 UTC","cadence_max_rpm":156,"calories":341,"speed_kmh_max":7.89611,"distance_km":4.420962810516357,"has_points":true}]}';
        return Workout_List::makeFromJson($out,EndoStub::getEndoUserFake());

    }
}