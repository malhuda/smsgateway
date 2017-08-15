/**
*    Chained Selects for jQuery 
*    Copyright (C) 2008 Ziadin Givan www.CodeAssembly.com  
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see http://www.gnu.org/licenses/
*
*    
*   settings = { usePost : true, before:function() {}, after: function() {}, default: null, parameters : { parameter1 : 'value1', parameter2 : 'value2'} }	
*   if usePost is true, then the form will use POST to pass the parameters to the target, otherwise will use GET
*   "before" function is called before the ajax request and "after" function is called after the ajax request.
*   If defaultValue is not null then the specified option will be selected.
*   You can specify additional parameters to be sent to the the server in settings.parameters.
*
*/
jQuery.fn.chainSelect = function( target, url, settings,parent) 
{
  return this.each( function()
  {
	$(this).change( function( ) 
	{
		settings = jQuery.extend(
		{
			after : null,
			before : null,
			usePost : false,
			defaultValue : null,
			//parameters : {'_id' : $(this).attr('id'), '_name' : $(this).attr('name')}
        } , settings);

		//settings.parameters._value =  $(this).val();
		settings.parameters=new Object();
		if(settings.get_param!=null){
			for(key in settings.get_param){
					settings.parameters[key]=settings.get_param[key].val();
			}
		}
		console.log(settings.parameters);
		if (settings.before != null) 
		{
			settings.before( target);
		}

		ajaxCallback = function(data, textStatus) 
		{
			$(target).html("");//clear old options			
			data = eval(data);//get json array
			for (i = 0; i < data.length; i++)//iterate over all options
			{
			  for ( key in data[i] )//get key => value
			  {	
					$(target).get(0).add(new Option(data[i][key],[key]), document.all ? i : null);
              }
			}

			if (settings.defaultValue != null)
			{
				$(target).val(settings.defaultValue);//select default value
			} else
			{
				$("option:first", target).attr( "selected", "selected" );//select first option
			}

			if (settings.after != null) 
			{
				settings.after(target);
			}

			$(target).change();//call next chain
		};

		if (settings.usePost == true)
		{
			$.post( url, settings.parameters, ajaxCallback );
		} else
		{
			$.get( url, settings.parameters, ajaxCallback );
		}
	});
  });
};
function SettingWilayah(opsi_wilayah,base_url){
	if(opsi_wilayah['kab']!=undefined){
		$(opsi_wilayah['prop']).chainSelect(opsi_wilayah['kab'],base_url+'/get_kab',{			
			before:function (target){
				// $(opsi_wilayah['prop']).attr('disabled',true);
				// $(target).attr('disabled',true);				
			},
			after:function (target){				
				// $(opsi_wilayah['prop']).attr('disabled',false);
				// if(!$(target).hasClass('disabled')){
					// $(target).attr('disabled',false);
				// }
			},
			get_param:{'NO_PROP':$(opsi_wilayah['prop'])}
		},[opsi_wilayah['prop']]);
	}
	if(opsi_wilayah['kec']!=undefined){
		if(opsi_wilayah['kab']!=undefined){
			$(opsi_wilayah['kab']).chainSelect(opsi_wilayah['kec'],base_url+'/get_kec',{			
				before:function (target){
					// $(opsi_wilayah['kab']).attr('disabled',true);
					// $(target).attr('disabled',true);				
				},
				after:function (target){
					// if(!$(opsi_wilayah['kab']).hasClass('disabled')){	
						// $(opsi_wilayah['kab']).attr('disabled',false);
					// }
					// if(!$(target).hasClass('disabled')){
						// $(target).attr('disabled',false);
					// }					
				},
				get_param:{'NO_PROP':$(opsi_wilayah['prop']),'NO_KAB':$(opsi_wilayah['kab'])}
			},[opsi_wilayah['prop'],opsi_wilayah['kab']]);
		}
	}
	if(opsi_wilayah['kel']!=undefined){
		$(opsi_wilayah['kec']).chainSelect(opsi_wilayah['kel'],base_url+'/get_kel',{			
			before:function (target){
				// $(opsi_wilayah['kec']).attr('disabled',true);
				// $(target).attr('disabled',true);			
			},
			after:function (target){
				// if(!$(opsi_wilayah['kec']).hasClass('disabled')){		
					// $(opsi_wilayah['kec']).attr('disabled',false);
				// }
				// if(!$(target).hasClass('disabled')){
					// $(target).attr('disabled',false);
				// }
			},
			get_param:{'NO_PROP':$(opsi_wilayah['prop']),'NO_KAB':$(opsi_wilayah['kab']),'NO_KEC':$(opsi_wilayah['kec'])}
		},[opsi_wilayah['prop'],opsi_wilayah['kab'],opsi_wilayah['kec']]);
	}
}