"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.partition = exports.QuickSort = void 0;
var QuickSort = function (numberArray) {
    if (numberArray.length <= 1) {
        return numberArray;
    }
    var pivotIndex = (0, exports.partition)(numberArray, 0, numberArray.length - 1);
    console.log({
        pivotIndex: pivotIndex,
        numberArray: numberArray,
    });
    // QuickSort(numberArray.slice(0, pivotIndex));
    //
    // QuickSort(numberArray.slice(pivotIndex + 1));
    return numberArray;
};
exports.QuickSort = QuickSort;
var partition = function (numberArray, leftPointer, rightPointer) {
    // Use the rightmost element as the pivot
    var pivotIndex = rightPointer;
    var pivotValue = numberArray[pivotIndex];
    // Use the element before the pivot as the right pointer
    rightPointer -= 1;
    while (true) {
        /**
         * STEP 1: The left pointer continuously moves one cell to the right until it reaches
         * a value that is greater than or equal to the pivot, and then stops.
         */
        while (numberArray[leftPointer] < pivotValue) {
            leftPointer += 1;
        }
        /**
         * STEP 2: Then, the right pointer continuously moves one cell to the left until it
         * reaches a value that is less than or equal to the pivot, and then stops.
         * The right pointer will also stop if it reaches the beginning of the array.
         */
        while (numberArray[rightPointer] > pivotValue) {
            // Stop when at the beginning of the array
            if (rightPointer === 0) {
                break;
            }
            rightPointer -= 1;
        }
        /**
         * STEP 3: Once the right pointer has stopped, we reach a crossroads.
         * If the left pointer has reached (or gone beyond) the right pointer,
         * we move on to STEP 4.
         */
        if (leftPointer >= rightPointer) {
            break;
        }
        else {
            /**
             * STEP 3: Otherwise, we swap the values that the left and right pointers are
             * pointing to, and then go back to repeat Steps 1, 2, and 3 again.
             */
            var temp_1 = numberArray[leftPointer];
            numberArray[leftPointer] = numberArray[rightPointer];
            numberArray[rightPointer] = temp_1;
        }
        // At this point, left and right pointer values have been swapped
        // Increment the left pointer to restart the process
        leftPointer += 1;
    }
    /**
     * STEP 4: Finally, we swap the pivot with the value that the left pointer is currently
     * pointing to.
     */
    var temp = numberArray[leftPointer];
    numberArray[leftPointer] = numberArray[pivotIndex];
    numberArray[pivotIndex] = temp;
    return leftPointer;
};
exports.partition = partition;
