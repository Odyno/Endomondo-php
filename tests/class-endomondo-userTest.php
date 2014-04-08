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
Time: 16.53

 */

namespace net\staniscia\endomondo_php {

    require_once("src/class-user.php");


    class Endomondo_UserTest extends \PHPUnit_Framework_TestCase {

        public function testCreationGoodPath()
        {
            $test=User::make("ID","NAME","TOKEN","SECURE");
            // Assert
            $this->assertEquals($test->get_name(),"NAME");
            $this->assertEquals($test->get_id(),"ID");
            $this->assertEquals($test->get_token(),"TOKEN");
            $this->assertEquals($test->get_secure_token(),"SECURE");
        }

        public function testCreationDefault()
        {
            $test=new User();
            // Assert
            $this->assertEquals($test->get_name(),User::ANONYMOUS);
            $this->assertEquals($test->get_id(),"");
            $this->assertEquals($test->get_token(),null);
            $this->assertEquals($test->get_secure_token(),null);
        }



    }
}
