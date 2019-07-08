function cus_load_more(disValue) {
    var i = 9;
    for(;i <= $('#subs_post .single_news').length; i++) {
        $('#subs_post .single_news:eq('+ i +')').css('display', disValue);
    }
}
cus_load_more('none');
$('#load_more').on('click', function(e) {
   e.preventDefault();
   cus_load_more('block'); 
})