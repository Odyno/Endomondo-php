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
  Time: 19.34
  
 */

namespace net\staniscia\endomondo_php\requests;




require_once('../src/requests/class-request.php');
require_once('../src/requests/class-response.php');
require_once('../src/requests/class-simple-httpRequest-engine.php');

class Simple_HttpRequest_EngineTest extends \PHPUnit_Framework_TestCase {

    function testGetRequest(){
        /*
        $request=new Request();
        $request->url="https://en.wikipedia.org/wiki/Pretty_Good_Privacy";

        $r=new Simple_HttpRequest_Engine();
        $reponse=$r->get($request);

        $this->assertEquals($reponse->status_code,Response::OK);
        */

    }

}
