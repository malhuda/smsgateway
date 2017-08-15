<style>
body {
 font-family: Arial;   
}

.excontainer {
  padding: 1em;    
}

label {
 display: block;
 width: 100%;   
}

p {
 padding: .5em;   
}

a, a:visited {
 color: #2d9afd;   
}

.changed {
  color: #ff0099;   
}

.highlight {
  background: #faffda;   
}

.entered {
  color: #f5560a;
}

.green {
 color: #7fbf38;   
}

.hellomouse, .clickable, #foo, #event {
 cursor: pointer;   
}



.content {
    margin-top: 5px;
    padding: 1em;
    background: #eeeeee;     
}

</style>

<script>
$(function(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img src='<?php echo base_url('assets/loader/loaders.gif'); ?>' alt='loading...' />";
    
    // load() functions
    var loadUrl = "<?php echo base_url(); ?>login/login_form";
    $("#loadbasic").click(function(){
        $("#result").html(ajax_load).load(loadUrl);
    });

// end  
});
</script>
    <div id="loadbasic">basic load</div>
    <div id="result"></div>
 
</div>