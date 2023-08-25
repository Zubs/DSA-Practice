"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.LinearSearch = void 0;
/**
 * Search for a number in an array
 * @param numberArray An unordered array of numbers
 * @param targetNumber A number to search for in the array
 * @returns The index of the found number, or -1 when not found
 */
var LinearSearch = function (numberArray, targetNumber) {
    var arraySize = numberArray.length;
    var foundIndex = -1;
    for (var index = 0; index < arraySize; index++) {
        if (numberArray[index] === targetNumber) {
            foundIndex = index;
            break;
        }
    }
    return foundIndex;
};
exports.LinearSearch = LinearSearch;
