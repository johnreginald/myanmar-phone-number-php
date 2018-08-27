<?php 

namespace CyberWings\Telecom;

class Ooredoo implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to Ooredoo Network
     *
     * @param $number Phone Number
     * @return bool
     */
	public function check($number)
	{
		return preg_match('/^(09|\+?959)9\d{8}$/', $number) ? true : false;
	}
}