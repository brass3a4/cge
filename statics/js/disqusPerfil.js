/* * * CONFIGURATION VARIABLES * * */
// var disqus_shortname = 'blogerisimo';
// var disqus_identifier = '123';
// var disqus_title = 'eltitulo';
// var disqus_url = 'a unique URL for each page where Disqus is present';



 /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'blogerisimo';
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
/* * * Disqus Reset Function * * */
var reset = function (newIdentifier, newUrl, newTitle, newLanguage, nombreModal) {
    // alert(newIdentifier);
    $('#disqus_thread').remove();
    $('#'+nombreModal).append("<p><div id='disqus_thread'></div></p>");
    DISQUS.reset({
        reload: true,
        config: function () {
            // this.page.shortname = 'blogerisimo';
            this.page.identifier = newIdentifier;
            this.page.url = newUrl;
            this.page.title = newTitle;
            this.language = newLanguage;
        }
    });
};



