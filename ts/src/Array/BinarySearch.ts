/**
 * Search for a number in an ordered array
 * @param orderedNumberArray
 * @param targetNumber A number to search for in the array
 * @returns The index of the found number, or -1 when not found
 */
export const BinarySearch = (
  orderedNumberArray: number[],
  targetNumber: number
): number => {
  let leftIndex = 0;
  let rightIndex = orderedNumberArray.length - 1;
  let middle: number;
  let valueAtMiddle: number;
  let foundIndex = -1;

  while (leftIndex <= rightIndex) {
    middle = Math.floor((rightIndex + leftIndex) / 2);
    valueAtMiddle = orderedNumberArray[middle];

    if (valueAtMiddle === targetNumber) {
      foundIndex = middle;
      break;
    } else if (valueAtMiddle > targetNumber) {
      rightIndex = middle - 1;
    } else if (valueAtMiddle < targetNumber) {
      leftIndex = middle + 1;
    }
  }

  return foundIndex;
};
