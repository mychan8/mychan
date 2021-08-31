<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aux extends Controller
{
	/**
	* @return string nombre aleatorio
	*/
	static public function randomName()
	{
		$firstname = array( 'Ruby', 'Cuba', 'Remedios', 'Chaka', 'Amaranta', 'NPC', 'Floyd', 'Anon', 'Vampiro' );
		$name = $firstname[rand(0, count($firstname) - 1)];
		return $name;
	}

	/**
	* @param int $lenght of password
	* @return string random password 
	*/
	static public function randomPassword($lenght=8)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;

        for ($i = 0; $i < $lenght; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] .= $alphabet[$n];
        }

        return implode($pass);
    }
}
