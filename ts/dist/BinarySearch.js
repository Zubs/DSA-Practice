"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.BinarySearch = void 0;
/**
 * Search for a number in an ordered array
 * @param orderedNumberArray
 * @param targetNumber A number to search for in the array
 * @returns The index of the found number, or -1 when not found
 */
var BinarySearch = function (orderedNumberArray, targetNumber) {
    var leftIndex = 0;
    var rightIndex = orderedNumberArray.length - 1;
    var middle;
    var valueAtMiddle;
    var foundIndex = -1;
    while (leftIndex <= rightIndex) {
        middle = Math.floor((rightIndex + leftIndex) / 2);
        valueAtMiddle = orderedNumberArray[middle];
        if (valueAtMiddle === targetNumber) {
            foundIndex = middle;
            break;
        }
        else if (valueAtMiddle > targetNumber) {
            rightIndex = middle - 1;
        }
        else if (valueAtMiddle < targetNumber) {
            leftIndex = middle + 1;
        }
    }
    return foundIndex;
};
exports.BinarySearch = BinarySearch;
