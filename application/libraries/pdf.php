<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * 	Author		: Muhammad Surya Ihsanuddin
 * 	Email		: mutofiyah@gmail.com
 * 	FB			: http://facebook.com/AdenKejawen
 * 	Since		: Version 1.X
 * 	Copyright	: 2012@VinotiLivingGroup
 * 
 * 	This code is part of Vinoti Living Group report management tool
 *  
 * 	Dilarang merubah apapun tanpa sepengetahuan author
 */
require_once APPPATH.'third_party/tcpdf/tcpdf'.EXT;
class Pdf extends TCPDF{
    public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = TRUE, $encoding = 'UTF-8', $diskcache = FALSE, $pdfa = FALSE) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }
}