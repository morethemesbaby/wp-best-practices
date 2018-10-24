# Testing best practices

WordPress plugins and themes can be tested all the way around. From bottom up:

* Unit tests &mdash; to test pure PHP code which has nothing to do with WordPress
* Integration / WPUnit tests &mdash; to test WordPress specific code like `the_title()` tag is rendering well
* Functional / Database tests &mdash; to test requests and interactions with the data like inserting a new Post is successful.
* Acceptance tests &mdash; to make sure all plugin or theme features are working well in the browser, like shortcodes, widgets, custom post types.
* Javascript / QUnit tests &mdash; to test interactions on the user interface provided by Javascript, like clicking on a menu icon reveals the menu content.

## Unit testing

Using PHPUnit which is incorporated in [Codeception](https://codeception.com/docs/05-UnitTests).
Tests made in PHPUnit are perfectly runnable with Codeception.

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


## Integration / WPUnit testing

* Using [Codeception for WordPress](https://codeception.com/for/wordpress)
* The documentation for features is available at https://core.trac.wordpress.org/browser/trunk/tests/phpunit/


## Functional / Database testing

* Using [Codeception for WordPress](https://codeception.com/for/wordpress)


## Acceptance testing

Used to check if a theme or plugin features is implemented or not.

* Using [Codeception for WordPress](https://codeception.com/for/wordpress)
* The documentation for features is available at https://github.com/lucatume/wp-browser

### Notes

* Codeception tests back-end code like clicking on post titles, filling forms, activating plugins, checking shortcodes etc.
* It doesn't tests front-end code like clicking he hamburger menu the menu contents is revealed. It doesn't knows classes, it doesn't realizes the menu contents are hidden until the icon clicked.

### Conclusion

* Use Acceptance testing to make sure all features work.

## Javascript / QUnit testing

It seems QUnit, like any other unit testing framework, runs the tests in isolation. On their github page https://github.com/qunitjs/qunit/tree/master/test each test consist of a `.html` and a `.js` file.

We might need here another higher level framework for acceptance testing directly in the browser with the live WordPress site.