/**
 * Sort numbers in ASC order
 * @param numberArray An unordered array of numbers
 * @returns An ordered array of numbers
 */
export const BubbleSort = (numberArray: number[]): number[] => {
  let sortedIndex = numberArray.length - 1;
  let sorted = false;

  while (!sorted) {
    sorted = true;

    for (let i = 0; i <= sortedIndex; i++) {
      let currentValue = numberArray[i];
      let nextValue = numberArray[i + 1];

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
