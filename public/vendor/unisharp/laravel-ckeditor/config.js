/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	config.toolbar = 'custom';
	config.toolbar_custom = [
		{ name: 'styles', items: [ 'Format' ] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike' ] },
		{ name: 'links', items: [ 'Link', 'Unlink' ] },
		{ name: 'insert', items: [ 'Table', 'HorizontalRule' ] },
		{ name: 'paragraph', items: [ 'BulletedList', 'NumberedList', 'Blockquote' ] },
		{ name: 'tools', items: [ 'Maximize' ] },
		{ name: 'document', items: [ 'Source' ] }
	];

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre';

	config.toolbarCanCollapse = true;
};
