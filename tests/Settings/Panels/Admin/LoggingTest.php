<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\Logging;

/**
 * @package Tests\Settings\Panels\Admin
 */
class LoggingTest extends \Test\TestCase {

	/** @var \OC\Settings\Panels\Admin\Logging */
	private $panel;

	private $config;

	private $urlGenerator;

	public function setUp() {
		parent::setUp();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->panel = new Logging($this->config, $this->urlGenerator);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('org', $templateHtml);
	}

}
