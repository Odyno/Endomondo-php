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
  Time: 19.18
  
 */


namespace net\staniscia\endomondo_php\requests;

use net\staniscia\endomondo_php\requests\Request;
use \net\staniscia\endomondo_php\requests\Requests_Engine_Interface;
use net\staniscia\endomondo_php\requests\Response;

require_once('class-requests-engine-interface.php');
require_once('class-request.php');
require_once('class-response.php');

/**
 * Class Simple_HttpRequest_Engine
 */
class Simple_HttpRequest_Engine implements Requests_Engine_Interface {


    /**
     * @var string
     */
    private $user_agent="Nutscrape/1.0 (Commodore Vic20; 8-bit)";


    /**
     * Insert the user agent of request
     *
     * @param $userAgent
     * @return none
     */
    public function  set_user_agent($userAgent)
    {
        $this->user_agent=$userAgent;
    }

    /**
     * Execute a get request
     *
     * @param Request $theRequest
     * @return Response
     */
    public function  get(Request $theRequest)
    {
        $r = new \HttpRequest($theRequest->url, \HttpRequest::METH_GET);
        $r->setOptions(array('useragent' => $this->user_agent));
        $r->addQueryData($theRequest->queryParam);
        $out=new Response();
        try {
            $r->send();
            $out->status_code=$r->getResponseCode();
            $out->body=$r->getResponseBody();

        } catch (\HttpException $ex) {
            $out = Response::InternalServerError($ex->getMessage());
        }
        return $out;
    }
}