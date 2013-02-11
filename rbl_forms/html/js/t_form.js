/**
* Validation des formulaires
* date : 09/07/2007
* origine : http://www.dhtmlgoodies.com/
* js: http://www.dhtmlgoodies.com/index.html?whichScript=dhtml-form-validation
* modifier par: R. Berthou & B. Vanzo
*/

// callBack
	var callbackOnBlurValid;
	var callbackOnBlurInvalid;
	
	var callbackOnFormValid;
	var callbackOnFormInvalid;

	var zoneMessage = false ;

// Patterns
var formValidationMasks = new Array();
formValidationMasks['decimal'] = /^.*$/gi;	// Numeric
formValidationMasks['email'] = /\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/gi;	// Email
formValidationMasks['numeric'] = /^[0-9]+$/gi;	// Numeric
//RBL
formValidationMasks['money']  = /^[-+]?[ 0-9]+[,.]?[0-9]{0,2}$/gi;	// Numeric
formValidationMasks['money2'] = /^[-+]?[ 0-9]+[,.][0-9]{2}$/gi;	// Numeric
formValidationMasks['dd-mm-yyyy'] = /(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)[0-9][0-9]$/gi;	// Date
formValidationMasks['yyyy-mm-dd'] = /(19|20)[0-9][0-9][- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/gi;  // Date
formValidationMasks['yyyymmdd'] = /(19|20)[0-9][0-9](0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])$/gi;  // Date
formValidationMasks['yyyy-mm'] = /(19|20)[0-9][0-9][- /.](0[1-9]|1[012])$/gi;  // Date
//FIN RBL

var errArray = new Array();
var formElementArray = new Array();
var nbErr     = 0 ;

// RBL
function getKeyCode(evt) {
	evt = (evt) ? evt : window.event ;
  if (!evt.keyCode) {
       return (evt.charCode) ? evt.charCode :
                      ((evt.keyCode) ? evt.keyCode :
                      ((evt.which) ? evt.which : 0));
	} else {
		return evt.keyCode ;
	}
}

/**
 * Sur l'evenement onBlur il est possible de reformater la zone si elle est valide
 * 
 */
function blurInput(e)
{
	var val = validatePrivate(false,this) ;
	if (val) {
		formatInput(this) ;
		__clearMessage( "", zoneMessage ) ;
		 __handleCallback('blurValid', this);
	} else {
		 var err = __getErreur(this._form, this.name) ;
		 var txt = "" ;
		 if (err != null)
		 	  txt = err.affiche();
		 	  
		 __clearMessage( "<table width='90%'>"+txt+"</table>", zoneMessage ) ;
		 __handleCallback('blurInvalid', this);
  }
}

/**
 * Sur les evenements onchange, onpaste 
 * 
 */
function validateInput(e,inputObj)
{
		validatePrivate(e,inputObj) ;
}
/**
 * Fonction de base de validation d'un element
 */
