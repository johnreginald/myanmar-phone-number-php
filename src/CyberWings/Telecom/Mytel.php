<?php 

namespace CyberWings\Telecom;

class Mytel implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to Mytel Network
     *
     * @param $number Phone Number
     * @return bool
     */
    public function check($number)
	{
		return preg_match( '/^(09|\+?959)6\d{8}$/', $number) ? true : false;
	}
}