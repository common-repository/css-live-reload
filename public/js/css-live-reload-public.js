(function( $ ) {
	'use strict';
	
	
	//listen to shake event
    var shakeEvent = new Shake({threshold: _clrVars.shake_sensitive });
    shakeEvent.start();
    window.addEventListener('shake', function(){
        doReload();
    }, false);
	
	
  $( document ).keydown( function(e){
   if( e.key != _clrVars.trigger_key ){
     return true;
   }
   
   doReload();
 });
 
})( jQuery );


function doReload(){
   var styles = document.getElementsByTagName( "LINK" );
   for( var x in styles ){
     if( typeof styles[x].href != 'undefined' && styles[x].href.match( /\.css(\?.+)?$/ ) ){
       var newLink = styles[x].href.replace( /[\?|&]_live=\d+(\.\d+)?/, '' );
       var randStr = '_live=' + ( Math.random() * 9999999 );
       
       if( newLink.match (/\.css(\?.*)$/ ) ){
         newLink += '&' + randStr;
       } else {
         newLink += '?' + randStr;
       }
       
       styles[x].href = newLink;
     }
   }
   
   var $noticeDiv = jQuery( '<div class="css-live-reload-done">' + _clrVars.after_reload_msg + '</div>' );
   jQuery("body").append( $noticeDiv )
   $noticeDiv.hide(0).delay(300).fadeIn( 600 );
   
   
   setTimeout( function(){
	jQuery('.css-live-reload-done').slideUp( 300, function(){
		jQuery(this).remove();
	} );
   }, _clrVars.after_reload_msg_time  );
}


