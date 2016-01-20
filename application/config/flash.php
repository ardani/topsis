<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Flash Session Name
| -------------------------------------------------------------------
| 
| The name of the flash session to store all messages into.
|
*/

$config['flash']['session_name'] = 'flash';


/*
| -------------------------------------------------------------------
|  Default Flash Styling 
| -------------------------------------------------------------------
| 
| The default styling (before/after) surrounding each flash message displayed.
|
*/

$config['flash']['default_style'] = array('<div class="alert">', '</div>');


/*
| -------------------------------------------------------------------
|  Custom Flash Styles 
| -------------------------------------------------------------------
| 
| Custom styling used for specific flash message types.
|
*/
$open_error = '
    <div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>Alert!</b>';
$open_success = '
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>Success!</b>';
$open_warning ='
<div class="alert alert-warning alert-dismissable">
    <i class="fa fa-warning"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>Warning!</b>';
$open_info = '
<div class="alert alert-info alert-dismissable">
<i class="fa fa-info"></i>
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<b>Info !</b>';

$config['flash']['styles'] = array(
	'success' => array($open_success, '</div>'),
	'error'   => array($open_error,   '</div>'),
	'form'    => array('<div class="alert alert-error">',   '</div>'),
	'warning'    => array($open_error,   '</div>'),
	'info'    => array($open_info,   '</div>'),
);


/*
| -------------------------------------------------------------------
|  Split Messages by Default
| -------------------------------------------------------------------
| 
| Option to split flash messages into their own seperate alerts by default.
|
*/

$config['flash']['split_default'] = FALSE;


/*
| -------------------------------------------------------------------
|  Merge Form and Error Messages
| -------------------------------------------------------------------
| 
| Option to merge both form validation errors and custom error messages.
|
*/

$config['flash']['merge_form_errors'] = TRUE;


/*
| -------------------------------------------------------------------
|  Display Single Form Error Message
| -------------------------------------------------------------------
| 
| You can optionally choose to display only a single form error message,
| useful when you are displaying field errors individually.
| To enable, set the value to a string, else NULL.
|
*/

$config['flash']['form_error_message'] = NULL;


/* End of file flash.php */
/* Location: ./sparks/flash/1.0.0/config/flash.php */
