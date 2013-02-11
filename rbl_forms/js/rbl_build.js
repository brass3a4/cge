
/**
 * Construction du formulaire XML sous forme de string
 */ 
function build_xml_elt( ) { 
	var str = "" ;

	str = str + "<?xml version='1.0' encoding='utf-8'?>\r\n" ;
	
	if (rblFormArray[ IDFORM ] ) {
		str = str + rblFormArray[ IDFORM ].startXml() + "\r\n" ;
	
		var _col   = 0 ;
		var _ligne = 0 ;
		var _id_c ;
		
		jQuery("#" + IDFORM).find("ul")
						.each( function(){

							_id_c = jQuery(this).attr("id_n") ;
							str = str + rblColArray[ _id_c ].startXml() ;

							jQuery(this).find("li")
									.each( function(){
										var _id  = jQuery(this).attr('id') ;
										var _x   = _id.indexOf("f_col_") ;
										if ( _x == 0) {
											_col   = _col + 1 ;
											_ligne = 0 ;
										} 
										else {
											_ligne = _ligne + 1 ;
												_id = _id.substr(2) ;
												if ( rblEltArray[ _id ] != null ) {
													str = str + "  "+ rblEltArray[ _id ].drawXml(_col, _ligne) +"\r\n";
											  }
											}								
									});
											
							str = str + rblColArray[ _id_c ].endXml() ;
						});
			
		str = str + rblFormArray[ IDFORM ].endXml() ;
	}
	else {
			alert ( 'formulaire non definie' );
	}
	
	return str ;
} 

/**
 * Construction du formulaire HTML sous forme de string
 */ 
function build_html( ) { 
	var str = "" ;

	if (rblFormArray[ IDFORM ] ) {
		str = str + rblFormArray[ IDFORM ].startHtml() + "\r\n" ;
	
		var _col   = 0 ;
		var _ligne = 0 ;
		var _id_c ;
		
		jQuery("#" + IDFORM)
			.find("ul")
			.each( function(){

				_id_c = jQuery(this).attr("id_n") ;
				str = str + rblColArray[ _id_c ].startHtml()  + "\r\n";

				jQuery(this).find("li")
						.each( function(){
								var _id  = jQuery(this).attr('id') ;
								var _x   = _id.indexOf("f_col_") ;
								if ( _x == 0) {
									_col   = _col + 1 ;
									_ligne = 0 ;
								} 
								else {
									_ligne = _ligne + 1 ;
									_id = _id.substr(2) ;
									if ( rblEltArray[ _id ] != null ) {
										str += "<li id='f_" + _id +"' >\r\n  ";
										str += rblEltArray[ _id ].drawElement0(true) ;
										if (rblEltArray[ _id ].e_type != "wizard") str += "\r\n</li>\r\n" ;
									}
								}								
						});
					
				/* la chaine se termine par un </div> si c'est le dernier paneaux (alors col déjà fermée) */
				if ( str.indexOf('</div>', str.length - 8) < 0 )
					str = str + rblColArray[ _id_c ].endHtml()  + "\r\n" ;
			});
			
			str = str + rblFormArray[ IDFORM ].endHtml()  + "\r\n" ;
	}
	else {
		alert ( 'formulaire non definie' );
	}
	
	return str ;
} 

/**
 * Chargement du formulaire XML
 */ 
function load_xml( surl ) { 

	jQuery.ajax({
		type: "GET",
		url: "xml/"+surl,
		cache: false,
		dataType: "xml",
		complete : function(data, status) {
			var resp = data.responseXML;
			var nu_col = 1 ;
			
			jQuery("#tabs-1").find('form').remove() ;
			jQuery(resp).find('form').each(function(){
				loadForm( this, surl ) ;
				var name = jQuery(this).find('name').text();
			});
			jQuery(resp).find('colonne').each(function(){
				loadCol( this, nu_col ) ;

				jQuery(this).find('element').each(function(){
					loadElement( this, nu_col, nbelt ) ;
					nbelt++ ;
				});
				
				nu_col++ ;
			});
			initDrop() ;
			
			jQuery(".connectedSortable li").removeClass("selected");

		}
	});

}

/**
 * Chargement du formulaire XML
 */ 
function save_xml( surl ) { 

	var bVal ;
	bVal = rblFormArray[ IDFORM ].e_file ;
	if ( !(bVal && bVal.length > 0) ) {
		alert("Vous devez preciser le nom du fichier dans la boite de dialogue formulaire avant toute sauvegarde !") ;
		return ;
	}
	
	jQuery.ajax({
		type: "POST",
		url: "php/save_xml.php",
		cache: false,
		data: ({file: bVal,
				data : build_xml_elt()}),
		dataType: "text",
		complete : function(data, status) {
			alert("Sauvegarde xml : " + bVal + "/" + status ) ;
	}});

	jQuery.ajax({
		type: "POST",
		url: "php/save_html.php",
		cache: false,
		data: ({file: bVal.replace("xml","html"),
				data : build_html()}),
		dataType: "text",
		complete : function(data, status) {
			alert("Sauvegarde html : " + bVal + "/" + status ) ;
	}});

}

/**
 * Affichage de la boite de dialogue associée à l'élément sélectionné
 */
function showFilePanel( ) {

	jQuery("#dialog_file").load("php/liste_file.php",
			function() { 
				jQuery('#dialog_file').dialog('open');
			});
}