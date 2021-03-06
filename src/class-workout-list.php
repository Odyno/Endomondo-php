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
Date: 08/04/14
Time: 15.18

 */


namespace net\staniscia\endomondo_php;


use Exception;

require_once('class-workout.php');

require_once('class-user.php');

/**
 * Class Workout_List is a representation of workout collection. It contains all method to manage it
 *
 * @package net\staniscia\endomondo_php
 */
class Workout_List
{
    /**
     * @var array real list of workouts
     */
    private $workouts = array();

    /**
     * Make object from Endomondo response server
     * @param string $json_string
     */
    public static function makeFromJson($json_string = '{ "dummy" : "dummy" }', User $user)
    {
        $out = new Workout_List();
        $workoutsData = json_decode($json_string, true);
        foreach ($workoutsData['data'] as $workoutData) {
            try {
                $workout = Workout::makeFromJson(json_encode($workoutData),$user);
                $out->set($workout);
            } catch (\Exception $e) {

                trigger_error("Workout rejected cause ".$e->getMessage(),E_USER_ERROR);
            }
        }
        return $out;
    }

    /**
     * Set Workout on Workout_List (and override existent element)
     *
     * @param Workout $workout
     */
    public function set(Workout $workout)
    {
        $this->workouts[$workout->getId()] = $workout;
    }

    /**
     * Add Workout on Workout_List if no present
     *
     * @param Workout $workout
     * @throws \Exception  "Already present!"
     */
    public function add(Workout $workout)
    {
        $id=$workout->getId();
        if (array_key_exists($id, $this->workouts)){
            throw new \Exception("Already present!");
        }
        $this->set($workout);
    }


    /**
     * Get Workout from Workout_List from the id instead Workout passed
     *
     * @param Workout $workout
     * @return Workout
     * @throws \Exception
     */
    public function getFromWorkout(Workout $workout)
    {
        return $this->get($workout->getId());
    }

    /**
     * Get Workout from Workout_List from the id of Workout
     *
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function get($id)
    {
        if (array_key_exists($id, $this->workouts) && isset($this->workouts[$id])) {
            $out = $this->workouts[$id];
        } else {
            throw new \Exception("NOT FOUND");
        }
        return $out;
    }


}