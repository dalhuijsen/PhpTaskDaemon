<?php

/**
 * @package PhpTaskDaemon
 * @subpackage Task\Job
 * @copyright Copyright (C) 2011 Dirk Engels Websolutions. All rights reserved.
 * @author Dirk Engels <d.engels@dirkengels.com>
 * @license https://github.com/DirkEngels/PhpTaskDaemon/blob/master/doc/LICENSE
 *
 * @group PhpTaskDaemon
 * @group PhpTaskDaemon-Task
 * @group PhpTaskDaemon-Task-Job
 */

namespace PhpTaskDaemon\Task\Job;

class DefaultClassTest extends \PHPUnit_Framework_Testcase {
    protected $_job;
    
    protected function setUp() {
    }
    protected function tearDown() {
    }
    
    public function testConstructorNoArguments() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass();
        $this->assertNotEquals('', $this->_job->getJobId());
        $this->assertNotNull('', $this->_job->getJobId());
//        $this->assertEquals(0, sizeof($this->_job->getInput()));
//        $this->assertEquals(0, sizeof($this->_job->getOutput()));
    }
    public function testConstructorSingleArguments() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass('test');
        $this->assertEquals('test', $this->_job->getJobId());
//        $this->assertEquals(0, sizeof($this->_job->getInput()));
//        $this->assertEquals(0, sizeof($this->_job->getOutput()));
    }
    public function testConstructorTwoArguments() {
        $input = array('testVar' => '1234');
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass(
            'test',
            new \PhpTaskDaemon\Task\Job\Data\DefaultClass($input)
        );
        $this->assertEquals('test', $this->_job->getJobId());
//        $this->assertEquals(1, sizeof($this->_job->getInput()));
//        $this->assertEquals(serialize($input), serialize($this->_job->getInput()));
//        $this->assertEquals(0, sizeof($this->_job->getOutput()));
    }
    
    public function testGenerateJobId() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass();
        $jobId = $this->_job->getJobId();
        $this->assertNotEquals('', $jobId);
        $this->assertNotNull('', $jobId);
        $this->_job->setJobId($this->_job->generateJobId());
        $this->assertNotEquals($jobId, $this->_job->getJobId());
    }

    public function testSetJobIdGenerate() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass('test');
        $this->_job->setJobId();
        $this->assertNotNull($this->_job->getJobId());
    }
    
    public function testSetJobId() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass('test');
        $this->assertNotNull($this->_job->getJobId());
        $this->_job->setJobId('test');
        $this->assertEquals('test', $this->_job->getJobId());
    }

    public function testSetInput() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass();

        $input = new \PhpTaskDaemon\Task\Job\Data\DefaultClass(
            array('key' => 'value')
        );
        $this->assertNotEquals($input, $this->_job->getInput());

        $this->_job->setInput($input);
        $this->assertEquals($input, $this->_job->getInput());
    }

    /**
     * @expectedException Exception
     */
    public function testSetInputInvalidFormat() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass();

        $input = array('key' => 'value');
        $this->_job->setInput($input);
    }

    public function testSetOutput() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass();

        $output = new \PhpTaskDaemon\Task\Job\Data\DefaultClass(
            array('key' => 'value')
        );
        $this->assertNotEquals($output, $this->_job->getOutput());

        $this->_job->setOutput($output);
        $this->assertEquals($output, $this->_job->getOutput());
    }

    /**
     * @expectedException Exception
     */
    public function testSetOutputInvalidFormat() {
        $this->_job = new \PhpTaskDaemon\Task\Job\DefaultClass();

        $output = array('key' => 'value');
        $this->_job->setOutput($output);
    }

}
