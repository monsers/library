/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.language = 'zh-cn';
    config.font_defaultLabel = '宋体';
    config.fontSize_defaultLabel = '14';
    config.font_names='宋体/宋体;黑体/黑体;仿宋/仿宋_GB2312;楷体/楷体_GB2312;隶书/隶书;幼圆/幼圆;微软雅黑/微软雅黑;'+ config.font_names;
    config.width = 700;
    config.height =300;
    config.image2_alignClasses = [ 'image-left', 'image-center', 'image-right' ];
    config.image2_captionedClass = 'image-captioned';
};
