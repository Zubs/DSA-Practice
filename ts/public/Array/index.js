const { LinearSearch } = require('../../dist/LinearSearch');

const array = [1, 3, 7, 15, 4];

const indexOfNine = LinearSearch(array, 9);
const indexOfFour = LinearSearch(array, 4);

console.log(indexOfNine); // Returns -1
console.log(indexOfFour); // Returns 4
