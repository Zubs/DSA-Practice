"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.InsertionSort = void 0;
/**
 * Sort numbers in ASC order
 * @param numberArray An unordered array of numbers
 * @returns An ordered array of numbers
 */
var InsertionSort = function (numberArray) {
    for (var i = 1; i <= numberArray.length - 1; i++) {
        var minValue = numberArray[i];
        var position = i - 1;
        while (position >= 0) {
            if (numberArray[position] > minValue) {
                numberArray[position + 1] = numberArray[position];
                position -= 1;
            }
            else {
                break;
            }
        }
        numberArray[position + 1] = minValue;
    }
    return numberArray;
};
exports.InsertionSort = InsertionSort;
