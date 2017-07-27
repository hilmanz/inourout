
			function inputonchange(e,elmnt,cntent,nxtelement) {
				if( (e.keyCode == 189 || e.keyCode == 109) ||
					(e.keyCode >= 48 && e.keyCode <= 57) || 
					(e.keyCode >= 96 && e.keyCode <= 105) )	
				{
					if (cntent.length==elmnt.maxLength)
					{
						next=(elmnt.tabIndex)+1;
						if (next<document.Form1.elements.length)
						{
							document.Form1.elements[nxtelement].focus()
						}
					}
				}
            }		
				
							function Host()
							{
								var urlLoc = location.href;
								var protocol = urlLoc.split("/")[0];
								var host = urlLoc.split("/")[2];
								var fullUrl = protocol + "//" + host;
								return fullUrl;
							}
			
				function IsValidEmail(str)
				{
					//var emailpat =  /^([a-zA-Z]{1}[a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{1,4})$/;
          //var emailpat =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{1,4})+$/;
		  var emailpat= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])([a-zA-Z0-9\-])+\.)(([a-zA-Z0-9\-])([a-zA-Z0-9\-])+)+(\.([a-zA-Z0-9])+)*$/;
           var char;
           var strValidChars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				  char = str.charAt(0);
          if(!emailpat.test(str)) 
					{
						
						return false;
					}
					else 
          {
							if (strValidChars.indexOf(char) == -1)
							{
								return false;
							}
						else
                return true;
          
          }
				}
			
				function IsValidUserID(str)
				{
					// var emailpat = /^(([a-zA-Z]{1})+[a-zA-Z0-9_\.\-\@])+$/;
          var emailpat = /^([a-zA-Z]{1})+\d|[a-zA-Z]|@-\._ /;
          var char;
           var strValidChars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				  char = str.charAt(0);
          if(!emailpat.test(str)) 
					{
						
						return false;
					}
					else 
          {
							if (strValidChars.indexOf(char) == -1)
							{
								return false;
							}
						else
                return true;
          
          }
				}
			
			function noPaste(e)
			{
			//CTRL + c, CNTR + v
			if (e.ctrlKey && (e.keyCode == '67' || e.keyCode == '86'))
			{
			return false;
			}
			}
							function dependentDDL(t)
							{
							
								if(t.options.length > 0)
								{
									text =  t.options[t.selectedIndex].text;
									value =  t.options[t.selectedIndex].value;
									t.options[t.selectedIndex].value = value + '#' + text;
								}
					
							}
			
				function ValidateStringChars(strStringToValidate, strValidCharsValue)
				{
					var strValidChars = strValidCharsValue;
					var strChar;
					var count;
					if (strStringToValidate.length == 0) return false;
					else
					{
						//  test strString consists of valid characters listed above
						for (count = 0; count < strStringToValidate.length ; count++)
						{
							strChar = strStringToValidate.charAt(count);
							if (strValidChars.indexOf(strChar) == -1)
							{
								return false;
							}
						}
					}
					return true;
				}
			
				function IsValidDate(day, month, year)
				{			
					if(day == 00 || month == 00 || year == 0000)
					{
						return false;
					}
					if	(month == 02 && day>daysInFebruary(year))
					{
						return false;
					}
					if (month == 04 || month == 06 || month == 09 ||month == 11)
					{
						if (day == 31)
						{
							return false;
						}
					}			
					if(day > 31 || month > 12 || year > 2011 || year < 1900)
					{	
						return false;
					}					
					return true;
				}
			
				//function to validate Feb day
				function daysInFebruary (year)
				{
					// February has 29 days in any year evenly divisible by four,
					// EXCEPT for centurial years which are not also divisible by 400.
					return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
				}
			
				function IsGreaterThan18(day, month, year)
				{
					var today = new Date();
					var	yr = today.getFullYear(); 
					var	dy = today.getDate(); 
					var	mn = today.getMonth(); 
					mn = mn + 1;
					if(year < (yr - 18))
					{
						return true;
					}
					if(year == (yr - 18))
					{
						if(month < mn)
						{
							return true;
						}
						if ( month == mn )
						{
							if(day <= dy)
							{
								return true;
							}
						}
					}
					return false;			
				}
			
			var IgnoreValidation = new Array();
			function updateInfo() 
			{ 
				var countySelected = request.responseText; 
			}
			/*  Key up and down code handling starts here */
			
			document.onmouseup = MouseUp;
			
			function MouseUp(ev)
			{
				if(divControl != null)
					 divControl.style.display = 'none';
			}

			function chkLiKey(e,liElement,ControlName,ChildControl,key)
			{
				//alert('li key down');
				var keynum = 0;
				if(window.event)
				{
					keynum = window.event.keyCode;     //IE
					srcElement = window.event.srcElement.id;
				}
				else
				{
					keynum = e.which;     //firefox
					keynum = e.keyCode;
				}
				if(keynum != 13)
				{
				if(keynum == 38)
				{
					if(liElement.previousSibling != null)
					{
						if(liElement.previousSibling.firstChild != null)
						{
							liElement.style.border='0px red solid';
							liElement.previousSibling.style.border='1px red solid';
							liElement.previousSibling.firstChild.focus();
						}
					}
					return false;
				}
				else if(keynum == 40)
				{
					if(liElement.nextSibling != null)
					{
						if(liElement.nextSibling.firstChild != null)
						{
							liElement.style.border='0px red solid';
							liElement.nextSibling.style.border='1px red solid';
							liElement.nextSibling.firstChild.focus();
						}
					}
					return false;
				}
				}
				else
				{
					SaveSelection(liElement,ControlName,ChildControl,key);
					return false;
				}
			}
			
			function CheckKey(e,control,qString,callBack)
			{
				var keynum = 0;
				var srcElement = null;
				if(window.event)
				{
					keynum = window.event.keyCode;     //IE
					srcElement = window.event.srcElement.id;
				}
				else
				{
					keynum = e.which;     //firefox
					srcElement = e.currentTarget.id;
				}
				if(keynum == 13)
				{
					divControl = document.getElementById('div' + control);
					var ulElement = getE('ul' + control);
					var txtElement = getE('txt' + control);
					if(divControl != 'undefined')
					{
						if(ulElement != 'undefined')
						{
							if(ulElement.firstChild.firstChild != 'undefined')
							{
								if(ulElement.firstChild.firstChild.innerHTML.toLowerCase() == txtElement.value.toLowerCase())
								{
									ulElement.firstChild.click();
									divControl.style.display = 'none';
									return;
								}
								else
								{
									return;
								}
							}
						}
					}
				}
				// Avoiding keyup event for shift,ctrl,alt,end,home,tab,capslock,windows,shortcut,left arrow,right arrow keys
				else if(keynum == 16 || keynum == 17 || keynum == 18 || keynum == 35 || keynum == 36 || keynum == 9 || keynum == 20 || keynum == 92 || keynum == 93 || keynum == 37 || keynum == 39)
				{
					return ;
				}
				else if(keynum == 40)
				{
					var controlName = srcElement.substring(3);
					var txtElement = getE('txt' + controlName);
					var divElement = getE('div' + controlName);
					var ulElement = getE('ul' + controlName);
					//txtElement.setAttribute('autocomplete','off');
					ulElement.firstChild.style.border='1px red solid';
					ulElement.firstChild.firstChild.focus();
					return;
				}
				if(qString != '')
				{
					getE('imgStatus'+control).style.display='block';
				}
				Call(qString,callBack);
			}
			/*  Key up and down code handling ends here */
			
			
			var divControl = null;
			var cache	= new Array();
			//var timeOut = new Array();
			var browserType = -1;
			var t = null;
			function Do(controlName)
			{
				divControl = getE('div' + controlName);
				if(divControl != null)
					document.forms[0].removeChild(divControl);
				var c = document.createElement('div');
				c.id = "div" + controlName;
				p = document.getElementById("txt" + controlName);
				// For Internet Explorer
				if(navigator.appName == 'Microsoft Internet Explorer')
				{
					var Offsets = GetRealOffset(p.id);
					c.style.border = "#182E3B 1px solid"; 
					c.style.background = "#134C6C";
					c.style.display = "block";
					c.style.position = "absolute";
					c.style.top =  Offsets.top + p.offsetHeight + 12 + "px";
					c.style.left = Offsets.left + 10 + "px";
					c.style.width = p.offsetWidth + "px";
					c.style.height = 100 + "px";
					c.style.overflow = "auto";
				}
				else										// For mozilla and other browsers
				{
					c.style.border = "#182E3B 1px solid"; 
					c.style.background = "#134C6C";
					c.style.display = "";
					c.style.position = "absolute";
					c.style.top =  p.offsetTop + p.offsetHeight - 1 + "px";
					c.style.left = p.offsetLeft - 1 + "px";
					c.style.maxHeight = 100 + "px";
					c.style.width = p.offsetWidth + "px";
					c.style.overflow = "auto";
				}
				divControl = c;
			}

			function SaveSelection(obj,ControlName,ChildControl,key)
			{
				var form = document.forms[0];
				var txtControl = getE('txt' + ControlName);
				var divControl = getE('div' + ControlName);
				var hidControl = getE('hid' + ControlName);
				var txtChildControl = null;
				var hidChildControl = null;
				txtControl.value = obj.firstChild.innerHTML;
				hidControl.value = obj.id; // we are reading id instead of value as the value is being converted to int from string
				txtControl.focus();
				// Clearing child controls value on parent selection change
				if(ChildControl != '')
				{
					txtChildControl = getE('txt' + ChildControl);
					hidChildControl = getE('hid' + ChildControl);
					if(txtChildControl != null && txtChildControl != 'undefined')
					{
						txtChildControl.value = "";
					}
					if(hidChildControl != null && hidChildControl != 'undefined')
					{
						hidChildControl.value = "";
					}
					txtChildControl.focus();
				}
				//if(timeOut[key] != null)
				//	clearTimeout(timeOut[key]);
				try
				{
					form.removeChild(divControl);
				}
				catch(ex)
				{
				}
			}
			function WriteScript(func)
			{
				window.setTimeout(func,1);
			}	
			
			function Hide()
			{
				var form = document.forms[0];
				try
				{
					form.removeChild(divControl);
				}
				catch(ex)
				{
				}
			}
						
			function GetRealOffset(id)
			{
				var elem = document.getElementById(id);
				var leftOffset = elem.offsetLeft;
				var topOffset = elem.offsetTop;
				var parent = elem.offsetParent;
				while(parent != document.body && parent.tagName != 'HTML') 
				{
					leftOffset += parent.offsetLeft;
					topOffset += parent.offsetTop;
					parent = parent.offsetParent;
				}
				var Offsets = new Object();
				Offsets.top = topOffset;
				Offsets.left = leftOffset;
				return Offsets;
			} 
					
			function FillChild(opt,control,key,parent,ddDefaultText,ddDefaultValue)
			{
				var dChild = getE(control);
				var childList = cache[key];
				if(opt == 0)
				{
					if(browserType == 2)  //alert('browserType == 2');
					{
						var xmlDOM = new ActiveXObject("Microsoft.XMLDOM");
						xmlDOM.loadXML(childList);
						if (xmlDOM.parseError != 0)
						{
							return false; 
						}
						else
						{
							var oNode = xmlDOM.documentElement.firstChild;
							var n = 0;
							if(oNode != null)
							{
								//Clear out the secondary list box, it might already have items
								dChild.length = 0; 
								while (oNode != null)
								{
								if(n==0)
								{
									dChild[n] = new Option(ddDefaultText, ddDefaultValue);
								}
								else
								{
									dChild[n] = new Option(oNode.text, oNode.attributes(0).value);
								}
								n++;
								oNode = oNode.nextSibling;
							}
							getE('imgStatus' + parent).style.display = 'none';
							/*if(n==2)
							dChild.selectedIndex = 1;*/
							}
						}
					}
					else
					{
						IgnoreValidation[control] = false;
						//alert('browserType == 1');
						var xmlDOM = new DOMParser();
						xmlDOC = xmlDOM.parseFromString(childList,"text/xml");
						var x = xmlDOC.documentElement;
						var n = 0;
						dChild.length = 0; 
						if(x.childNodes.length == 0)
						{
							IgnoreValidation[control] = true;
						}
						for (i = 0; i < x.childNodes.length; i++) 
						{ 
							//alert(x.childNodes[i].nodeName); 
							if(n==0)
							{
								dChild[n] = new Option(ddDefaultText, ddDefaultValue);
							}
							else
							{
								dChild[n] = new Option(x.childNodes[i].childNodes[0].nodeValue, x.childNodes[i].attributes[0].value);
							}
							n++;
					} 
					getE('imgStatus' + parent).style.display = 'none';
					/*if(n==2)
					dChild.selectedIndex = 1;*/
					}
				}
				else if(opt == 1)
				{
					// Clearing the previous value from hidden control
					var hidControl = getE('hid' + control);
					hidControl.value = '';
					Do(control);
					//var divControl = getE('div' + control);
					//if(timeOut[key] != null)
					//	clearTimeout(timeOut[key]);
					if(childList != '')
					{
						divControl.innerHTML = childList;
					}
					else
					{
						divControl.style.display = 'none';
					}
					//timeOut[key] = setTimeout('Hide()',3000);
					getE('imgStatus'+control).style.display = 'none';
					document.forms[0].appendChild(divControl);
				}
				else
				{
					alert('Invalid option ' + opt + 'for FillChild function');
				}
			}
			
			function getE(id)
			{
				return document.getElementById(id);
			}
			
			function getV(id)
			{
				return document.getElementById(id).value;
			}
			function BuildQuery(controlProperty,controlvalue,parentProperty,parentvalue)
			{
				var qString = '';
				var controlName = controlProperty.substring(0,controlProperty.length-4);
				var hidControl = getE('hid' + controlName);
				divControl = getE('div' + controlName);
				if(controlvalue == '' || controlvalue == 'undefined')
				{
					window.status = 'controlvalue missing';
					if(divControl != null && divControl != 'undefined')
					{
						document.forms[0].removeChild(divControl);
					}
					if(getE('imgStatus' + controlName) != null || getE('imgStatus' + controlName) != 'undefined')
					{
						getE('imgStatus' + controlName).style.display = 'none'
					}
					hidControl.value = '';
					return qString;
				}
				if(controlProperty == '' || controlProperty == null)
				{
					alert('Mandatory key missing in QueryString');
					return null;
				}
				else if(parentProperty == 'undefined' || parentProperty == null || parentProperty == '')
				{
					qString = controlProperty + '=' + controlvalue;
				}
				else if(parentvalue == '' || parentvalue == null )
				{
					window.status = 'parentvalue missing';
					return qString;
				}
				else
				{
					qString = controlProperty + '=' + controlvalue + '&' + parentProperty + '=' + parentvalue;
				}
				return qString;
			}
			
			function Call(qString,callBack)
			{
					if(qString == '')
					{
						return;
					}					
					if(cache[qString] != undefined)
					{
						window.status = "reading cache"
						WriteScript(callBack.replace("{responseText}",qString));
						return;
					}
					var request = false; 
					try 
					{   
						// for Mozilla, Netscape Safari etc browsers 
							request = new XMLHttpRequest(); 
							browserType = 1;
							var IE7 = (navigator.appVersion.indexOf("MSIE 7.")==-1) ? false : true;
							var IE8 = (navigator.appVersion.indexOf("MSIE 8.")==-1) ? false : true;
							if (IE7 ==1 || IE8 ==1)
								{
									browserType = 2;			//IE7
								}
													
					} 
					catch (trymicrosoft) // for microsoft
					{ 
						try 
						{ 
								request = new ActiveXObject("Msxml2.XMLHTTP"); 
								browserType = 2;
						} 
						catch (othermicrosoft)  // for other microsoft
						{ 
							try 
							{
									request = new ActiveXObject("Microsoft.XMLHTTP"); 
									browserType = 2;
							} 
							catch (failed) 
							{ 
								request = false; 
							} 
						} 
					} 
	
					if (!request) 
					{
						alert("Error initializing XMLHttpRequest!"); 
					}
					else 
					{
						var url = Host() + '/Data.Get?' + qString;
						request.onreadystatechange = function(){
						if(request.readyState == 4) // 4 means done loading
						{
							//alert("readyState == 4 : " + id);
							//id.close();
							if(request.status == 200)
							{
								cache[qString] = request.responseText;
								window.status = "doing callBack";
								//alert("Call 200");
								WriteScript(callBack.replace("{responseText}",qString));
							}
							else
							{
								alert('Load Failed: status: ' + request.status + " : " + request.statusText);
							}
						}
						};
						request.open("GET", url, true); 
						request.send(null);// paramr 'null' is a must for Mozilla browser
					}
			}
			
			
	
			
				function IsNumeric(strString)
				{
					var strValidChars = "0123456789";
					var strChar;
					var count;
					if (strString.length == 0) return false;
					else
					{
						//  test strString consists of valid characters listed above
						for (count = 0; count < strString.length ; count++)
						{
							strChar = strString.charAt(count);
							if (strValidChars.indexOf(strChar) == -1)
							{
								return false;
							}
						}
					}
					return true;
				}
			
			function DisableControl(checkBox,strControl)
			{
				var control = document.getElementById(strControl);
				if(checkBox.checked)
				{
					control.disabled = false;
				}
				else
				{
					control.disabled = true;
					control.value = '';
				}
			}
			
				function IsValidTwitterID(str)
				{
				  if(str=="")
            return true;
          var char;
				  char = str.charAt(0);
					if(char == '@') 
					{
						return true;
					}
					else return false;
				}
			function ValidateForm()
			{
			try
			{	var boolResult				= true;
			
			var errorMsg = new Array();
			
			var objFirstName = document.getElementById('txtFirstName');
			var objErrFirstName = document.getElementById('lblErrorFirstName');
			
				objErrFirstName.innerHTML = ''; 
			
			errorMsg['FirstName'] = 'FIRST NAME IS REQUIRED';
			
			objFirstName.value = (objFirstName.value).replace(/^\s*|\s*$/g,'');
			if( objFirstName.value == '' && !(objFirstName.disabled))
			{  
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrFirstName.innerHTML = errorMsg['FirstName'];  
				
				boolResult = false;
			}
			
			errorMsg['FirstName:LengthConstraint'] = 'Incorrect submission';
			
			if ( objFirstName.value != '' && objFirstName.value.length < 2 )
			{
				name =  '::error_message::Data_entered_has_not_valid_format'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrFirstName.innerHTML = errorMsg['FirstName:LengthConstraint'];
				
				boolResult = false;
			} 
			
			errorMsg['FirstName:ValidateStringChars'] = 'Incorrect submission';
			
			objFirstName.value = (objFirstName.value).replace(/^\s*|\s*$/g,'');
			if ( objFirstName.value != '' && objFirstName.value.length >= 2)
			{
				objErrFirstName.innerHTML = '';
			}
			if (objFirstName.value != '' && !ValidateStringChars(objFirstName.value, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑüÜ "))
			{ 
				name =  '::error_message::Data_entered_has_not_valid_format'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrFirstName.innerHTML = errorMsg['FirstName:ValidateStringChars'];
				
				boolResult = false;
			}
			
			
			var objDOBDay = document.getElementById('txtDOBDay');
			var objErrDOBDay = document.getElementById('lblErrorDOBDay');
			
				objErrDOBDay.innerHTML = ''; 
			
			errorMsg['DOBDay'] = 'BIRTHDATE IS REQUIRED';
			
			objDOBDay.value = (objDOBDay.value).replace(/^\s*|\s*$/g,'');
			if( objDOBDay.value == '' && !(objDOBDay.disabled))
			{  
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBDay.innerHTML = errorMsg['DOBDay'];  
				
				boolResult = false;
			}
			
			errorMsg['DOBDay:LengthConstraint'] = 'Incorrect submission';
			
			if ( objDOBDay.value != '' && objDOBDay.value.length < 2 )
			{
				name =  '::error_message::Data_entered_has_not_valid_format'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBDay.innerHTML = errorMsg['DOBDay:LengthConstraint'];
				
				boolResult = false;
			} 
			
			errorMsg['DOBDay:ValidateStringChars'] = 'Incorrect submission';
			
			objDOBDay.value = (objDOBDay.value).replace(/^\s*|\s*$/g,'');
			if ( objDOBDay.value != '' && objDOBDay.value.length >= 2)
			{
				objErrDOBDay.innerHTML = '';
			}
			if (objDOBDay.value != '' && !ValidateStringChars(objDOBDay.value, "0123456789"))
			{ 
				name =  '::error_message::Data_entered_has_not_valid_format'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBDay.innerHTML = errorMsg['DOBDay:ValidateStringChars'];
				
				boolResult = false;
			}
			
			
			var objDOBMonth = document.getElementById('txtDOBMonth');
			var objErrDOBMonth = document.getElementById('lblErrorDOBMonth');
			
				objErrDOBMonth.innerHTML = ''; 
			
			errorMsg['DOBMonth'] = 'BIRTHDATE IS REQUIRED';
			
			objDOBMonth.value = (objDOBMonth.value).replace(/^\s*|\s*$/g,'');
			if( objDOBMonth.value == '' && !(objDOBMonth.disabled))
			{  
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBMonth.innerHTML = errorMsg['DOBMonth'];  
				
				boolResult = false;
			}
			
			errorMsg['DOBMonth:LengthConstraint'] = 'Incorrect submission';
			
			if ( objDOBMonth.value != '' && objDOBMonth.value.length < 2 )
			{
				name =  '::error_message::Data_entered_has_not_valid_format'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBMonth.innerHTML = errorMsg['DOBMonth:LengthConstraint'];
				
				boolResult = false;
			} 
			
			errorMsg['DOBMonth:ValidateStringChars'] = 'Incorrect submission';
			
			objDOBMonth.value = (objDOBMonth.value).replace(/^\s*|\s*$/g,'');
			if ( objDOBMonth.value != '' && objDOBMonth.value.length >= 2)
			{
				objErrDOBMonth.innerHTML = '';
			}
			if (objDOBMonth.value != '' && !ValidateStringChars(objDOBMonth.value, "0123456789"))
			{ 
				name =  '::error_message::Data_entered_has_not_valid_format'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBMonth.innerHTML = errorMsg['DOBMonth:ValidateStringChars'];
				
				boolResult = false;
			}
			
			
			var objDOBYear = document.getElementById('txtDOBYear');
			var objErrDOBYear = document.getElementById('lblErrorDOBYear');
			
				objErrDOBYear.innerHTML = ''; 
			
			errorMsg['DOBYear'] = 'BIRTHDATE IS REQUIRED';
			
			objDOBYear.value = (objDOBYear.value).replace(/^\s*|\s*$/g,'');
			if( objDOBYear.value == '' && !(objDOBYear.disabled))
			{  
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBYear.innerHTML = errorMsg['DOBYear'];  
				
				boolResult = false;
			}
			
			errorMsg['DOBYear:LengthConstraint'] = 'Incorrect submission ';
			
			if ( objDOBYear.value != '' && objDOBYear.value.length < 4 )
			{
				name =  '::error_message::Data_entered_has_not_valid_format'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBYear.innerHTML = errorMsg['DOBYear:LengthConstraint'];
				
				boolResult = false;
			} 
			
			errorMsg['DOBYear:ValidateStringChars'] = 'Incorrect submission';
			
			objDOBYear.value = (objDOBYear.value).replace(/^\s*|\s*$/g,'');
			if ( objDOBYear.value != '' && objDOBYear.value.length >= 4)
			{
				objErrDOBYear.innerHTML = '';
			}
			if (objDOBYear.value != '' && !ValidateStringChars(objDOBYear.value, "0123456789"))
			{ 
				name =  '::error_message::Data_entered_has_not_valid_format'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBYear.innerHTML = errorMsg['DOBYear:ValidateStringChars'];
				
				boolResult = false;
			}
			
			errorMsg['DOBYear:AgeGreaterThan18'] = '  You must be over 18 to access this site';
			errorMsg['DOBYear:ValidateDate'] = ' Invalid Date ';
			
			if (objDOBYear.value != '' && IsNumeric(objDOBYear.value) && !IsGreaterThan18(objDOBDay.value, objDOBMonth.value, objDOBYear.value))
			{
				name =  '::error_message::User_must_be_over_18'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBYear.innerHTML = errorMsg['DOBYear:AgeGreaterThan18'];
				
				boolResult = false;
			}
			
			
			if(objDOBDay.value == '' || objDOBMonth.value == '' && objDOBYear.value == '')
			{
				objErrDOBDay.innerHTML = '';
				objErrDOBMonth.innerHTML = '';
			}
			if(objDOBDay.value == '' && objDOBMonth.value == '' && objDOBYear.value != '')
			{
				objErrDOBMonth.innerHTML = '';
				objErrDOBYear.innerHTML = '';
			}
			if (objDOBYear.value != '' && !IsValidDate(objDOBDay.value, objDOBMonth.value, objDOBYear.value))
			{
				name =  '::error_message::The_date_of_birth_are_not_valid'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrDOBYear.innerHTML = errorMsg['DOBYear:ValidateDate']; 
				
				boolResult = false;
			}
			
			
			var objGIIDNumber = document.getElementById('txtGIIDNumber');
			var objErrGIIDNumber = document.getElementById('lblErrorGIIDNumber');
			
				objErrGIIDNumber.innerHTML = ''; 
			
			errorMsg['GIIDNumber'] = 'ID NUMBER IS REQUIRED';
			
			objGIIDNumber.value = (objGIIDNumber.value).replace(/^\s*|\s*$/g,'');
			if( objGIIDNumber.value == '' && !(objGIIDNumber.disabled))
			{  
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrGIIDNumber.innerHTML = errorMsg['GIIDNumber'];  
				
				boolResult = false;
			}
			
			errorMsg['GIIDNumber:LengthConstraint'] = 'MinimumLengthRequired';
			
			if ( objGIIDNumber.value != '' && objGIIDNumber.value.length < 7 )
			{
				name =  '::error_message::Data_entered_has_not_valid_format'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrGIIDNumber.innerHTML = errorMsg['GIIDNumber:LengthConstraint'];
				
				boolResult = false;
			} 
			
			errorMsg['GIIDNumber:ValidateStringChars'] = ' Invalid Input';
			
			objGIIDNumber.value = (objGIIDNumber.value).replace(/^\s*|\s*$/g,'');
			if ( objGIIDNumber.value != '' && objGIIDNumber.value.length >= 7)
			{
				objErrGIIDNumber.innerHTML = '';
			}
			if (objGIIDNumber.value != '' && !ValidateStringChars(objGIIDNumber.value, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑüÜ 0123456789/-."))
			{ 
				name =  '::error_message::Data_entered_has_not_valid_format'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrGIIDNumber.innerHTML = errorMsg['GIIDNumber:ValidateStringChars'];
				
				boolResult = false;
			}
			
			
			var objEmail = document.getElementById('txtEmail');
			var objErrEmail = document.getElementById('lblErrorEmail');
			
				objErrEmail.innerHTML = ''; 
			
			errorMsg['Email'] = 'EMAIL IS REQUIRED';
			
			objEmail.value = (objEmail.value).replace(/^\s*|\s*$/g,'');
			if( objEmail.value == '' && !(objEmail.disabled))
			{  
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrEmail.innerHTML = errorMsg['Email'];  
				
				boolResult = false;
			}
			
			errorMsg['Email:LengthConstraint'] = ' Email address is too short';
			
			if ( objEmail.value != '' && objEmail.value.length < 5 )
			{
				name =  '::error_message::Data_entered_has_not_valid_format'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrEmail.innerHTML = errorMsg['Email:LengthConstraint'];
				
				boolResult = false;
			} 
			
			errorMsg['Email:ValidateStringChars'] = ' Incorrect Submission';
			
			objEmail.value = (objEmail.value).replace(/^\s*|\s*$/g,'');
			if ( objEmail.value != '' && objEmail.value.length >= 5)
			{
				objErrEmail.innerHTML = '';
			}
			if (objEmail.value != '' && !ValidateStringChars(objEmail.value, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@._-"))
			{ 
				name =  '::error_message::Data_entered_has_not_valid_format'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrEmail.innerHTML = errorMsg['Email:ValidateStringChars'];
				
				boolResult = false;
			}
			
			errorMsg['Email:ValidateEmailFormat'] = 'Incorrect Submission , format: <A href="mailto:a@b.xx">a@bb.xx</A> ';
			
			if (objEmail.value != '' && !IsValidEmail(objEmail.value))
			{
				name =  '::error_message::Email_address_is_not_valid'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrEmail.innerHTML = errorMsg['Email:ValidateEmailFormat'];
				
				boolResult = false;
			}
			
			
			var objSmokingPrefBrand1 = document.getElementById('ddSmokingPrefBrand1');
			var objErrSmokingPrefBrand1 = document.getElementById('lblErrorSmokingPrefBrand1');
			
				objErrSmokingPrefBrand1.innerHTML = ''; 
			
			errorMsg['SmokingPrefBrand1'] = 'BRAND PREFERENCE IS REQUIRED';
			
			if ( objSmokingPrefBrand1.selectedIndex == 0 )
			{
				if(IgnoreValidation[objSmokingPrefBrand1] == true)
				{
					return;
				}
				
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 
				
				pageTracker._trackEvent('Error','Submit',name);
				
				objErrSmokingPrefBrand1.innerHTML = errorMsg['SmokingPrefBrand1'];
				
				boolResult = false;
			}
			
			
			var objConfirmAbove18 = document.getElementById('chkConfirmAbove18');
			var objErrConfirmAbove18 = document.getElementById('lblErrorConfirmAbove18');
			
				objErrConfirmAbove18.innerHTML = ''; 
			
			errorMsg['ConfirmAbove18'] = 'You must be over 18 years of age to enter this webiste';
			
			if ( !objConfirmAbove18.checked )
			{
				name =  '::error_message::Not_all_mandatory_fields_are_completed'; 

				pageTracker._trackEvent('Error','Submit',name);
				
				objErrConfirmAbove18.innerHTML = errorMsg['ConfirmAbove18'];
				
				boolResult = false;
			}
			
			if(boolResult == true)
						{
							return true;
						}
						else
						{
							return false;
						}
			}
			catch(err)
			{
				alert(err.description );
			}
			}
			