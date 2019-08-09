/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

 CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	// config.toolbarGroups = [
	// 	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
	// 	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	// 	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	// 	{ name: 'forms', groups: [ 'forms' ] },
	// 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	// 	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
	// 	{ name: 'links', groups: [ 'links' ] },
	// 	{ name: 'insert', groups: [ 'insert' ] },
	// 	{ name: 'colors', groups: [ 'colors' ] },
	// 	{ name: 'styles', groups: [ 'styles' ] },
	// 	{ name: 'tools', groups: [ 'tools' ] },
	// 	{ name: 'others', groups: [ 'others' ] },
	// 	{ name: 'about', groups: [ 'about' ] }
	// ];

	// config.removeButtons = 'Source,Undo,Redo,Find,Subscript,Superscript,NumberedList,BulletedList,Maximize,ShowBlocks,Image,Table,HorizontalRule,Smiley,PageBreak,SpecialChar,Iframe,Link,Unlink,Anchor,Language,BidiRtl,BidiLtr,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,CreateDiv,Blockquote,Outdent,Indent,Replace,SelectAll,Scayt';
	config.filebrowserBrowseUrl = '../conf/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../conf/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../conf/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../conf/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../conf/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../conf/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};
