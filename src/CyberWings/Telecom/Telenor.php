<?php 

namespace CyberWings\Telecom;

class Telenor implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to Telenor Network
     *
     * @param $number Phone Number
     * @return bool
     */
    public function check($number)
	{
		return preg_match( '/^(09|\+?959)7\d{8}$/', $number) ? true : false;
	}
}