# MikroCachePHP
Micro caching functions PHP

This product is licensed under: **[GNU General Public License v3.0](https://github.com/StasToken/MikroCachePHP/blob/master/LICENSE)**

_Disclaimer: This product does not claim to originality of code, and probably needs refinement_

# Note

This class was written by me for the realization of micro-caching code in PHP. Basically this class allows you to cache handling in specific functions, it does not need something additional to configure on the server PHP just install **MicroCache.php** to my project and use.

Please note that this really is not the best solution for caching, PHP provides a special library that implemented this, their performance will be much better, but unfortunately to use such things are not always possible, so this class comes to you for help.

# Language version

- PHP 5.3

- PHP 5.5

- PHP 7.0

# Installation
To install, copy the project files ( to be precise we only need **MicroCache.php** )
> git clone https://github.com/StasToken/MikroCachePHP.git

or

> wget https://codeload.github.com/StasToken/MikroCachePHP/zip/master

Connect **MicroCache.php** to the entry point in your project, you can connect any of the methods:

1. [include()](http://php.net/manual/en/function.include.php)

2. [require_once()](http://php.net/manual/en/function.require-once.php)

3. [require()](http://php.net/manual/en/function.require.php#function.require)

In principle you can use any convenient method of connection is not important.
Actually the setup is now complete.

## Use

Example usage you can see in the file: **test.php**

In the beginning of the function we want to cache, you need to place the design:

`if(MicroCache::check($args)) return MicroCache::readCache($args);`

**_MicroCache::check_** - Checks in-memory cache

**_MicroCache::readCache_** - Returns values from the cache if it is

**_MicroCache::saveCache($data,$args)_** - You need to place wherever there is design _return_ before her call to the method you need to pass the return value and the arguments with which the function was called

**_Please note that all functions can take unlimited arguments, they should pass in the order in which they come to function_** the exception is the method `MicroCache::saveCache($data,$args)` the first parameter should always pass the return value, that it would be preserved in the cache, followed by the arguments that were passed to cached function.

A more detailed example of usage you can always look in: **test.php**

### Example

I wrote not a great example, located in: **test.php** 

It demonstrates the cache on the example of calculating the factorial of a number 

For more visible effect of caching was added a small delay.

Without cache feature was made for: **0.0245 sec.**
After that the function was called with the same arguments were made for: **0.0007 sec.**
as you can see the performance increase was **68%** ( If the author counted correctly )

### Files:

- MicroCache.php - implementation of the cache itself

- test.php - file with examples

- LICENSE - license file

- dump.txt - This is the dump which I got in the last test
