# Developer's Best Friend

## Live URL
<http://p3.ben-jenkins.com/>

## Description
### An assortment of development tools. Currently includes
* Abort, Retry, Ignorum - A Lorem Ipsum Generator in the style of the Midnight Dreary poem.
* Random User Generator - A random user generator which includes images and contact info.
* xkcd-Style Password Generator - A password generator based off of a popular xkcd comic.
* Laravel Comment Formatter - A tool which formats text in the style of a Laravel comment.


## Demo URL
<https://youtu.be/XJJ7ZLNt_R4>

## Details for teaching team
### IDE files
My GitHub project has an *.idea* folder and a *p3.iml* file committed. These are configuration files for the IDE I use, IntelliJ IDEA, and are not outside code.

### Validation
I use an alternative form of validation than what is described in the lecture. All of my validation is done in subclasses of the FormRequest object. They are found in `p3/app/Http/Requests`

## Outside code
* Bootstrap: http://getbootstrap.com/
* Bootstrap Journal Theme: https://bootswatch.com/journal/
* JQuery (Used by Bootstrap): https://jquery.com/
* Font-Awesome (An icon format): http://fontawesome.io/

### Composer Packages
#### Laravel
* "php": ">=5.6.4",
* "laravel/framework": "5.3.*",
* "mockery/mockery": "0.9.*",
* "phpunit/phpunit": "~5.0",
* "symfony/css-selector": "3.1.*",
* "symfony/dom-crawler": "3.1.*"

#### Project-specific
* "barryvdh/laravel-debugbar": "^2.3": Used for debugging on local setup. 
* "rap2hpoutre/laravel-log-viewer": "^0.7.0": Used for easier log viewing.
* "rych/random": "^0.1.0": Used to get a random digit in password generator.
* "fadion/rule": "^1.1": Used to create validation with a builder, instead of a string. I find it easier to understand and appreciate the IDEs ability to autosuggest what rules are available.
* "fzaninotto/faker": "~1.4": Used to generate fake user data.