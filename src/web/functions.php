<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */

function getUniqueFirstLetters(array $airports)
{
    // put your logic here
    $letterBox = [];

    foreach($airports as $value){
        $letterBox[] = $value['name'][0];
    }

    $letterBox = array_unique($letterBox);
    sort($letterBox);

    return $letterBox;
}

/**
 * Returns array of arrays filtered by first letter of name
 * @param  array  $airports
 * @param  string $letter
 * @return mixed[]
 */

function firstLetterFiltering(array $airports, string $letter)
{
    foreach ($airports as $key => $airport) {
        if(isset($airport['name']) && is_string($airport['name'])){
            $firstLetter = $airport['name'][0];
            if(strtolower($firstLetter) !== strtolower($letter)){
                unset($airports[$key]);
            }
        } else {
            throw new InvalidArgumentException('Airport name is not a string');
        }
    }

    return $airports;
}

/**
 * Returns array of arrays filtered by specific state (e. g., only Texas)
 * @param  array  $airports
 * @param  string $state
 * @return mixed[]
 */

function stateFiltering($airports, $state)
{
    foreach ($airports as $key => $airport) {
        if($airport['state'] !== $state){
        unset($airports[$key]);
        }
    }

    return $airports;
}

/**
 * Returns array of arrays sorted ascending by specific key (name, code, state, city)
 * @param  array  $airports
 * @param  string $sortKey
 * @return mixed[]
 */

function sortByKey($airports, $sortKey)
{
        usort($airports, function ($a, $b) use ($sortKey) {
            return ($a[$sortKey] <=> $b[$sortKey]);
        });

    return $airports;
}

/**
 * Returns total pages count
 * @param  array  $airports
 * @return int
 */

function getPagesCount($airports){
    return (int) ceil(count($airports) / PER_PAGE);
}

/**
 * Returns a peace of array that will be displayed at the page
 * @param  array  $airports
 * @param  int  $currentPage
 * @return mixed[]
 */

function getPagination($airports, $currentPage)
{
    return array_slice($airports, ($currentPage - 1) * PER_PAGE, PER_PAGE);
}

/**
 * Returns the generated URL
 * @param array $currentURL
 * @param string $key
 * @param mixed $value
 * @param boolean $pageReset
 * @return string
 */

function getURL($currentURL, $key, $value, $pageReset = false)
{
    if($pageReset) {
        $currentURL['page'] = 1;
    }

    $additionalURL = [$key => $value];

    return "/?" . http_build_query(array_merge($currentURL, $additionalURL));
}
