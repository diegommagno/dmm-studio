jQuery( document ).ready( function($){
   "use strict";
   
    $('.instive_header_builder_select').on('change',function(){
       var id = $(this).val();
     
       var admin_url = admin_url_object.admin_url+id;
       $('.instive_header_builder_edit_link').attr("href", admin_url)
    });

});