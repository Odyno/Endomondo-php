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
  Date: 26/03/14
  Time: 1.33
  
 */


use \net\staniscia\endomondo_php\Endomondo_Php;
include_once("../../src/class-endomondo-php.php");
include_once("class-requests-lib-adapter.php");

$requestEngine = new  Requests_Lib_Adapter();

$requestEngine->traseRequest(true);
$requestEngine->traseResponce(true);

$endo_proxy=new Endomondo_Php($requestEngine);

/*
$pippo->makeUser("alex_staani@yahoo.it","waymamaerdio");
echo "A:".$pippo->isConnected();

$pippo->makeUser("alex_stani@yahoo.it","waymamaaerdio");
echo "B:".$pippo->isConnected();
*/
$endo_proxy->makeUser("alex_stani@yahoo.it","waymamerdio");

echo $endo_proxy->get_user();
echo $endo_proxy->isConnected()? "Sono connesso il token è :".$endo_proxy->get_user()->get_token(): "NON SONO COMMESSO!";
var_dump($endo_proxy->get_workout_summary_list());