function validatePrivate(e,inputObj)
{
	if(!inputObj)inputObj = this;		
	var inputValidates = true;
	

	var _no = inputObj._form ;
	
	var zErr = "" ;

	if (!formElementArray[_no+'_'+inputObj.name])
		return false ;
		
	//bv ajout des 2 dernieres condition
	if( formElementArray[_no+'_'+inputObj.name]['required'] && inputObj.tagName=='INPUT' && inputObj.value.length==0 &&  inputObj.type!='checkbox' &&  inputObj.type!='radio') {
		inputValidates = false;
		zErr += "�La zone est obligatoire" ;
	}
	if( formElementArray[_no+'_'+inputObj.name]['required'] && inputObj.tagName=='SELECT' && inputObj.selectedIndex==0){
		inputValidates = false;
		zErr += "�La zone est obligatoire" ;
	}
	//bv
	if( formElementArray[_no+'_'+inputObj.name]['required'] && inputObj.tagName=='INPUT' && inputObj.type=='radio'){ 
		if (!isSelect(inputObj)) {
			inputValidates  = false ;
		  zErr += "�Vous devez choisir un des boutons radio" ;
  	} else {
			inputValidates  = true ;
    }
	}
	if( formElementArray[_no+'_'+inputObj.name]['required'] && 
	    inputObj.tagName=='INPUT' &&  
	    inputObj.type=='checkbox' ){ 
		if ( !isCheckboxSelect(inputObj) ) {
			inputValidates  = false ;
			zErr += "�Vous devez choisir au moins une des cases a chocher" ;
		} else {
			inputValidates  = true ;
	  }
	}
	//fin bv
	
	if(formElementArray[_no+'_'+inputObj.name]['mask'] && 
	  !inputObj.value.match(formValidationMasks[formElementArray[_no+'_'+inputObj.name]['mask']])) {
	    inputValidates = false;
	    zErr += "�La saisie ne correspond pas au format du 'mask' " + formElementArray[_no+'_'+inputObj.name]['mask']  ;
	}

	if(formElementArray[_no+'_'+inputObj.name]['freemask']){
		var tmpMask = formElementArray[_no+'_'+inputObj.name]['freemask'];
		tmpMask = tmpMask.replace(/9/g,'[0-9]');
		tmpMask = tmpMask.replace(/#/g,'[0-9]?');
		tmpMask = tmpMask.replace(/S/g,'[-+]');
		tmpMask = tmpMask.replace(/s/g,'[-+]?');
		
		tmpMask = tmpMask.replace(/A/g,'[A-Z]');
		tmpMask = tmpMask.replace(/a/g,'[A-Z]?');
		tmpMask = tmpMask.replace(/M/g,'[a-zA-Z]');
		tmpMask = tmpMask.replace(/m/g,'[a-zA-Z]?');
		tmpMask = tmpMask.replace(/N/g,'[0-9a-zA-Z]');
		tmpMask = tmpMask.replace(/n/g,'[0-9a-zA-Z]?');
		tmpMask = tmpMask.replace(/V/g,'[.,]');
		tmpMask = tmpMask.replace(/v/g,'[.,]?');
		tmpMask = tmpMask.replace(/T/g,'.');
		tmpMask = tmpMask.replace(/t/g,'.?');
		
		tmpMask = eval("/^" + tmpMask + "$/g");
		if(!inputObj.value.match(tmpMask)) { 
				inputValidates = false
	      zErr += "�La saisie ne correspond pas au format du 'freemask' " + formElementArray[_no+'_'+inputObj.name]['freemask'] ;
		}
	}	
	
	if(formElementArray[_no+'_'+inputObj.name]['regexp']){
		var tmpMask = eval(formElementArray[_no+'_'+inputObj.name]['regexp']);
		if(!inputObj.value.match(tmpMask)) {
				inputValidates = false ;
	      zErr += "�La saisie ne correspond pas au patern " + tmpMask  ;
		}
	}
	

	if(!formElementArray[_no+'_'+inputObj.name]['required'] && 
	   inputObj.value.length==0 && 
	   inputObj.tagName=='INPUT' )
	   	inputValidates = true ;


	styleValidation(inputObj,inputValidates);
  
  if (inputValidates)
		  __addErreur(_no, inputObj.name, '') ;
  else
		  __addErreur(_no, inputObj.name, zErr) ;
  
	return inputValidates ;
	
}

/**
 * Traite l'evenement onkeyup
 */
function toNext(e)
{
		validatePrivate(false,this) ;
		var inputObj = this;		
		var c = getKeyCode(e) ;
		var goNext = true ;

		if ((c==9) || (c==16) || (c==17) || (c==18) || (c==20) || (c==27) || (c==45) || (c==144)) {
    		goNext = false ;
		}
		/* touches deplacements */	
   	if ((c > 32) && (c < 41)) {
   		 goNext = false ;
		}
		var _no = inputObj._form ;
		
		if ( formElementArray[_no+'_'+inputObj.name]['autoSkip'] && 
				 inputObj.parentNode.className=='validInput'  &&
				 goNext &&
				 inputObj.value.length == formElementArray[_no+'_'+inputObj.name]['maxlength'] ) {
				 var divs = document.getElementsByName(formElementArray[_no+'_'+inputObj.name]['next']) ;
				 for (var _n = 0;_n<divs.length;_n++) {
				 	if (divs[_n]._form == inputObj._form)
				 		divs[_n].focus() ;
				 }
	  }

}

// FIN RBL

//debut bv
function isSelect(nom_elem)
{
	var _no = nom_elem._form ;
	
	var inputR = document.getElementsByName(nom_elem.name);
	var is_check = false ;	
	for(var no=0;no<inputR.length;no++){
		if (inputR[no]._form == _no)
			is_check = is_check || inputR[no].checked ;
	}	

	return is_check;
}

function isCheckboxSelect(nom_elem)
{
	
	var _no = nom_elem._form ;
	var _nn = parseInt(_no) ;
	var grp = nom_elem.getAttribute('group') ;

	var is_check = false ;	
	var inputR = document.forms[_nn].getElementsByTagName('INPUT');
		
	var _no = nom_elem._form ;

	for(var no=0;no<inputR.length;no++){
		if(inputR[no].getAttribute('group') == grp){		
			is_check = is_check || inputR[no].checked ;
		}
	}
		return is_check;
}
//fin bv

/**
 * Formatage de l'objet si celui ci est valide
 * @param objet � formater 
 */
function formatInput(inputObj)
{
	var _no = inputObj._form ;
	if ( (formElementArray[_no+'_'+inputObj.name]['mask'] == 'money') || 
		   (formElementArray[_no+'_'+inputObj.name]['mask'] == 'money2') || 
			 (formElementArray[_no+'_'+inputObj.name]['mask'] == 'decimal') ) {
			inputObj.value = formatNumber(inputObj.value,2) ;
	}
}
/**
 * Formatage d'un objet numerique
 * @param val  : valeur � formater (String)
 * @param ndec : nombre de decimal
 *
 * @return String : chaine format�e
 */
function formatNumber(val, ndec) {
	var n = parseFloat(val.replace(' ', '').replace(',','.')) ;
	return n.toFixed(ndec).replace('.',',') ;
}


function styleValidation(inputObj,val)
{
	var divs = inputObj.parentNode.parentNode.getElementsByTagName('SPAN');
	var bb = true ;
	
	if(val){
		inputObj.parentNode.className='validInput';
		
		for(var no=0;no<divs.length;no++){
			if ((inputObj.type=='radio'    && (divs[no].id=='radio'))||
					(inputObj.type=='checkbox' && (divs[no].id=='checkbox'))) {
				divs[no].className='validInput';
				if (divs[no].id=='checkbox') {
					 __addErreur(inputObj._form,divs[no].firstChild.name,''); 
				}
		  } else {
				if(divs[no].className=='invalidInput') {
					bb = false;
				}
			}
		}
	}else{
		bb = false;
		inputObj.parentNode.className='invalidInput';
    if (inputObj.type=='checkbox') {
  			for(var no=0;no<divs.length;no++){
					if ( (divs[no].id    ==  'checkbox') && 
					     (divs[no].firstChild.getAttribute('group') == inputObj.getAttribute('group')) ) 
					{
						divs[no].className='invalidInput';
				  } 
				}
		}
	}


	if (!bb)  {
		inputObj.parentNode.parentNode.className='e1' ;
	}
	else {
		inputObj.parentNode.parentNode.className='e0' ;
	}
}


function isFormValid(frm, idzone)
{
	var divs ;
  divs = frm.getElementsByTagName('SPAN');

	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='invalidInput'){ 
				if (idzone) __afficheErreur(idzone) ;
			return false;
		}
	}

	return true;	
}

