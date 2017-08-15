<style>
.Colorbox input {height: 25px;
                 width: 100%;
    font-size:200%;
}
    .Colorbox { 
    position:relative; 
    top:0;          
    font: Verdana,Arial,sans-serif;    
    border:1px solid #ececec;
    height: 25px;
    width: 1.9em; /* */
    z-index:1;
    cursor:pointer;
    opacity: 1;
    filter: alpha(opacity = 100);
    }

    .ColorboxSelected { 
    opacity: 0.5;
    filter: alpha(opacity = 50);
}    

.Check {
        position:relative; 
        left:2.5px;
        color:white; 
        font-family: Arial Narrow; font-size:1.5em; 
        display:block;         
    visibility:hidden;
    }     

.cbx {
    visibility:hidden;
    display:none;
}


</style><html> <head> <script language="javaScript"> 
  
function toggle_colorbox(td) {
    div = td.getElementsByTagName('div')[0];
    cb = td.getElementsByTagName('input')[0];

    if (cb.checked == false) {
        div.style.visibility = "visible";
        td.className = "Colorbox ColorboxSelected";
        cb.checked = true;
    }
    else {
        div.style.visibility = "hidden";
        td.className = "Colorbox";
        cb.checked = false;
    }
} 
    
    </script> </head> <body> <form>  
    
    <h3><b>Function which I need to change</b></h3>
    <br/>
       
    <h3><i>When you click on these now the opacity changes and a check mark is displayed (to indicate that it's been selected)</i></h3>
     <br/>
    <table>
    <tr>
     
        <td bgcolor=#00BFFF class="Colorbox input_field" onclick="toggle_colorbox(this);" title="Deep_Sky_Blue"><div class=Check>&#10003;</div>
      <input type="checkbox" name="colors_love[]" value="Deep_Sky_Blue" class="cbx"  checked='checked'>      
     </td>       
            
          <td bgcolor=#30BA30 class="Colorbox input_field" onclick="toggle_colorbox(this);" title="Bright_Green"><div class=Check>&#10003;</div>
      <input type="checkbox" name="colors_love[]" value="Bright_Green" class="cbx" >      
     </td>       
            
        <td bgcolor=#FF0000 class="Colorbox input_field" onclick="toggle_colorbox(this);" title="Black"><div class=Check>&#10003;</div>
      <input type="checkbox" name="colors_love[]" value="Bright_Red" class="cbx" checked='checked'>      
     </td>         
            
    </tr>        <script>

        $(function(){
        $('.cbx').each(function(){
                this.checked = !this.checked;
            })
            .parent().each(function(){
                toggle_colorbox(this);
            });
    });
    			 </script>
        
    </table> 
        
    </form> 
    
    </body> </html> 