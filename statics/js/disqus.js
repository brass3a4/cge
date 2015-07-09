// var disqus_config;
// $(document).on('ready',function(){
//     $.post(urlBase+"index.php/dashboard_c/disqus", {
//         // estudios : estudios,
//         // rol: rol
//         }, function(data) {
//             // console.log(data);
//             var datos = JSON.parse(data);
//             var route = datos.message+" "+datos.hmac+" "+datos.timestamp;
//             // console.log(datos.DISQUS_PUBLIC_KEY);
//             disqus_config = function() {
//                 this.page.remote_auth_s3 = datos.message+" "+datos.hmac+" "+datos.timestamp;
//                 this.page.api_key = datos.DISQUS_PUBLIC_KEY;
//             }
//             // console.log(disqus_config);
//         }
//     );
// });

 /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'Admisiones';
// var disqus_identifier = '';
// var disqus_url = '';
// var disqus_config = function () {
//     this.language = "es";
// };
/* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
/* * * Disqus Reset Function * * */
var reset = function (newIdentifier, newUrl, newTitle, newLanguage, IdArchivo) {
    // alert(IdArchivo);
    $('#disqus_thread').remove();
    $('#disqus'+IdArchivo).append("<p><div id='disqus_thread'></div></p>");
    // $('#disqus'+IdArchivo).append('<a href="http://localhost/cge/dashboard_c#disqus_thread">Link</a>');
    
    DISQUS.reset({
        reload: true,
        config: function () {
            // this.page.shortname = 'blogerisimo';
            this.page.identifier = newIdentifier;
            this.page.url = newUrl;
            this.page.title = newTitle;
            this.language = 'es';
        }
    });
};