# Outfit App Heroku

## Environment Variables

You will need to specify the following environment variables in order to run
this app.

* DB_HOST
* DB_NAME
* DB_PASS
* DB_PORT
* DB_USER
* STRIPE_PUBLISHABLE_KEY
* STRIPE_SECRET_KEY
* SOIREE_BASE_URL (https://domain.ext -- no trailing slash)
* SOIREE_ENVIRONMENT (possible values are production, testing, development)
* SOIREE_REQUIRE_TLS (possible values are true, false)
* SOIREE_ERROR_REPORTING (integer: [possible values](http://php.net/manual/en/errorfunc.constants.php))
* SOIREE_MIGRATION_VERSION


## Migrations

Migrations are code-based changes to the database.  They offer the benefit of
keeping database configuration in the source control repository (i.e.g, git,
in the case of soiree).  This allows multiple developers to contribute
reproducible, executable changes to the database's schema.

Each migration has an associated version number (which increases by 1 for each
new migration).  The current migration version is specified in
[```application/config/migration.php```](application/config/migration.php),
by referencing the environment variable ```SOIREE_MIGRATION_VERSION```.

Once your database credentials are correct, you will need to run migrations to
bring your database up to the current migration.  You can do this by visiting
```$SOIREE_BASE_URL/index.php/migrate``` in your browser.  When you run
migrations for the first time, CodeIgniter will create a ```migrations``` table
in your database.  This is where it stores the current migration version.
Please note that in order for this script to perform a task, the
```SOIREE_MIGRATION_VERSION``` environment variable must be set.

Creating a migration is straightforward.  Put a new php file into
[```application/migrations```](application/migrations).  It is critical that you
commit any and all new migrations to the repository.

Migration files are named with a sequential three-digit prefix, indicating
the version number of that migration (newer versions of CodeIgniter allow a
timestamp prefix, which is a much better solution for distributed teams).

If you name the file ```001_my_new_column.php```, then CodeIgniter will expect
the file to look something like

```php
<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Migration_My_new_column extends CI_Migration {
  public function up() {
    $this->dbforge->add_column(
      'my_table',
      array(
        'new_column' => array( 'type' => 'TEXT' )
      )
    );
  }

  public function down() {
    $this->dbforge->drop_column( 'my_table', 'new_column' );
  }
}
```

A few things to note:

* The class name has a ```Migration_``` prefix, followed by the name of the
  file, with the version number removed, and First_word_capitalized.
* The class inherits from ```CI_Migration```
* The class provides an ```up()``` function and a ```down()``` function.  These
  should be the logical opposites of each other.
* Migrations are for database structure.  While it is possible to load data with
  a migration, it should not be done.
* For more information on migrations, please consult the [docs](http://www.codeigniter.com/userguide2/libraries/migration.html)
