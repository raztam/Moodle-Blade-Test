# Blade Test - Moodle Plugin

A simple Moodle local plugin that demonstrates how to integrate and use Laravel's Blade templating engine as an alternative to Moodle's default Mustache templates.

## Overview

This plugin demonstrates how to:
- Set up and integrate Laravel's Blade templating engine in Moodle
- Create and render Blade templates within a Moodle plugin
- Pass data from PHP to Blade templates

## Requirements

- Moodle 4.x or higher
- PHP 8.0 or higher
- Composer

## Installation

1. Clone this repository to your Moodle installation's `/local` directory:cd /path/to/moodle/local git clone https://github.com/yourusername/moodle-local_blade_test.git blade_test

2. Install the required dependencies using Composer: composer install

3. Visit your Moodle site's administration area to complete the installation.

4. Enable the plugin in the site administration settings.

## Usage

After installation, navigate to the plugin's page via:
- Site administration → Plugins → Local plugins → Blade Test, or
- Using the navigation menu item added by the plugin

The page demonstrates a simple Blade template rendering with:
- Conditional content
- Loops and array processing
- Template variables

## Template Structure

- Templates are stored in the `templates/view` directory
- Compiled templates are cached in the `templates/cache` directory

## Key Components

- [`blade_service.php`](classes/blade_service.php) - The PHP service that configures and manages the Blade template engine
- [`example.blade.php`](templates/view/example.blade.php) - An example Blade template
- [`index.php`](index.php) - The main plugin page that demonstrates rendering a Blade template

## Extending

To add your own Blade templates:

1. Create a new `.blade.php` file in the `templates/view` directory
2. Render it using the blade service:
```php
$blade = new \local_blade_test\blade_service();
echo $blade->render('your_template_name', $your_data_array);