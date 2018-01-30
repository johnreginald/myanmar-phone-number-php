<?php 

namespace CyberWings;

class Sanitizer
{
    /**
     * @var Phone Number Input
     */
    private $number;

    /**
     * Clean White Space, Spacees and Dash
     *
     * Example TestCase
     * '   09978412345   ' to '09978412345'
     * '09 978 412 345' to '09978412345'
     * '09-978-412-34-5' to '09978412345'
     *
     * @return $this
     */
    private function clean_white_space_and_dash()
	{
		$this->number = preg_replace('/[- )(]/', '', trim( $this->number ));
		return $this;
	}

    /**
     * Clean Double Country Code
     *
     * Example TestCase
     * '+95959978412345' to '+959978412345'
     *
     * @return $this
     */
    private function clean_double_country_code()
	{
		// Prepare Replacer
		$replacer = "+959" . preg_replace('/^\+?95959/', '', $this->number);

        // if Double Country Code is found, then replace
		$this->number = preg_replace('/^\+?95950?9\d{7,9}$/', $replacer, $this->number);

		return $this;
	}

    /**
     * Clean Zero Before Country Code - 95
     *
     * Example TestCase
     * '+9509978412345' to '+959978412345'
     *
     * @return $this
     */
    private function clean_zero_before_country_code()
	{
		// Prepare Replacer
		$replacer = preg_replace('/9509/', '959', $this->number);

		$this->number = preg_replace('/^\+?9509\d{7,9}$/', $replacer, $this->number);

		return $this;
	}

    /**
     * @param $number Phone Number Input from User
     * @return integer Sanitized Phone Number
     */
    public function clean($number)
	{
		$this->number = $number;

		$this->clean_white_space_and_dash()
				->clean_zero_before_country_code()
				->clean_double_country_code();

		return $this->number;
	}
}