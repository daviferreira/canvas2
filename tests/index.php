<?php
require_once('simpletest/autorun.php');
require_once('simpletest/web_tester.php');
require_once('simpletest/reporter.php');
require_once '../canvas.php';

define('BASE_URL', 'http://localhost/canvas2/');

class AllTests extends TestSuite {
    function AllTests() {
        $this->TestSuite('All tests for class Canvas');
        $this->addFile(dirname(__FILE__).'/load_and_create_test.php');
        $this->addFile(dirname(__FILE__).'/colors_test.php');
        $this->addFile(dirname(__FILE__).'/resize_test.php');
        $this->addFile(dirname(__FILE__).'/effects_test.php');
        $this->addFile(dirname(__FILE__).'/text_test.php');
        $this->addFile(dirname(__FILE__).'/save_test.php');
        $this->addFile(dirname(__FILE__).'/show_test.php');
    }
}
