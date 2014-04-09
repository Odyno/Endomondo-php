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

namespace net\staniscia\endomondo_php;


use net\staniscia\endomondo_php\stub\EndoStub;
use net\staniscia\endomondo_php\User;


include_once("src/class-endomondo-php.php");
include_once("src/requests/class-requests-engine-interface.php");
require_once("src/class-user.php");


require_once("class-endo-stub.php");


class Endomondo_PhpTest extends \PHPUnit_Framework_TestCase
{

    function testConnection()
    {
        $class = new Endomondo_Php(new EndoStub());
        $user=$class->makeUser("pippo", "pluto");
        $this->assertEquals(true, $class->isConnected());
        $this->assertEquals($user, EndoStub::getEndoUserFake());
    }

    function testConnectionNoPWD()
    {
        $class = new Endomondo_Php(new EndoStub());
        $user=$class->makeUser("pippo", "pippo");
        $this->assertEquals(false, $class->isConnected());
        $this->assertEquals($user->is_valid(),false);
    }

    function testConnectionNoUSR()
    {
        $class = new Endomondo_Php(new EndoStub());
        $user=$class->makeUser("ae", "ae");
        $this->assertEquals(false, $class->isConnected());
        $this->assertEquals($user->is_valid(),false);
    }

    function testDisconnection()
    {
        $class = new Endomondo_Php(new EndoStub());
        $user=$class->makeUser("pippo", "pluto");
        $this->assertEquals(true, $class->isConnected());
        $class->disconnect();
        $this->assertEquals(false, $class->isConnected());

        $test = $class->get_user();
        $this->assertEquals($test->get_token(), null);
        $this->assertEquals($test->is_valid(),false);

    }

    function testGetUser()
    {
        $class = new Endomondo_Php(new EndoStub());
        $class->makeUser("pippo", "pluto");
        $this->assertEquals(true, $class->isConnected());


        $test = $class->get_user();
        $testResp = User::make("9999999", "Pippo e Franco", "x2345678901234567890xx", "qwertyuioplkjhgfdsazxc");

        $this->assertEquals($test->get_name(), $testResp->get_name());
        $this->assertEquals($test->get_id(), $testResp->get_id());
        $this->assertEquals($test->get_token(), $testResp->get_token());
        $this->assertEquals($test->get_secure_token(), $testResp->get_secure_token());

    }

    function testWorkoutList()
    {
        $class= new Endomondo_Php(new EndoStub());
        $class->makeUser("pippo", "pluto");
        $out=$class->get_workout_summary_list();
        $this->assertEquals($out,EndoStub::getWorklistFake());
    }
}
