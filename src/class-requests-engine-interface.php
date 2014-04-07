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
Time: 14.00

 */
/**
 * Class Requests_Engine
 */
namespace staniscianet\endomondo_lib;

interface Requests_Engine_Interface
{

    /**
     * Insert the user agent of request
     *
     * @param $userAgent
     * @return mixed  none;
     */
    function  set_user_agent($userAgent);

    /**
     * Execute a get request
     * @param url $
     * @param array $queryParam
     * @return response as array where response['status_code']= the test status code, response['body']= the body content
     */
    function get($url = "", $queryParam = array());

}