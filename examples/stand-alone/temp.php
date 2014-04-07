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
  Time: 22.55
  
 */

$out=json_decode('{"status_code":200,"body":"OK\naction=PAIRED\nauthToken=x2345678901234567890xx\nmeasure=METRIC\ndisplayName=Pippo e Franco\nuserId=9999999\nfacebookConnected=false\nsecureToken=qwertyuioplkjhgfdsazxc\n"}');
var_dump($out);