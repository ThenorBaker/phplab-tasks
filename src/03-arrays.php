<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array  $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $newArr = array();

    foreach ($input as $value) {
        for ($i = 0; $i < $value; $i++) {
            array_push($newArr, $value);
        }
    }

    return $newArr;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array  $input
 * @return int
 */
function getUniqueValue(array $input)
{
    $minUnique = 0;

    if (!empty($input)) {
        $onlyUniques = [];

        foreach ($input as $item) {
            if (isUnique($input, $item)) array_push($onlyUniques, $item);
        }

        if (!empty($onlyUniques)) $minUnique = min($onlyUniques);
    }

    return $minUnique;
}

function isUnique(array $arr,int $i)
{
    $matches = 0;

    foreach ($arr as $item) {
        if ($item === $i) $matches++;
    }

    return $matches === 1;
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array  $input
 * @return array
 */
function groupByTag(array $input)
{
    $resultArr = array();

    foreach($input as $value) {
        foreach ($value['tags'] as $description) {
            $resultArr[$description][] = $value['name'];
        }
    }

    foreach ($resultArr as &$item) {
        array_multisort($item, SORT_ASC);
    }

    return $resultArr;
}
