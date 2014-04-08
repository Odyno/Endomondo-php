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
  Date: 07/04/14
  Time: 14.49
  
 */

namespace net\staniscia\endomondo_php\requests;
/**
 * Class Request represents the HTTP REQUEST
 *
 * @package net\staniscia\endomondo_php\requests
 */
class Request
{
    /**
     * The request url
     *
     * @var string The url of request
     */
    public $url = "http://localhost";

    /**
     * the query Parameter
     *
     * @var array the query parameter
     */
    public $queryParam = array();
}