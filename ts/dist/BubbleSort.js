"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.BubbleSort = void 0;
/**
 * Sort numbers in ASC order
 * @param numberArray An unordered array of numbers
 * @returns An ordered array of numbers
 */
var BubbleSort = function (numberArray) {
    var sortedIndex = numberArray.length - 1;
    var sorted = false;
    while (!sorted) {
        sorted = true;
        for (var i = 0; i <= sortedIndex; i++) {
            var currentValue = numberArray[i];
            var nextValue = numberArray[i + 1];
            if (currentValue > nextValue) {
                numberArray[i] = nextValue;
                numberArray[i + 1] = currentValue;
                sorted = false;
            }
        }
        sortedIndex -= 1;
    }
    return numberArray;
};
exports.BubbleSort = BubbleSort;
