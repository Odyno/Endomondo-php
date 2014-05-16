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
Date: 19/04/14
Time: 19.03

 */
/**
 * Class Point
 * @package net\staniscia\endomondo_php
 */


namespace net\staniscia\endomondo_php;


class Point
{

    private $hr;
    private $time = '';
    private $speed = '';
    private $alt = '';
    private $lng = '';
    private $lat = '';
    private $dist = '';
    private $inst = '';

    /**
     * Set Altitude
     *
     * @param string $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }

    /**
     * Get Altitude
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * set Distance from start
     *
     * @param string $dist
     */
    public function setDist($dist)
    {
        $this->dist = $dist;
    }

    /**
     * get Distance from start
     *
     * @return string
     */
    public function getDist()
    {
        return $this->dist;
    }

    /**
     * Set Heart rate
     *
     * @param mixed $hr
     */
    public function setHr($hr)
    {
        $this->hr = $hr;
    }

    /**
     * Get Heart rate
     * @return mixed
     */
    public function getHr()
    {
        return $this->hr;
    }


    /**
     * set Latitude
     *
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * get Latitude
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * set Longitude
     *
     * @param string $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * get Longitude
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set Current speed
     *
     * @param string $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * Get Current speed
     *
     * @return string
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set Measurement time
     *
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * Get Measurement time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }



}