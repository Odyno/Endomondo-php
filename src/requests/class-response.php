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
  Time: 14.48
  
*/


namespace net\staniscia\endomondo_php\requests;

/**
 * Class The HTTP Response representation
 * @package net\staniscia\endomondo_php\requests
 */
class Response
{
    const OK = "200";
    const NO_CONTENT = "204";
    const BAD_REQUEST = "400";
    const FORBIDDEN = "403";
    const NOT_FOUND = "404";
    const NOT_IMPLEMENTED = "501";
    const INTERNAL_SERVER_ERROR = "500";

    /**
     * @var string the status code
     */
    public $status_code= self::INTERNAL_SERVER_ERROR;

    /**
     * The Body of responce
     * @var string
     */
    public $body="Internal Server Error";

    /**
     * The request has succeeded. The information returned with the response is dependent on the method used in the request
     * @param string $body
     * @return Response
     */
    public static function OK($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code =  self::OK ;
        return $outResponse;
    }

    /**
     * The server has fulfilled the request but does not need to return an entity-body, and might want to return updated metainformation.
     * @param string $body
     * @return Response
     */
    public static function  NoContent($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code = self::NO_CONTENT;
        return $outResponse;
    }

    /**
     *  The request could not be understood by the server due to malformed syntax. The client SHOULD NOT repeat the request without modifications.
     * @param string $body
     * @return Response
     */
    public static function  BadRequest($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code = self::BAD_REQUEST;
        return $outResponse;
    }

    /**
     *  The server understood the request, but is refusing to fulfill it. Authorization will not help and the request SHOULD NOT be repeated.
     * @param string $body
     * @return Response
     */
    public static function  Forbidden($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code = self::FORBIDDEN;
        return $outResponse;
    }

    /**
     * The server has not found anything matching the Request-URI.
     * @param string $body
     * @return Response
     */
    public static function  NotFound($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code = self::NOT_FOUND;
        return $outResponse;
    }

    /**
     * The server does not support the functionality required to fulfill the request.
     *
     * @param string $body
     * @return Response
     */
    public static function  NotImplemented($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code = self::NOT_IMPLEMENTED;
        return $outResponse;
    }

    /**
     *  The server encountered an unexpected condition which prevented it from fulfilling the request.
     *
     * @param string $body
     * @return Response
     */
    public static function  InternalServerError($body = "")
    {
        $outResponse = new Response();
        $outResponse->body = $body;
        $outResponse->status_code = self::INTERNAL_SERVER_ERROR;
        return $outResponse;
    }


}