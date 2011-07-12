<?php
require_once('simpletest/autorun.php');
require_once '../canvas.php';

class AllTests extends TestSuite {
    function AllTests() {
        $this->TestSuite('All tests for class Canvas');
        #$this->addFile(dirname(__FILE__).'/load_and_create_test.php');
        #$this->addFile(dirname(__FILE__).'/colors_test.php');
        #$this->addFile(dirname(__FILE__).'/resize_test.php');
        $this->addFile(dirname(__FILE__).'/save_and_show_test.php');
    }
}
