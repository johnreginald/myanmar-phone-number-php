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
            '/^(09|\+?959)(2[0-4]\d{5}|5[0-6]\d{5}|8[13-7]\d{5}|4[1379]\d{6}|73\d{6}|91\d{6}|25\d{7}|26[0-5]\d{6}|40[0-4]\d{6}|42\d{7}|44[0-589]\d{6}|45\d{7}|87\d{7}|89[6789]\d{6})$/',
            $number
        ) ? true : false;
	}
}