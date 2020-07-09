<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater than 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute)
{
    if ($minute < 0 || $minute > 60) {
        throw new InvalidArgumentException("Expected integer from 0 to 60.");
    } else if ($minute > 45 || $minute === 0) {
        return "fourth";
    } else if ($minute > 30) {
        return "third";
    } else if ($minute > 15) {
        return "second";
    } else if ($minute > 0) {
        return "first";
    }
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower than 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year)
{
    {
        if ($year >= 1900) {
            return ($year % 4) == 0;
        } else {
            throw new InvalidArgumentException("Year is lower than 1900.");
        }
    }
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more or less than 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input)
{
    if (strlen($input) === 6) {
        $arrNums = str_split($input);
        return ($arrNums[0] + $arrNums[1] + $arrNums[2]) === ($arrNums[3] + $arrNums[4] + $arrNums[5]);
    } else {
        throw new InvalidArgumentException("Wrong length. Only 6 digits allowed.");
    }
}