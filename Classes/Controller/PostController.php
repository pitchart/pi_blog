<?php
namespace Pitchart\PiBlog\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Julien VITTE <vitte.julien@gmail.com>, Dawin
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * PostController
 */
class PostController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * postRepository
     *
     * @var \Pitchart\PiBlog\Domain\Repository\PostRepository
     * @inject
     */
    protected $postRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $posts = $this->postRepository->findAll();
        $this->view->assign('posts', $posts);
    }
    
    /**
     * action show
     *
     * @param \Pitchart\PiBlog\Domain\Model\Post $post
     * @return void
     */
    public function showAction(\Pitchart\PiBlog\Domain\Model\Post $post)
    {
        $this->view->assign('post', $post);
    }
    
    /**
     * action last
     *
     * @return void
     */
    public function lastAction()
    {
        $lastPost = $this->postRepository->findLast();
        $this->view->assignMultiple(array(
            'post' => $lastPost,
        ));
    }

}