<?php 

namespace CyberWings\Telecom;

class MPT implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to MPT Network
     *
     * @param $number Phone Number
     * @return bool
     */
	public function check($number)
	{
		return preg_match(
			'/^(09|\+?959)(5\d{6}|4\d{7,8}|2\d{6,8}|3\d{7,8}|6\d{6}|8\d{6}|7\d{7}|9(0|1|9)\d{5,6})$/', 
			$number
		) ? true : false;
	}
}