function initFormsValidation(idz)
{
	var myform = document.getElementById(idz) ;
	
		if(myform){
			initFormValidation(myform, 0) ;
		}
	
}

function initFormValidation(dc, _no )
{
	var inputFields = dc.getElementsByTagName('INPUT');
	var selectBoxes = dc.getElementsByTagName('SELECT');
	
	var inputs = new Array();
		
	for(var no=0;no<inputFields.length;no++){
		inputs[inputs.length] = inputFields[no];
	}	
	
	for(var no=0;no<selectBoxes.length;no++){
		inputs[inputs.length] = selectBoxes[no];
	}
	
	for(var no=0;no<inputs.length;no++){
		if(inputs[no].type=='submit' || inputs[no].type=='button' ){
			/* ne pas traiter les boutons */
		} else {

		var className = inputs[no].parentNode.className;
		if(className && className.indexOf('validInput')>=0) continue;
				
		var required = inputs[no].getAttribute('required');
		if(!required)required = inputs[no].required;		
		
		var mask = inputs[no].getAttribute('mask');
		if(!mask)mask = inputs[no].mask;
		
		var freemask = inputs[no].getAttribute('freemask');
		if(!freemask)freemask = inputs[no].freemask;
		
		var regexp = inputs[no].getAttribute('regexp');
		if(!regexp)regexp = inputs[no].regexp ;

	// RBL		
		var autoSkip = inputs[no].getAttribute('autoSkip');
		if(!autoSkip)autoSkip = inputs[no].autoSkip;

		var maxlength = inputs[no].getAttribute('maxlength');
		if(!maxlength)maxlength = parseInt(inputs[no].maxlength);
		
		var next     = inputs[no].getAttribute('next');
		var nn = no ;
		while(!next) {
			nn = nn +1 ;
			if (nn<inputs.length) {
				next = inputs[nn].name;
			}
			else {
				break ;
			}
		}
		// FIN RBL
		
		//bv
		var group = inputs[no].getAttribute('group');
		if(!group)group = inputs[no].group;
		//fin bv

		// recherche et extraction du label
		var label = inputs[no].name ;
		if (inputs[no].previousSibling) {
			if (inputs[no].previousSibling.nodeName == 'LABEL') {
				var xx = inputs[no].previousSibling.innerHTML ;
				var i = xx.indexOf('<img') ;
				if (i>0) xx = xx.substr(0,i) ;
				xx = xx.replace('<u>', '').replace('</u>', '') ;
				label = xx ;
			}
		}
		
		//rbl
		// ne pas supprimer la div mais la transformer en span" 
		var div = document.createElement('SPAN');
		div.className = 'invalidInput';
		div.id=inputs[no].type;
		div.group=inputs[no].group;
		inputs[no].parentNode.insertBefore(div,inputs[no]);
		div.appendChild(inputs[no]);
		div.style.width = inputs[no].offsetWidth + 'px';
		//fin rbl
		
		inputs[no].onblur   = blurInput;
		inputs[no].onchange = toNext;
		inputs[no].onpaste  = validateInput;
		// RBL
		inputs[no].onkeyup  = toNext;

		inputs[no]._form = _no;
		
		if(inputs[no].type=='radio' || inputs[no].type=='checkbox' ){
			inputs[no].onclick = toNext;
		}
		// FIN RBL 
		
		
//		inputs[no].onkeypress = toNext;
		
		formElementArray[_no+'_'+inputs[no].name] = new Array();
		formElementArray[_no+'_'+inputs[no].name]['mask'] = mask;
		formElementArray[_no+'_'+inputs[no].name]['freemask'] = freemask;
		formElementArray[_no+'_'+inputs[no].name]['required'] = required;
		formElementArray[_no+'_'+inputs[no].name]['regexp'] = regexp;
		
		// RBL
		formElementArray[_no+'_'+inputs[no].name]['form'] 		 = _no;
		formElementArray[_no+'_'+inputs[no].name]['maxlength'] = maxlength;

		formElementArray[_no+'_'+inputs[no].name]['autoSkip'] = autoSkip;
		formElementArray[_no+'_'+inputs[no].name]['next'] = next;
		formElementArray[_no+'_'+inputs[no].name]['label'] = label;
		// FIN RBL
		//bv
		formElementArray[_no+'_'+inputs[no].name]['group'] = group;
		//fin bv
		
		validateInput(false,inputs[no]);
		}	
	}	
}

