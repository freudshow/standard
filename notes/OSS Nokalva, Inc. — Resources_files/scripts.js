function validateSearchForm()
{
var x=document.forms["cse-search-box"]["q"].value
if (x==null || x=="" || trim(x)=="") {
  return false;
}
return true;
}

function trim(string) {
	return string.replace(/^\s+|\s+$/g,"");
}

function searchBoxText(action) {
  var obj= document.getElementById("searchbox");
  if(action == 'focus'){ // focus on search box
    obj.style.border="0.1em solid #ffa600";	 // yellow border
    if (obj.value == 'Search oss.com ...') {
      obj.value = '';
      obj.style.color="#383838";
      obj.style.fontStyle="normal";	  
    }	
  } else { // focus away from search box OR click on Go button
    obj.style.border="0.1em solid #d0d0d0"; // back to gray border	  
	if (obj.value == '' || action=='go') { // reset when clicked on Go button OR search box has empty text
      obj.value = 'Search oss.com ...';
      obj.style.color="#d0d0d0";
      obj.style.fontStyle="italic";
	}	
  }
}

function kbSearchBoxText(action) {
  var obj= document.getElementById("kb-searchbox");
  if(action == 'focus'){ // focus on knowledge base search box
    obj.style.border="0.1em solid #ffa600";	 // yellow border
    if (obj.value == 'Type your search terms here ... (e.g. Extensibility Open Types)') {
      obj.value = '';
      obj.style.color="#383838";
      obj.style.fontStyle="normal";	  
    }	
  } else { // focus away from search box OR click on Search button
    obj.style.border="0.1em solid #d0d0d0"; // back to gray border	  
	if (obj.value == '' || action=='search') { // reset when clicked on Search button OR search box has empty text
      obj.value = 'Type your search terms here ... (e.g. Extensibility Open Types)';
      obj.style.color="#d0d0d0";
      obj.style.fontStyle="italic";
	}	
  }
}

function formText(operation, id) {
  var obj= document.getElementById(id);
  if(operation == 'focus'){ // focus on form item
    obj.style.border="0.1em solid #ffa600";	 // yellow border
  } else if(operation == 'click') { // click on form item
    obj.focus();	
    obj.select();  
  } else {// focus away from form item
    obj.style.border="0.1em solid #d0d0d0"; // back to gray border	  
  }
}

function showHideRow(radioValue, rowToShowHide)
{ // function uses display.block and display.none properies for collapsing row
  var theRow =  document.getElementById(rowToShowHide);
  if(radioValue == "YES") // show explanation row
  {
    theRow.style.display = "table-row";
    //theRow.style.width = "190";
  }
  else // hide explanation row
  {
    theRow.style.display = "none";
  }
}  // end showHideRow()