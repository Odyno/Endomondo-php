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
Time: 11.14

 */
/**
 * Class User
 */
namespace staniscianet\endomondo_lib;

class User
{

    private $auth_token = null;
    private $display_name = "ANONIMO";
    private $user_id = "";
    private $secure_token = null;

    public static function make($user_id, $display_name, $auth_token, $secure_token)
    {
        $user = new User();
        $user->user_id = $user_id;
        $user->display_name = $display_name;
        $user->auth_token = $auth_token;
        $user->secure_token = $secure_token;
        return $user;
    }

    function is_valid()
    {
        return $this->get_token() != null ? true : false;
    }


    function get_token()
    {
        return $this->auth_token;
    }

    function get_name()
    {
        return $this->display_name;
    }

    function get_id()
    {
        return $this->user_id;
    }

    function get_secure_token()
    {
        return $this->secure_token;
    }

    public function __toString()
    {
        return $this->display_name . "(" . $this->user_id . ") - " . $this->auth_token . " - " . $this->secure_token;
    }

}