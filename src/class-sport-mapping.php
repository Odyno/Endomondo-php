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
Time: 0.39

 */
/**
 * Class Sport_Mapping
 * @package endomondo_libs
 */
namespace staniscianet\endomondo_lib;


class Sport_Mapping
{
    const Cycling_sport = 2;
    const Cycling_transport = 1;
    const Fitness_walking = 14;
    const Golfing = 15;
    const Hiking = 16;
    const Indoor_cycling = 21;
    const Kayaking = 9;
    const Kite_surfing = 10;
    const Mountain_biking = 3;
    const Orienteering = 17;
    const Riding = 19;
    const Roller_skiing = 5;
    const Rowing = 11;
    const Running = 0;
    const Sailing = 12;
    const Skating = 4;
    const Skiing_cross_countr = 6;
    const Skiing_downhill = 7;
    const Snowboarding = 8;
    const Swimming = 20;
    const Walking = 18;
    const Windsurfing = 13;
    const Other = 22;
    const Aerobics = 23;
    const Badminton = 24;
    const Baseball = 25;
    const Basketball = 26;
    const Boxing = 27;
    const Climbing_stairs = 28;
    const Cricket = 29;
    const Elliptical_training = 30;
    const Dancing = 31;
    const Fencing = 32;
    const Football_American = 33;
    const Football_rugby = 34;
    const Football_soccer = 35;
    const Gymnastics = 49;
    const Handball = 36;
    const Hockey = 37;
    const Martial_arts = 48;
    const Pilates = 38;
    const Polo = 39;
    const Scuba_diving = 40;
    const Squash = 41;
    const Table_tennis = 42;
    const Tennis = 43;
    const Volleyball_beach = 44;
    const Volleyball_indoor = 45;
    const Weight_training = 46;
    const Yoga = 47;
    const Step_counter = 50;
    const Circuit_Training = 87;
    const Treadmill_running = 88;
    const Skateboarding = 89;
    const Surfing = 90;
    const Snowshoeing = 91;
    const Wheelchair = 92;
    const Climbing = 93;
    const Treadmill_walking = 94;
    const Some_sport = -100;

    public static function toString($sportnumber){
        return $sportnumber;
    }
}