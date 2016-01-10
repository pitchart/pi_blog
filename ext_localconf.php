<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Pitchart.' . $_EXTKEY,
	'Pi1',
	array(
		'Post' => 'list, show, last',
		'Author' => 'list, show',
		'Category' => 'list, show',
		'Tag' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Post' => '',
		'Author' => '',
		'Category' => '',
		'Tag' => '',
		'Comment' => 'create',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Pitchart.' . $_EXTKEY,
	'Pi2',
	array(
		'Comment' => 'create',
		
	),
	// non-cacheable actions
	array(
		'Comment' => 'create',
		
	)
);
