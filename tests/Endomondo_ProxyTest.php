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
  Time: 17.03
  
 */

namespace staniscianet\endomondo_lib;

use staniscianet\endomondo_lib\stub\EndoFake;

include_once("../src/class-endomondo-proxy.php");
include_once("../src/class-requests-engine-interface.php");
include_once("./class-endo-fake.php");

require_once("../src/class-user.php");



class Endomondo_ProxyTest extends \PHPUnit_Framework_TestCase {

    function testConnection(){
        $objFake=new EndoFake();
        $class= new Endomondo_Proxy($objFake);
        $class->connect("pippo","pluto");
        $this->assertEquals(true,$class->isConnected());
    }


    function testConnectionNoPWD(){
        $objFake=new EndoFake();
        $class= new Endomondo_Proxy($objFake);
        $class->connect("pippo","pippo");
        $this->assertEquals(false,$class->isConnected());
    }


    function testConnectionNoUSR(){
        $objFake=new EndoFake();
        $class= new Endomondo_Proxy($objFake);
        $class->connect("ae","ae");
        $this->assertEquals(false,$class->isConnected());
    }



    function testDisconnection(){
        $objFake=new EndoFake();
        $class= new Endomondo_Proxy($objFake);
        $class->connect("pippo","pluto");
        $this->assertEquals(true,$class->isConnected());
        $class->disconnect();
        $this->assertEquals(false,$class->isConnected());

        $test=$class->get_user();
        $this->assertEquals($test->get_token(),null);

    }

    function testGetUser(){
        $objFake=new EndoFake();
        $class= new Endomondo_Proxy($objFake);
        $class->connect("pippo","pluto");
        $this->assertEquals(true,$class->isConnected());


        $test=$class->get_user();
        $testResp=EndoFake::getEndoUserFake();

        $this->assertEquals($test->get_name(),$testResp->get_name());
        $this->assertEquals($test->get_id(),$testResp->get_id());
        $this->assertEquals($test->get_token(),$testResp->get_token());
        $this->assertEquals($test->get_secure_token(),$testResp->get_secure_token());

    }

    function testWorkoutList(){
        $objFake=new EndoFake();
        $class= new Endomondo_Proxy($objFake);
        $class->connect("pippo","pluto");
        $class->get_workout_summary_list();

        EndoFake::getWorklistFake();
    }
}
