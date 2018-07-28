<?php

namespace mvc\library;

class UserSecurity
{
	public static generateSalt($length = 10)
	{
		$chars = 'abcdefhiknrstvwxyzETAOINSHRDLCUMWFGYPBVKXJQZ0123456789';

		$numChars = strlen($chars);

		$string = null;

		for ($i = 0; $i < $length; $i++) {
			$string .= substr($chars, rand(1, $numChars) - 1, 1);
		}

		return $string;
	}
}