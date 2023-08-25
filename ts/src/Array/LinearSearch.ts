/**
 * Search for a number in an array
 * @param numberArray An unordered array of numbers
 * @param targetNumber A number to search for in the array
 * @returns The index of the found number, or -1 when not found
 */
export const LinearSearch = (numberArray: number[], targetNumber: number): number => {
    let arraySize = numberArray.length;
    let foundIndex = -1;

    for(let index = 0; index < arraySize; index++) {
        if (numberArray[index] === targetNumber) {
            foundIndex = index;
            break;
        }
    }

    return foundIndex;
};
