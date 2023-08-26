const { LinearSearch, OrderedLinearSearch } = require('../../dist/LinearSearch');
const { BinarySearch } = require('../../dist/BinarySearch');

const array = [20, 35, 16, 96, 64, 8, 68, 95, 30, 25];
const orderedArray = [8, 16, 20, 25, 30, 35, 64, 68, 95, 96];

console.log(LinearSearch(array, 25)); // Returns 9
console.log(LinearSearch(array, 64)); // Returns 4
console.log(LinearSearch(array, 65)); // Returns -1
console.log(OrderedLinearSearch(orderedArray, 25)); // Returns 3
console.log(OrderedLinearSearch(orderedArray, 64)); // Returns 6
console.log(OrderedLinearSearch(orderedArray, 65)); // Returns -1
console.log(BinarySearch(orderedArray, 25)); // Returns 3
console.log(BinarySearch(orderedArray, 64)); // Returns 6
console.log(BinarySearch(orderedArray, 65)); // Returns -1
