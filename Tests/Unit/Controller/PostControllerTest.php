<?php
namespace Pitchart\PiBlog\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Julien VITTE <vitte.julien@gmail.com>, Dawin
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Pitchart\PiBlog\Controller\PostController.
 *
 * @author Julien VITTE <vitte.julien@gmail.com>
 */
class PostControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Pitchart\PiBlog\Controller\PostController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Pitchart\\PiBlog\\Controller\\PostController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllPostsFromRepositoryAndAssignsThemToView()
	{

		$allPosts = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$postRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$postRepository->expects($this->once())->method('findAll')->will($this->returnValue($allPosts));
		$this->inject($this->subject, 'postRepository', $postRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('posts', $allPosts);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenPostToView()
	{
		$post = new \Pitchart\PiBlog\Domain\Model\Post();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('post', $post);

		$this->subject->showAction($post);
	}
}
