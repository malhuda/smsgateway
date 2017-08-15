<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jpgraph {
public function barchart() {
include ("src/jpgraph.php");
include ("src/jpgraph_pie.php");
include ("src/jpgraph_pie3d.php");
include ("src/jpgraph_bar.php");

}
}
?>