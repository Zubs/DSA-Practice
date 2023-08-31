"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.SelectionSort = void 0;
/**
 * Sort numbers in ASC order
 * @param numberArray An unordered array of numbers
 * @returns An ordered array of numbers
 */
var SelectionSort = function (numberArray) {
    var sortedIndex = 0;
    while (sortedIndex < numberArray.length - 1) {
        var minValueIndex = sortedIndex;
        var minValue = numberArray[sortedIndex];
        for (var i = sortedIndex; i <= numberArray.length; i++) {
            if (numberArray[i] < minValue) {
                minValueIndex = i;
                minValue = numberArray[i];
            }
        }
        var currentMin = numberArray[sortedIndex];
        var newMin = numberArray[minValueIndex];
        numberArray[sortedIndex] = newMin;
        numberArray[minValueIndex] = currentMin;
        sortedIndex += 1;
    }
    return numberArray;
};
exports.SelectionSort = SelectionSort;
