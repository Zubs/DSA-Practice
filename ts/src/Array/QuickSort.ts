export class SortableArray {
  private numberArray: number[];

  constructor(numberArray: number[]) {
    this.numberArray = numberArray;
  }

  /**
   * Sort numbers in ASC order
   *
   * @param leftIndex Starting index of the (sub) array to sort - defaults to 0 for the entire array
   * @param rightIndex Stop index of the (sub) array to sort - defaults to the last index of the array
   *
   * @returns An ordered array of numbers
   */
  quickSort(
    leftIndex: number = 0,
    rightIndex: number = this.numberArray.length - 1
  ): number[] | void {
    if (rightIndex - leftIndex <= 0) {
      return;
    }

    const pivotIndex = this.partition(leftIndex, rightIndex);

    this.quickSort(leftIndex, pivotIndex - 1);

    this.quickSort(pivotIndex + 1, rightIndex);

    return this.numberArray;
  }

  /**
   * Find the nth lowest value in an unordered array
   * @param nthLowestValue The nth lowest value to find
   * @param leftIndex Starting index of the (sub) array to sort - defaults to 0 for the entire array
   * @param rightIndex Stop index of the (sub) array to sort - defaults to the last index of the array
   *
   * @returns The nth lowest value in the array
   */
  quickSelect(
    nthLowestValue: number,
    leftIndex: number = 0,
    rightIndex: number = this.numberArray.length - 1
  ): number {
    if (rightIndex - leftIndex <= 0) {
      return this.numberArray[leftIndex];
    }

    const pivotIndex = this.partition(leftIndex, rightIndex);

    if (pivotIndex === nthLowestValue) {
      return this.numberArray[pivotIndex];
    } else if (pivotIndex > nthLowestValue) {
      return this.quickSelect(nthLowestValue, leftIndex, pivotIndex - 1);
    } else {
      return this.quickSelect(nthLowestValue, pivotIndex + 1, rightIndex);
    }
  }

  private partition(leftPointer: number, rightPointer: number): number {
    // Use the rightmost element as the pivot
    let pivotIndex = rightPointer;
    const pivotValue = this.numberArray[pivotIndex];
    // Use the element before the pivot as the right pointer
    rightPointer -= 1;

    while (true) {
      /**
       * STEP 1: The left pointer continuously moves one cell to the right until it reaches
       * a value that is greater than or equal to the pivot, and then stops.
       */
      while (this.numberArray[leftPointer] < pivotValue) {
        leftPointer += 1;
      }

      /**
       * STEP 2: Then, the right pointer continuously moves one cell to the left until it
       * reaches a value that is less than or equal to the pivot, and then stops.
       * The right pointer will also stop if it reaches the beginning of the array.
       */
      while (this.numberArray[rightPointer] > pivotValue) {
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
      } else {
        /**
         * STEP 3: Otherwise, we swap the values that the left and right pointers are
         * pointing to, and then go back to repeat Steps 1, 2, and 3 again.
         */
        const temp = this.numberArray[leftPointer];
        this.numberArray[leftPointer] = this.numberArray[rightPointer];
        this.numberArray[rightPointer] = temp;
      }

      // At this point, left and right pointer values have been swapped
      // Increment the left pointer to restart the process
      leftPointer += 1;
    }

    /**
     * STEP 4: Finally, we swap the pivot with the value that the left pointer is currently
     * pointing to.
     */
    const temp = this.numberArray[leftPointer];
    this.numberArray[leftPointer] = this.numberArray[pivotIndex];
    this.numberArray[pivotIndex] = temp;

    return leftPointer;
  }
}
