<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol']    = 'smtp';
$config['smtp_host']    = 'smtp.mobitel.lk';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'info@mobitel.lk';
$config['smtp_pass']    = '';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not