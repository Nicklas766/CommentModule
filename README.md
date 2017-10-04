[![Build Status](https://travis-ci.org/Nicklas766/Comment.svg?branch=master)](https://travis-ci.org/Nicklas766/Comment)
[![CircleCI](https://circleci.com/gh/Nicklas766/Comment.svg?style=svg)](https://circleci.com/gh/Nicklas766/Comment)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Nicklas766/Comment/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Nicklas766/Comment/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Nicklas766/Comment/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Nicklas766/Comment/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Nicklas766/Comment/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Nicklas766/Comment/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b5c041be-12ba-45e8-bd50-7b52928895e3/mini.png)](https://insight.sensiolabs.com/projects/b5c041be-12ba-45e8-bd50-7b52928895e3)

Comment Module for Anax
==================================

[![Join the chat at https://gitter.im/Nicklas766/Comment](https://badges.gitter.im/Nicklas766/Comment.svg)](https://gitter.im/Nicklas766/Comment?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)


About
------------------

This is a comment module for the Anax framework. This README.md assumes you have a
decent knowledge of the Anax-framework.

There's no style included in this, therefore it will not look that great. If you want
to add style you can study the `/views` and add style or change the classes.


Setup
------------------

Let's get started. You can use composer to install the package, then we will integrate the module with
your Anax.

### Install with composer

```
composer require nicklas/comment
```

### Router files

1. Copy the `config/route/comment` catalog and paste it in your own Anax installation.
2. Copy code in the `config/route.php` and paste it in your own `config/route.php`.

### DI-container

Copy everything that lies in the `config/di.php` and paste it in your own DI-container. Also
make sure that you add any dependency that you might not added already.

Also don't be surprised that we're adding a `renderpage` class, since this comment
module uses it's own renderpage functions, therefore we need to add them in our DI.

### Database

Use the SQL-code in the `src/Comment/sql/setup.sql` to setup your database.

You'll need a `config/database.php` file. In other words, you'll need a normal setup for
[anax\database](https://github.com/canax/database). If you already have a file, then you can use that one.

### Views

In `/views` you'll find the views for the module. You can copy them and paste it to your
own Anax installation or study them and make your own. (No style is included)

License
------------------

This software carries a MIT license.



```
 .  
..:  Copyright (c) 2017 Nicklas Envall (Nicklas766@live.se)
```
