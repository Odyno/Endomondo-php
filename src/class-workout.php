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
Date: 04/04/14
Time: 0.36

 */


namespace net\staniscia\endomondo_php;


require_once('class-sport-mapping.php');

require_once('class-user.php');

/**
 * Class Workout represent the workout
 * @package net\staniscia\endomondo_php
 */
class Workout
{

    /**
     * @var the original json
     */
    private $the_original_json;

    /**
     * @var string id of workout
     */
    private $id = null;
    /**
     * @var string Optional name of workout
     */
    private $name = "";
    /**
     * @var null Average heart rate
     */
    private $heart_rate_avg = null;
    /**
     * @var null Maximum heart rate.
     */
    private $heart_rate_max = null;
    /**
     * @var User Workout user.
     */
    private $owner = null;
    /**
     * @var float Traveled distance.
     */
    private $distance_km = 0.0;
    /**
     * @var null Estimate of burned calories.
     */
    private $calories = null;
    /**
     * @var string message;
     */
    private $message = "";
    /**
     * @var float speed avarage
     */
    private $speed_kmh_avg = 0.0;
    /**
     * @var int speed max
     */
    private $speed_kmh_max = 0;
    /**
     * @var int sport ID
     */
    private $sport = 0;
    /**
     * @var float descent
     */
    private $descent = 0.0;
    /**
     * @var float ascent
     */
    private $ascent = 0.0;
    /**
     * @var float altitude_min
     */
    private $altitude_m_min = 0.0;
    /**
     * @var float altitude_max
     */
    private $altitude_m_max = 0.0;
    /**
     * @var null hydration
     */
    private $hydration = null;
    /**
     * @var int steps
     */
    private $steps = 0;
    /**
     * @var int cadence_max
     */
    private $cadence_max_rpm = 0;
    /**
     * @var null start_time
     */
    private $start_time = null;
    /**
     * @var null duration in seconds
     */
    private $duration_sec = null;
    /**
     * @var boolean is located workout
     */
    private $has_points;
    /**
     * @var cadence avg rpm
     */
    private $cadence_avg_rpm;




    /**
     * Create object from json endomondo format
     * @param $json_string
     * @return Workout
     * @throws Exception
     */
    public static function makeFromJson($json_string = '{ "dummy" : "dummy" }',User $user)
    {
        $out = new Workout();
        $out->owner=$user;
        try {

            $properties = json_decode($json_string, true);

            $reflection = new \ReflectionObject($out);
            $classAttribute = $reflection->getProperties();

            foreach ($properties as $key => $value) {
                foreach ($classAttribute as $attribute) {
                    if ($attribute->getName() == $key) {
                        $attribute->setAccessible(true);
                        $attribute->setValue($out, $value);
                        $attribute->setAccessible(false);
                    }
                }
            }

            //custom specific setting

            if (isset($properties['sport2'])) {
                $sportnumber = $properties['sport2'];
            } elseif (isset($properties['sport'])) {
                $sportnumber = $properties['sport'];
            } else {
                $sportnumber = -100;
            }

            $out->sport = Sport_Mapping::toString($sportnumber);

        } catch (\Exception $e) {
            throw new \Exception("Error on decode Workout! [Cause: ".$e->getMessage()."]");
        }
        return $out;
    }

    /**
     * Get  Altitude Max in Meter
     * @return float
     */
    public function getAltitudeMMax()
    {
        return $this->altitude_m_max;
    }

    /**
     * Get Altitude Min in Meter
     * @return float
     */
    public function getAltitudeMMin()
    {
        return $this->altitude_m_min;
    }

    /**
     * Get Ascent
     * @return float Ascent
     */
    public function getAscent()
    {
        return $this->ascent;
    }

    /**
     * Get Cadence Max Rpm
     * @return int
     */
    public function getCadenceMaxRpm()
    {
        return $this->cadence_max_rpm;
    }

    /**
     * Get Calories
     * @return null
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Get Descent
     * @return float
     */
    public function getDescent()
    {
        return $this->descent;
    }

    /**
     * Get Distance in Km
     * @return float
     */
    public function getDistanceKm()
    {
        return $this->distance_km;
    }

    /**
     * Get Duration in Sec
     * @return null
     */
    public function getDurationSec()
    {
        return $this->duration_sec;
    }

    /**
     * Get Heart Rate Avarage
     * @return null
     */
    public function getHeartRateAvg()
    {
        return $this->heart_rate_avg;
    }

    /**
     * Get Heart Rate Max
     * @return null
     */
    public function getHeartRateMax()
    {
        return $this->heart_rate_max;
    }

    /**
     * Get Hydration
     * @return null
     */
    public function getHydration()
    {
        return $this->hydration;
    }

    /**
     * Get the ID
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the Message
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the Name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * get the Owner of Workout
     * @return \net\staniscia\endomondo_php\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Get Speed Km/h Avarage
     * @return float
     */
    public function getSpeedKmhAvg()
    {
        return $this->speed_kmh_avg;
    }

    /**
     * Get Speed Km/h Max
     * @return int
     */
    public function getSpeedKmhMax()
    {
        return $this->speed_kmh_max;
    }

    /**
     * Get the sport
     * @return int
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Get  the Start Time
     * @return null
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Get the steps
     * @return int
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * is this Workout located?
     *
     * @return bool
     */
    public function isLocated()
    {
        return $this->has_points == true;

    }

    /**
     * Get  Cadence Avarage in Rpm
     * @return mixed
     */
    public function getCadenceAvgRpm()
    {
        return $this->cadence_avg_rpm;
    }



}