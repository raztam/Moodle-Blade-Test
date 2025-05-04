<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Blade template service for Moodle.
 *
 * @package    local_blade_test
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_blade_test;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../vendor/autoload.php');

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\Events\Dispatcher;

/**
 * Class blade_service
 *
 * @package    local_blade_test
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class blade_service {

    /**
     * @var Factory The view factory instance.
     */
    protected $factory;

    /**
     * @var Container The container instance.
     */
    protected $container;

    /**
     * Create a new Blade service instance.
     */
    public function __construct() {
        $this->container = new Container();
        $this->setup_blade();
    }

    /**
     * Set up the Blade environment.
     */
    protected function setup_blade() {
        global $CFG;

        // Define the blade template and cache paths.
        $basepath = __DIR__ . '/../templates';
        $viewpath = $basepath . '/view';
        $cachepath = $basepath . '/cache';

        // Create the cache directory if it doesn't exist.
        if (!file_exists($cachepath)) {
            mkdir($cachepath, 0755, true);
        }

        // Create the view directory if it doesn't exist.
        if (!file_exists($viewpath)) {
            mkdir($viewpath, 0755, true);
        }

        // Create a new file system instance.
        $filesystem = new Filesystem();

        // Create a new BladeCompiler instance.
        $bladecompiler = new BladeCompiler($filesystem, $cachepath);

        // Set up the engine resolver.
        $resolver = new EngineResolver();

        // Register the Blade engine.
        $resolver->register('blade', function() use ($bladecompiler) {
            return new CompilerEngine($bladecompiler);
        });

        // Set up the view finder.
        $finder = new FileViewFinder($filesystem, [$viewpath]);

        // Create an event dispatcher.
        $eventdispatcher = new Dispatcher($this->container);

        // Create a new factory instance with proper event dispatcher.
        $this->factory = new Factory($resolver, $finder, $eventdispatcher);
    }

    /**
     * Render a Blade template.
     *
     * @param string $template The template name
     * @param array $data The data to pass to the template
     * @return string The rendered template
     */
    public function render($template, array $data = []) {
        return $this->factory->make($template, $data)->render();
    }
}
