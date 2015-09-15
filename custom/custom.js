// JavaScript Document
jQuery(document).ready(function($){
	//Put Your Custom Jquery or Javascript Code Here
	
});

  //campaigns model
  var active_id = 0;
  var active_type = '';
  function setCampaignValues(id, type){
    active_id = id;
    active_type = type;
  }
  function add_to_campaign(){
    if( $('#campaign_selector').val() != '' ){
      $('#add_to_campaign').prepend('<i id="loading_spinner" class="fa fa-spinner fa-spin mgr-10"></i>');
      
      $.ajax({
        url: 'index.php?r=admin/addToCampaign',
        type: "get",
        data: {campaign: $('#campaign_selector').val(), item_id: active_id, item_type: active_type},  
        error: function(xhr,tStatus,e){
          if(!xhr){
              alert(" We have an error ");
              alert(tStatus+"   "+e.message);
          }else{
              alert("else: "+e.message); // the great unknown
          }
          $('#loading_spinner').remove();
        },
        success: function(resp){
          response = JSON.parse(resp);
          if( response[0] == "done" ){
            $('#campaign_selector').val('');
            $('#new_campaign').val('');
            $('#close_campaign_model').click(); 
          }else{
            alert('Error: '+response);
          }
          $('#loading_spinner').remove();
        }
      });
    }else if( $('#new_campaign').val() != '' ){
      $('#add_to_campaign').prepend('<i id="loading_spinner" class="fa fa-spinner fa-spin mgr-10"></i>');
      
      $.ajax({
        url: 'index.php?r=admin/addToNewCampaign',
        type: "get",
        data: {campaign: $('#new_campaign').val(), item_id: active_id, item_type: active_type},  
        error: function(xhr,tStatus,e){
          if(!xhr){
              alert(" We have an error ");
              alert(tStatus+"   "+e.message);
          }else{
              alert("else: "+e.message); // the great unknown
          }
          $('#loading_spinner').remove();
        },
        success: function(resp){
          response = JSON.parse(resp);
          if( response[0] == "done" ){
            $('#campaign_selector').val('');
            $('#new_campaign').val('');
            $('#campaign_selector').append('<option value="'+response[1]+'">'+response[2]+'</option>');
            $('#close_campaign_model').click(); 
          }else{
            alert('Error: '+response);
          }
          $('#loading_spinner').remove();
        }
      });
    }else{
      alert('you must select campaign or enter name of a new one');
    }
  }