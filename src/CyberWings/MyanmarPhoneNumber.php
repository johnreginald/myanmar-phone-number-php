<?php 

namespace CyberWings;

class MyanmarPhoneNumber
{
    /**
     * @var Sanitizer Instance
     */
    private $sanitizer;

    public function __construct()
	{
		$this->sanitizer = new Sanitizer();
	}

    /**
     * Validate for Phone Number
     *
     * @param $number "Phone Number Input"
     * @return bool
     */
    public function is_valid($number)
	{
		return preg_match(
			'/^(09|\+?950?9|\+?95950?9)\d{7,9}$/', $this->sanitizer->clean( $number )
		) ? true : false;
	}

    /**
     * Validate for provided Phone Number is belongs to provided Telecom
     *
     * @param $telecom_name "Telecom Name"
     * @param $number "Phone Number Input"
     * @return bool
     */
    public function is_telecom($telecom_name, $number)
	{
		if ( $this->is_valid($number) ) {

			switch ( strtolower($telecom_name) ) {
				case "telenor":
					$telecom = new Telecom\Telenor();
					break;

				case "ooredoo":
					$telecom = new Telecom\Ooredoo();
					break;

				case "mpt":
					$telecom = new Telecom\MPT();
					break;

                case "mytel":
                    $telecom = new Telecom\Mytel();
                    break;

				default: 
					die("Invalid Operator Name");
					break;
			}

			return $telecom->check( $number );
		}
	}

    /**
     * Get Telecom Name with provided Phone Number
     *
     * @param $number "Phone Number"
     * @return string "Telecom Name"
     */
    public function telecom_name($number)
	{
		if ( $this->is_telecom('telenor', $number) ) {
			return "Telenor";
		}

		if ( $this->is_telecom('ooredoo', $number) ) {
			return "Ooredoo";
		}

		if ( $this->is_telecom('mpt', $number) ) {
			return "MPT";
		}

        if ( $this->is_telecom('mytel', $number) ) {
            return "Mytel";
        }

		return "Unknown";
	}

    /**
     * Prepend Myanmar Country Code ( 959 ) to provided Phone Number
     *
     * @param $number
     * @return bool|mixed
     */
    public function add_prefix($number)
	{
		if ( $this->is_valid( $number ) ) {
			return preg_replace('/^\+?959|09/', '959', $number);
		}

		return false;
	}
}