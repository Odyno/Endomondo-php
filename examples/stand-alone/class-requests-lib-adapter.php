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
  Time: 14.58
  
 */


use net\staniscia\endomondo_php\requests\Requests_Engine_Interface;
use net\staniscia\endomondo_php\requests\Response;
use net\staniscia\endomondo_php\requests\Request ;


require_once('../../src/requests/class-requests-engine-interface.php');
require_once("../../src/requests/class-request.php");
require_once("../../src/requests/class-response.php");
require_once("../../vendor/rmccue/requests/library/Requests.php");


/**
 * Class Requests_Lib_Adapter
 */
class Requests_Lib_Adapter implements Requests_Engine_Interface {

    /**
     * @var string
     */
    private $user_agent="Nutscrape/1.0 (Commodore Vic20; 8-bit)";

    /**
     * @var bool
     */
    private $tracerequest=false;
    /**
     * @var bool
     */
    private $traceresponse=false;

    /**
     *
     */
    function __construct(){
        // Next, make sure Requests can load internal classes
        \Requests::register_autoloader();
    }

    /**
     * Insert the user agent of request
     *
     * @param $userAgent
     * @return mixed  none;
     */
    function  set_user_agent($userAgent)
    {
        $this->user_agent=$userAgent;
    }

    /**
     * Execute a get request
     * @param array $queryParam
     * @return response as array where  response[0]= status code, response[1]=body content
     */
    function get(Request $request)
    {

        $url=$request->url;
        $queryParam = $request->queryParam;

        if($this->tracerequest){
            echo '
            *********************************************************************************************
            Request
            -- URL: '. $url. '
            -- QueryParam: '. json_encode($queryParam).'
            ';
        }
        // Now let's make a request!
        $headers = array();

        $options = array(
            'useragent' => $this->user_agent,

        );


        $request = \Requests::request($url, $headers, $queryParam, \Requests::GET, $options);

        $reponse= new Response();
        $reponse->status_code=$request->status_code;
        $reponse->body=$request->body;

        if($this->traceresponse){
            echo '
            RESPONSE: ' . json_encode($reponse).'
            *********************************************************************************************
            ';
        }

        return $reponse;
    }

    /**
     * @param $true
     */
    public function traseRequest($true){
        $this->tracerequest=$true;
    }

    /**
     * @param $true
     */
    public function traseResponce($true)
    {
        $this->traceresponse=$true;
    }
}