/**
 * Sort numbers in ASC order
 * @param numberArray An unordered array of numbers
 * @returns An ordered array of numbers
 */
export const SelectionSort = (numberArray: number[]): number[] => {
    let sortedIndex = 0;

    while (sortedIndex < numberArray.length - 1) {
        let minValueIndex = sortedIndex;
        let minValue = numberArray[sortedIndex];

        for (let i = sortedIndex; i <= numberArray.length; i++) {
            if (numberArray[i] < minValue) {
                minValueIndex = i;
                minValue = numberArray[i];
            }
        }

        let currentMin = numberArray[sortedIndex];
        let newMin = numberArray[minValueIndex];

        numberArray[sortedIndex] = newMin;
        numberArray[minValueIndex] = currentMin;

        sortedIndex += 1;
        
    }

    return numberArray;
};