function __clearMessage(txt, idzone) {
	if (idzone) {
		document.getElementById(idzone).innerHTML = txt;
	}
}
function __addMessage(txt, idzone) {
	if (idzone) {
		document.getElementById(idzone).innerHTML += txt + "<br/>";
	}
}

function erreur(no, zone, txt) {
	this.frm     = no ;
	this.zone    = zone ;
	this.message = txt ;
	this.label   = formElementArray[no+'_'+zone]['label'] ;
	
	this.affiche = function() {
		if (this.message == '')
			return "" ;
		else
			return "<tr valign='top'><td width='20%'><b>"+ this.label + "</b></td><td><ul>" + this.message.replace(/�/g,'<li>') + "</ul></td></tr>";
  }
}

function __addErreur(no, zone, txt) {
		var bI = true ;
		for(var n=0;n<errArray.length ;n++){
			err = errArray[n] ;
			if((err.frm == no) && (err.zone ==zone)) {
				errArray[n].message = txt ;
				return ;
			}
		}
		errArray.push( new erreur(no, zone, txt) ) ;
}
function __getErreur(no, zone) {
	var err ;
	for(var n=0;n<errArray.length ;n++){
		err = errArray[n] ;
		if((err.frm == no) && (err.zone ==zone))
			return err ;
	}
		return null ;
}

function __afficheErreur(idzone) {
	var st = "<table width='90%'>" ;
	for(var n=0;n<errArray.length ;n++){
		st += errArray[n].affiche() ;
	}
	st += "</table>" ;
	__clearMessage( st, idzone );
}

function __setZoneMessage(fM )
{
		zoneMessage = fM ;
}

function setCallBackForm(fV, fInv )
{
		if (fV) callbackOnFormValid = fV ;
		if (fInv) callbackOnFormValid = fInv ;
}
function setCallBackElt(fV, fInv )
{
		if (fV) callbackOnBlurValid = fV ;
		if (fInv) callbackOnBlurInvalid = fInv ;
}

  /**
   *	Execute call back functions.
   *
	 * @private
   */	
function __handleCallback(action, elt)
	{
		var _blur = false ;
	  var callbackString='';

	  switch(action){
		   case "blurValid":
		      if(callbackOnBlurValid) {
		   		   callbackString=callbackOnBlurValid;
		   		   _blur = true ;
		   	  }
		      break;
		   case "blurInvalid":
		      if(callbackOnBlurInvalid) {
		   		   callbackString=callbackOnBlurInvalid;
		   		   _blur = true ;
		   	  }
		      break;
		   case "formValid":
		   if(callbackOnFormValid)callbackString=callbackOnFormValid;
		      break;
		   case "formInvalid":
		   if(this.callbackOnFormInvalid)callbackString=callbackOnFormInvalid;
		      break;		
	  }		
	  if(callbackString){
	  	  if (_blur) {
		    	callbackString=callbackString+'('+elt._form+',\''+elt.name+'\')';
	  	  } else {
		    	callbackString=callbackString+'(this.formElements)';
		    }
		    eval(callbackString);
	}	
	
}

//window.onload = initFormsValidation;	
