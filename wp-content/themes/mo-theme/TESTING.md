# Testing best practices

## Acceptance testing

Used to check if a theme or plugin features are implemented or not.

* Using [Codeception for WordPress](https://codeception.com/for/wordpress)
* The documentation for features is available at https://github.com/lucatume/wp-browser

### Notes

* Codeception tests back-end code like clicking on post titles, filling forms, activating plugins, checking shortcodes etc.
* It doesn't tests front-end code like clicking he hamburger menu the menu contents is revealed. It doesn't knows classes, it doesn't realizes the menu contents are hidden until the icon clicked.


## Unit testing

* Testing will not catch every error in the program, because it cannot evaluate every execution path in any but the most trivial programs.
* For every line of code written, programmers often need 3 to 5 lines of test code. This obviously takes time and its investment may not be worth the effort. 
* There are problems that cannot easily be tested at all.
* Code for a unit test is likely to be at least as buggy as the code it is testing.
* It difficult to set up realistic and useful tests. We might test everything we think should be tested yet in reality, when code deployed, there will be unseen scenarios which break the code even if tests are passing
* ...

### Conclusion

1. Write unit tests for the hardest part of the code, which presented challenges during programming.
2. Write unit tests for all bugs found. 


### Sources 

* https://softwareengineering.stackexchange.com/questions/90217/determining-what-is-a-useful-unit-test
* https://techbeacon.com/1-unit-testing-best-practice-stop-doing-it
* https://en.wikipedia.org/wiki/Unit_testing
* https://torquemag.io/?s=OOP

