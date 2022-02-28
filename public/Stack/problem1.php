<?php

use Zubs\Dsa\Stack\ArrayStack;

include_once __DIR__ . '/../functions.php';

/**
 * Checks if a mathematical expression is valid based on the parenthesis in it.
 * @param string $expression Mathematical expression to be evaluated
 * @return bool true when the expression is valid
 */
function expressionChecker (string $expression): bool {
    $valid = true;
    $stack = new ArrayStack(strlen($expression));
    $chars = explode(' ', $expression);

    foreach ($chars as $char) {
        switch ($char) {
            case "(":
            case "{":
            case "[":
                $stack->push($char);
                break;
            case ")":
            case "}":
            case "]":
                if ($stack->isEmpty()) $valid = false;
                else {
                    $last = $stack->pop();

                    if (
                        $char === ")" && $last !== "(" ||
                        $char === "}" && $last !== "{" ||
                        $char === "]" && $last !== "["
                    ) $valid = false;
                }
                break;
        }
    }

    if (!$stack->isEmpty()) $valid = false;

    return $valid;
}

$expressions = [
    "8 * ( 9 - 2 ) + { ( 4 * 5 ) / ( 2 * 2 ) }", // returns true
    "5 * 8 * 9 / ( 3 * 2 ) )", // returns false
    "[ { ( 2 * 7 ) + ( 15 - 3 ) ]" // returns true
];

showHeader('Stack application 1');
foreach ($expressions as $expression) {
    if (expressionChecker($expression)) echo "Expression is valid" . PHP_EOL;
    else echo "Expression is invalid" . PHP_EOL;
}
