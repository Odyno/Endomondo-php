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
namespace net\staniscia\endomondo_php;

/**
 * Class Sport_Mapping is the combination on all sport used in endomondo and it's numbers
 *
 * @package net\staniscia\endomondo_php
 */
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


    /**
     * Convert Sport Number in String
     * @param $sport_number
     * @return string
     */
    public static function toString($sport_number){
        if ( $sport_number ==  "1") { return "Cycling_transport";}
        else if ( $sport_number ==  "14") { return "Fitness_walking";}
        else if ( $sport_number ==  "15") { return "Golfing";}
        else if ( $sport_number ==  "16") { return "Hiking";}
        else if ( $sport_number ==  "21") { return "Indoor_cycling";}
        else if ( $sport_number ==  "9") { return "Kayaking";}
        else if ( $sport_number ==  "10") { return "Kite_surfing";}
        else if ( $sport_number ==  "3") { return "Mountain_biking";}
        else if ( $sport_number ==  "17") { return "Orienteering";}
        else if ( $sport_number ==  "19") { return "Riding";}
        else if ( $sport_number ==  "5") { return "Roller_skiing";}
        else if ( $sport_number ==  "11") { return "Rowing";}
        else if ( $sport_number ==  "0") { return "Running";}
        else if ( $sport_number ==  "12") { return "Sailing";}
        else if ( $sport_number ==  "4") { return "Skating";}
        else if ( $sport_number ==  "6") { return "Skiing_cross_countr";}
        else if ( $sport_number ==  "7") { return "Skiing_downhill";}
        else if ( $sport_number ==  "8") { return "Snowboarding";}
        else if ( $sport_number ==  "20") { return "Swimming";}
        else if ( $sport_number ==  "18") { return "Walking";}
        else if ( $sport_number ==  "13") { return "Windsurfing";}
        else if ( $sport_number ==  "22") { return "Other";}
        else if ( $sport_number ==  "23") { return "Aerobics";}
        else if ( $sport_number ==  "24") { return "Badminton";}
        else if ( $sport_number ==  "25") { return "Baseball";}
        else if ( $sport_number ==  "26") { return "Basketball";}
        else if ( $sport_number ==  "27") { return "Boxing";}
        else if ( $sport_number ==  "28") { return "Climbing_stairs";}
        else if ( $sport_number ==  "29") { return "Cricket";}
        else if ( $sport_number ==  "30") { return "Elliptical_training";}
        else if ( $sport_number ==  "31") { return "Dancing";}
        else if ( $sport_number ==  "32") { return "Fencing";}
        else if ( $sport_number ==  "33") { return "Football_American";}
        else if ( $sport_number ==  "34") { return "Football_rugby";}
        else if ( $sport_number ==  "35") { return "Football_soccer";}
        else if ( $sport_number ==  "49") { return "Gymnastics";}
        else if ( $sport_number ==  "36") { return "Handball";}
        else if ( $sport_number ==  "37") { return "Hockey";}
        else if ( $sport_number ==  "48") { return "Martial_arts";}
        else if ( $sport_number ==  "38") { return "Pilates";}
        else if ( $sport_number ==  "39") { return "Polo";}
        else if ( $sport_number ==  "40") { return "Scuba_diving";}
        else if ( $sport_number ==  "41") { return "Squash";}
        else if ( $sport_number ==  "42") { return "Table_tennis";}
        else if ( $sport_number ==  "43") { return "Tennis";}
        else if ( $sport_number ==  "44") { return "Volleyball_beach";}
        else if ( $sport_number ==  "45") { return "Volleyball_indoor";}
        else if ( $sport_number ==  "46") { return "Weight_training";}
        else if ( $sport_number ==  "47") { return "Yoga";}
        else if ( $sport_number ==  "50") { return "Step_counter";}
        else if ( $sport_number ==  "87") { return "Circuit_Training";}
        else if ( $sport_number ==  "88") { return "Treadmill_running";}
        else if ( $sport_number ==  "89") { return "Skateboarding";}
        else if ( $sport_number ==  "90") { return "Surfing";}
        else if ( $sport_number ==  "91") { return "Snowshoeing";}
        else if ( $sport_number ==  "92") { return "Wheelchair";}
        else if ( $sport_number ==  "93") { return "Climbing";}
        else if ( $sport_number ==  "94") { return "Treadmill_walking";}
        else { return "Some_sport";}
    }
}