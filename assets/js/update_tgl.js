SIAK_DATE_FORMAT = 'dd-MM-yyyy';

function update_tgl(tanggal, bulan, tahun, lengkap) {
  var tgl = document.getElementById(tanggal).value;
  var bln = document.getElementById(bulan).value;
  var thn = document.getElementById(tahun).value;
  //if (tgl.length<2 || bln.length<2 || thn.length<4) {
  //  document.getElementById(lengkap).value = '';
  //} else {
    document.getElementById(lengkap).value = tgl+"-"+bln+"-"+thn;
	siakCheckDate(document.getElementById(lengkap),document.getElementById(tanggal),document.getElementById(bulan),document.getElementById(tahun));
	
	varTanggal = tgl+bln+thn; 
	if(strTrim(varTanggal).length == 0){
		siakHighlight(document.getElementById(tanggal), "");
		siakHighlight(document.getElementById(bulan), "");
		siakHighlight(document.getElementById(tahun), "");
  	}
}

function selobj(nchars, objsrc, objdest) {
  if (document.getElementById(objsrc).value.length>=nchars){	
	if(document.getElementById(objdest).type =="text")  
		document.getElementById(objdest).select();
    else
		document.getElementById(objdest).focus();	
  }
}

function siakCheckDate(el,objDay,objMonth,objYear) {
	error = null;
	if (el.value!='') {
		var dateFormat = SIAK_DATE_FORMAT;
		ddReg = new RegExp("dd");
		MMReg = new RegExp("MM");
		yyyyReg = new RegExp("yyyy");
		if ( !ddReg.test(dateFormat) || !MMReg.test(dateFormat) || !yyyyReg.test(dateFormat)  ) {
			debug('DEBUG: locale format ' + dateFormat + ' not supported');
		} else {
			ddStart = dateFormat.indexOf('dd');
			MMStart = dateFormat.indexOf('MM');
			yyyyStart = dateFormat.indexOf('yyyy');
		}
		strReg = dateFormat.replace('dd','[0-9]{2}').replace('MM','[0-9]{2}').replace('yyyy','[0-9]{4}');
		reg = new RegExp("^" + strReg + "$");
		if ( !reg.test(el.value) ) {
			//highlight(el, inputclasserror);
			//error = myRule.alertMsg;
			//alert("Invalid 1");
		} else {
			dd   = el.value.substring(ddStart, ddStart+2);
			MM   = el.value.substring(MMStart, MMStart+2);
			yyyy = el.value.substring(yyyyStart, yyyyStart+4);
			if ( !siakCheckddMMyyyy(dd, MM, yyyy) ) {
				//highlight(el, inputclasserror);
				//error = "Invalid";
				//alert("Invalid 2");
			}
		}
	}
	dd   = el.value.substring(ddStart, ddStart+2);
	MM   = el.value.substring(MMStart, MMStart+2);
	yyyy = el.value.substring(yyyyStart, yyyyStart+4);
	if ( !siakCheckddMMyyyy(dd, MM, yyyy) ) {
		siakHighlight(objDay, "inputError");
		siakHighlight(objMonth, "inputError");
		siakHighlight(objYear, "inputError");
	}else{
		if(objDay.value.length < 2){
			siakHighlight(objDay, "inputError");
		}else{
			siakHighlight(objDay, "inputNormal");
		}
		if(objMonth.value.length < 2){
			siakHighlight(objMonth, "inputError");
		}else{
			siakHighlight(objMonth, "inputNormal");
		}
		if(objYear.value.length < 4){
			siakHighlight(objYear, "inputError");
		}else{
			siakHighlight(objYear, "inputNormal");
		}
		if(objYear.value < 1850){
			siakHighlight(objYear, "inputError");
		}else{
			siakHighlight(objYear, "inputNormal");
		}
		//siakHighlight(objDay, "inputNormal");
		//siakHighlight(objMonth, "inputNormal");
		//siakHighlight(objYear, "inputNormal");
	}
	
	return;
}
function siakCheckDateGreaterThan(el, myRule, isEqualAllowed) {
	error = null;
	var isDate = siakCheckDate(el, myRule)==null ? true : false;
	if ( isDate && el.value!='' ) {
		var dateFormat = SIAK_DATE_FORMAT;
		ddStart = dateFormat.indexOf('dd');
		MMStart = dateFormat.indexOf('MM');
		yyyyStart = dateFormat.indexOf('yyyy');
		dd   = el.value.substring(ddStart, ddStart+2);
		MM   = el.value.substring(MMStart, MMStart+2);
		yyyy = el.value.substring(yyyyStart, yyyyStart+4);
		myDate = "" + yyyy + MM + dd;
		strReg = dateFormat.replace('dd','[0-9]{2}').replace('MM','[0-9]{2}').replace('yyyy','[0-9]{4}');
		reg = new RegExp("^" + strReg + "$");
		var isMeta = myRule.comparisonValue.indexOf('$')==0
		? true
		: false;
		var comparisonDate = '';
		if (isMeta) {
			toSplit = myRule.comparisonValue.substr(1);
			tmp = toSplit.split(':');
			if (tmp.length == 2) {
				comparisonDate = this.getField(f, tmp[0]).value;
			} else {
				comparisonDate = this.getField(f, myRule.comparisonValue.substr(1)).value;
			}
		} else {
			comparisonDate = myRule.comparisonValue;
		}
		if ( !reg.test(comparisonDate) ) {
			//highlight(el, inputclasserror);
			//error = myRule.alertMsg;
		} else {
			cdd   = comparisonDate.substring(ddStart, ddStart+2);
			cMM   = comparisonDate.substring(MMStart, MMStart+2);
			cyyyy = comparisonDate.substring(yyyyStart, yyyyStart+4);
			cDate = "" + cyyyy + cMM + cdd;
			if (isEqualAllowed) {
				if ( !checkddMMyyyy(cdd, cMM, cyyyy) || myDate<cDate ) {
					//highlight(el, inputclasserror);
					//error = myRule.alertMsg;
				}
			} else {
				if ( !checkddMMyyyy(cdd, cMM, cyyyy) || myDate<=cDate ) {
					//highlight(el, inputclasserror);
					//error = myRule.alertMsg;
				}
			}
		}
	} else {
		if ( el.value!='' ) {
			//highlight(el, inputclasserror);
			//error = myRule.alertMsg;
		}
	}
	return error;
}
function siakCheckddMMyyyy(dd, MM, yyyy) {
	retVal = true;
		if (    (dd<1) || (dd>31) || (MM<1) || (MM>12) ||
		(dd==31 && (MM==2 || MM==4 || MM==6 || MM==9 || MM==11) ) ||
		(dd >29 && MM==2) ||
		(dd==29 && (MM==2) && ((yyyy%4 > 0) || (yyyy%4==0 && yyyy%100==0 && yyyy%400>0 )) )) {
		retVal = false;
		}
		return retVal;
}
function siakHighlight(el, clazz) {
	if (!isFocusSet && clazz==inputclasserror) {
		if (  (!el.type) && (el.length>0) && (el.item(0).type=='radio') ) {
			el.item(0).focus();
		} else {
			el.focus();
		}
		isFocusSet = true;
	}
	if (el!=undef && inputhighlight) {
		if ( multipleclassname ) {
			siakHighlightMultipleClassName(el,clazz);
		} else {
			el.className = clazz;
		}
	}
}
function siakHighlightMultipleClassName(el,clazz) {
		re = new RegExp("(^|\\s)("+inputclassnormal+"|"+inputclasserror+")($|\\s)");
	
		el.className = strTrim (
		( (typeof el.className != "undefined")
		? el.className.replace(re, "")
		: ""
		) + " " + clazz );
	
}
function siakFormCheckDate(el) {
	error = null;
	var dateFormat = SIAK_DATE_FORMAT;
	if (el.value!='') {
		ddReg = new RegExp("dd");
		MMReg = new RegExp("MM");
		yyyyReg = new RegExp("yyyy");
		if ( !ddReg.test(dateFormat) || !MMReg.test(dateFormat) || !yyyyReg.test(dateFormat)  ) {
			debug('DEBUG: locale format ' + dateFormat + ' not supported');
		} else {
			ddStart = dateFormat.indexOf('dd');
			MMStart = dateFormat.indexOf('MM');
			yyyyStart = dateFormat.indexOf('yyyy');
		}
		strReg = dateFormat.replace('dd','[0-9]{2}').replace('MM','[0-9]{2}').replace('yyyy','[0-9]{4}');
		reg = new RegExp("^" + strReg + "$");
		if ( !reg.test(el.value) ) {	
			return false;
		} else {
			dd   = el.value.substring(ddStart, ddStart+2);
			MM   = el.value.substring(MMStart, MMStart+2);
			yyyy = el.value.substring(yyyyStart, yyyyStart+4);
			if ( !siakCheckddMMyyyy(dd, MM, yyyy) ) {
				return false;
			}
		}
	}
	return true;
}

function AgeYear(monthDob,dayDob,yearDob) {
  var now = new Date();
  var yearNow = now.getYear();
  var monthNow = now.getMonth() + 1;
  var dayNow = now.getDate();

  var today = new Date(yearNow,monthNow,dayNow);

  if (yearNow < 100) {
    yearNow=yearNow+1850;
  }

  yearAge = yearNow - yearDob;
	
  if (monthNow <= monthDob) {
    if (monthNow < monthDob) {
      yearAge--;		
    } else {
      if (dayNow < dayDob) {
        yearAge--;
      }
    }
  }
  return yearAge
}
function AgeYearServer(monthDob,dayDob,yearDob,yearNow,monthNow,dayNow) {
  

  if (yearNow < 100) {
    yearNow=yearNow+1900;
  }

  yearAge = yearNow - yearDob;
	
  if (monthNow <= monthDob) {
    if (monthNow < monthDob) {
      yearAge--;		
    } else {
      if (dayNow < dayDob) {
        yearAge--;
      }
    }
  }
  return yearAge
} 