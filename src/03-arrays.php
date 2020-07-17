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

    foreach ($input as $value):
        for ($i = 0; $i < $value; $i++) {
            array_push($newArr, $value);
        }
    endforeach;

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
    $inputLength = count($input);

    if ($inputLength === 0) {
        return 0;
    } else {

        $orderedArr = array(); //multi-array input transformed into one ordered array by the next for cycle

        for ($i = 0; $i < $inputLength; $i++){
            if (is_array($input[$i])) {
                $orderedArr = array_merge($orderedArr, $input[$i]);
            } else {
                array_push($orderedArr, $input[$i]);
            }
        }
        $orderedArrLength = count($orderedArr);

        $onlyUniques = array(); //new array with only unique values created by the next for cycle

        for ($i = 0; $i < $orderedArrLength; $i++) {
            if (isUnique($orderedArr, $orderedArr[$i])) { //isUnique function checks if an element is unique in an array
                array_push($onlyUniques, $orderedArr[$i]);
            }
        }

        if (count($onlyUniques) !== 0) { //checks if the $onlyUniques array have at least 1 element
            return min($onlyUniques);
        } else {
            return 0;
        }
    }
}

function isUnique(array $orderedArr,int $element) //checks if an element is unique in an array
{
    $timesElementFound = 0;

    foreach ($orderedArr as $item):
        if($item === $element) {
            $timesElementFound++;
        }
    endforeach;

    return $timesElementFound === 1;
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

    foreach($input as $value):
        foreach ($value['tags'] as $description):
            $resultArr[$description][] = $value['name'];
        endforeach;
    endforeach;

    foreach ($resultArr as &$item):
        array_multisort($item, SORT_ASC);
    endforeach;

    return $resultArr;
}
