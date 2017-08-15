
<style>
#sel {
width: 20px;
height: 20px;
text-align: center;
}
</style>
</head>
<body>
<center>
<div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>PERKEMBANGAN VERIFIKASI DATA PEMILIH</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        
                                        </li>
                                        <li class="dropdown">
                                        </li>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="headings"><td id="sel"  rowspan="2" align="center"><strong>NO.</strong></td>
<td id="sel"  rowspan="2" align="center"><strong>KABUPATEN/KOTA</strong></td>
<td id="sel"  colspan="20" align="center">
<strong>Tahapan Verifikasi Data Pemilih</strong></td>
</tr>

<tr class="even pointer">
<td id="sel" >1</td>
<td id="sel" >2</td>
<td id="sel" >3</td>
<td id="sel" >4</td>
<td id="sel" >5</td>
<td id="sel" >6</td>
<td id="sel" >7</td>
<td id="sel" >8</td>
<td id="sel" >9</td>
<td id="sel" >10</td>
<td id="sel" >11</td>
<td id="sel" >12</td>
<td id="sel" >13</td>
<td id="sel" >14</td>
<td id="sel" >15</td>
<td id="sel" >16</td>
<td id="sel" >17</td>
<td id="sel" >18</td>
<td id="sel" >19</td>
</tr>

<?php 
$i=1;
foreach ($biodata as $data) 
    {
        ?>
       <!--  <input type="radio" class="flat" checked="" required /> -->
<tr>
<td id="sel" ><?php echo $i++; ?></td>
<td ><?php echo $data["NAMA_KAB"]; ?></td>
<td id="sel" >
                                    <?php if ($data["P1"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P1"] = $data["P1"]){
                                             echo '<input type="radio" />';
                                         } 
                                    ?>
   </td>
<td id="sel" >                  <?php if ($data["P2"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P2"] = $data["P2"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P3"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P3"] = $data["P3"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P4"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P4"] = $data["P4"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P5"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P5"] = $data["P5"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P6"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P6"] = $data["P6"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P7"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P7"] = $data["P7"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P8"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P8"] = $data["P8"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P9"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P9"] = $data["P9"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P10"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P10"] = $data["P10"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P11"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P11"] = $data["P11"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P12"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P12"] = $data["P12"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P13"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P13"] = $data["P13"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P14"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P14"] = $data["P14"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P15"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P15"] = $data["P15"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P16"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P16"] = $data["P16"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P17"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P17"] = $data["P17"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P18"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P18"] = $data["P18"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }   
                                    ?></td>
<td id="sel" ><?php if ($data["P19"] == 0){
                                            echo '<input type="checkbox" />';
                                               }
                                               elseif
                                              ($data["P19"] = $data["P19"]){
                                             echo '<input type="radio" data-parsley-mincheck="2" required checked="" class="flat" />';
                                         }  
                                        } 
                                    ?></td>
</tr>


</thead>
 </table>
    </div>
        </div>
     </div>
  </div>
</div>