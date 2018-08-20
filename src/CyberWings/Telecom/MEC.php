<?php 

namespace CyberWings\Telecom;

class MEC implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to MEC Network
     *
     * @param $number Phone Number
     * @return bool
     */
    public function check($number)
	{
		return preg_match( '/^(09|\+?959)3\d{7}$/', $number) ? true : false;
	}
}