# Zubs' PHP DSA Practice

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/ebb131dc82424ed3b5edcc76c0b8268f)](https://app.codacy.com/gh/Zubs/DSA-Practice/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)

Here, I practice all the things I learn from the [PHP 7 Data Structures And Algorithms]() book I'm reading.

I also picked up some videos and great articles too. See below for links.

## Topics
### Data Structures
* [PHP Linked List](./php/src/LinkedList)
  * Searching, O(n): Having to traverse every element to find search item.
  * Insertion, O(1) - O(n): Inserting at the head (start) takes constant time but insertion anywhere else requires some amount of traversal.
  * Deletion, O(1) - O(n): Same as insertion, removing the first node takes a constant time while removal from any other position requires some traversal.
  * Traversal, O(n): Have to look at every node.
  * <b>Space Complexity, O(n):</b> New nodes take up more memory.
* [PHP Stack](./php/src/Stack)
* [PHP Binary Search Tree](./php/src/BinarySearchTree)
  * Searching, O(log n) - O(n): Depending on how balanced the Tree is. In a perfectly balanced Tree, searching is same as in an array using binary search as every level deeper reduces the options by half. But in the most unbalanced tree, it's identical to a LinkedList and you'd have to traverse every item.
  * Insertion, O(log n) - O(n): Same as searching. The shape of the tree affects the operation.
  * Deletion, O(log n) - O(n): This depends on first finding the node to remove, so it is as fast as you can search.
  * Traversal, O(n): Looks at every node.
  * <b>Space Complexity, O(n):</b> New nodes take up more memory.
* AVL Tree: A self-balancing Binary Search Tree. Operations are O(log n) as it's always best case scenario.
* Red-Black Tree: Another self-balancing Tree. Operations are O(log n) as it's always best case scenario even though it's not always perfectly balanced.
* [PHP Hash Table](./php/src/HashTable) aka HashMap.
  * Insertion, O(1): Using unique hashes avoid collisions and gives constant insertions.
  * Searching, O(1): Constant time lookup due to unique hashes again.
  * Deletion, O(1): Constant time lookup and removal.
  * Traversal (Listing all items), O(n): Listing all items involves actually traversing every item.
  * <b>Worst Case Scenario:</b> When hashes are not unique, collisions occur and a LinkedList might be employed. This leads to O(n) time for all operations.
  * <b>Space Complexity, O(n):</b> New key-value pairs use new memory space.
* [PHP Binary Max Heap](./php/src/BinaryMaxHeap)

### Algorithms
* [TS Binary Search](./ts/src/Array/BinarySearch.ts)
* [TS Bubble Sort](./ts/src/Array/BubbleSort.ts)
* [TS Selection Sort](./ts/src/Array/SelectionSort.ts)
* [TS Insertion Sort](./ts/src/Array/InsertionSort.ts)
* [TS Quick Sort](./ts/src/Array/QuickSort.ts)

## Articles
* [Binary Tree Implementation in PHP](https://medium.com/the-andela-way/binary-tree-implementation-in-php-e12df09d046f)
* [JavaScript Hash Table – Associative Array Hashing in JS](https://www.freecodecamp.org/news/javascript-hash-table-associative-array-hashing-in-js/)
