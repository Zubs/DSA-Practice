const { LinearSearch, OrderedLinearSearch } = require("../dist/LinearSearch");
const { BinarySearch } = require("../dist/BinarySearch");
const { BubbleSort } = require("../dist/BubbleSort");
const { SelectionSort } = require("../dist/SelectionSort");
const { InsertionSort } = require("../dist/InsertionSort");
const { QuickSort } = require("../dist/QuickSort");

describe("LinearSearch", () => {
    it.each([
        { target: 25, array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: 9 },
        { target: 64, array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: 4 },
        { target: 65, array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: -1 },
        { target: 9, array: [-1, 0, 3, 5, 9, 12], solution: 4 },
        { target: 2, array: [-1, 0, 3, 5, 9, 12], solution: -1 },
    ])("should return correct value", ({ target, array, solution }) => {
        expect(LinearSearch(array, target)).toBe(solution);
    });
});

describe("OrderedLinearSearch", () => {
    it.each([
        { target: 25, array: [8, 16, 20, 25, 30, 35, 64, 68, 95, 96], solution: 3 },
        { target: 64, array: [8, 16, 20, 25, 30, 35, 64, 68, 95, 96], solution: 6 },
        { target: 65, array: [8, 16, 20, 25, 30, 35, 64, 68, 95, 96], solution: -1 },
        { target: 9, array: [-1, 0, 3, 5, 9, 12], solution: 4 },
        { target: 2, array: [-1, 0, 3, 5, 9, 12], solution: -1 },
    ])("should return correct value", ({ target, array, solution }) => {
        expect(OrderedLinearSearch(array, target)).toBe(solution);
    });
});

describe("BinarySearch", () => {
    it.each([
        { target: 25, array: [8, 16, 20, 25, 30, 35, 64, 68, 95, 96], solution: 3 },
        { target: 64, array: [8, 16, 20, 25, 30, 35, 64, 68, 95, 96], solution: 6 },
        { target: 65, array: [8, 16, 20, 25, 30, 35, 64, 68, 95, 96], solution: -1 },
        { target: 9, array: [-1, 0, 3, 5, 9, 12], solution: 4 },
        { target: 2, array: [-1, 0, 3, 5, 9, 12], solution: -1 },
    ])("should return correct value", ({ target, array, solution }) => {
        expect(BinarySearch(array, target)).toBe(solution);
    });
});

describe("BubbleSort", () => {
    it.each([
        { array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: [ 8, 16, 20, 25, 30, 35, 64, 68, 95, 96 ] },
    ])("should return correct value", ({ array, solution }) => {
        expect(BubbleSort(array)).toEqual(solution);
    });
});

describe("SelectionSort", () => {
    it.each([
        { array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: [ 8, 16, 20, 25, 30, 35, 64, 68, 95, 96 ] },
    ])("should return correct value", ({ array, solution }) => {
        expect(SelectionSort(array)).toEqual(solution);
    });
});

describe("InsertionSort", () => {
    it.each([
        { array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: [ 8, 16, 20, 25, 30, 35, 64, 68, 95, 96 ] },
    ])("should return correct value", ({ array, solution }) => {
        expect(InsertionSort(array)).toEqual(solution);
    });
});

describe.only("QuickSort partition", () => {
    it.each([
        { array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: [20,  8, 16, 25, 64, 35, 68, 95, 30, 96 ] },
        { array: [20,  8, 16, 25, 64, 35, 68, 95, 30, 96], solution: [20,  8, 16, 25, 64, 35, 68, 95, 30, 96 ] },
    ])("should return correct value", ({ array, solution }) => {
        expect(QuickSort(array)).toEqual(solution);
    });
});

describe("QuickSort", () => {
    it.each([
        { array: [20, 35, 16, 96, 64, 8, 68, 95, 30, 25], solution: [ 8, 16, 20, 25, 30, 35, 64, 68, 95, 96 ] },
    ])("should return correct value", ({ array, solution }) => {
        expect(QuickSort(array)).toEqual(solution);
    });
});
