const { LinearSearch, OrderedLinearSearch } = require('../../dist/LinearSearch');

const array = [1, 3, 7, 15, 4];
const orderedArray = [5, 6, 9, 11, 13];

console.log(LinearSearch(array, 9)); // Returns -1
console.log(LinearSearch(array, 4)); // Returns 4
console.log(OrderedLinearSearch(orderedArray, 9)); // Returns 2
console.log(OrderedLinearSearch(orderedArray, 4)); // Returns -1
