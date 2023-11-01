/**
 * Sort numbers in ASC order
 * @param numberArray An unordered array of numbers
 * @returns An ordered array of numbers
 */
export const InsertionSort = (numberArray: number[]): number[] => {
  for (let i = 1; i <= numberArray.length - 1; i++) {
    let minValue = numberArray[i];
    let position = i - 1;

    while (position >= 0) {
      if (numberArray[position] > minValue) {
        numberArray[position + 1] = numberArray[position];
        position -= 1;
      } else {
        break;
      }
    }

    numberArray[position + 1] = minValue;
  }

  return numberArray;
};
