function createJewllwer(form)
{
  var form = $(form);
  form.find('.input-error').remove();
  form.parents('.modal-content').find('.modal-header h3').remove();
  $.post(form.attr('action'), form.serialize(), function(response){
      response = $.parseJSON(response);
      if(response['status']=='2') {
        response = response['message'];
      for(field in response) {
        if(response[field].rule=='required') {
            form.find('[name="'+field+'"]').after('<span class="input-error text-danger">This is required</span>');
        }
        if(response[field].rule=='min_length') {
            form.find('[name="'+field+'"]').after('<span class="input-error text-danger">Minimum '+response[field].params[0]+' character requried</span>');
        }
        if(response[field].rule=='valid_email') {
            form.find('[name="'+field+'"]').after('<span class="input-error text-danger">Invalid email address</span>');
        }
        if(response[field].rule=='unique') {
            form.find('[name="'+field+'"]').after('<span class="input-error text-danger">'+field+' is already exists</span>');
        }
      }
    } else if(response['status']=='0'){
      form.parents('.modal-content').find('.modal-header').append('<h3 class="text-danger">'+response['message']+'</h3>');
    } else if(response['status']=='1'){
        form.parents('.modal-content').find('.modal-header').append('<h3 class="text-success">'+response['message']+'</h3>');
        form.find('input').val('');
        setTimeout(function(){window.location.reload()}, 1500);
    }
  });
  return false;
}

function openJwelModal(modelClass){
var selected = parseInt($('.select_jeweller:checked').length);
if(selected===0) {
  alert('Please select jeweller');
  return false;
} else if(selected>1) {
  alert('Please select one jeweller');
  return false;
}
/*else if(modelClass=='.modal-email' && selected>1) {
  alert('Please select one jeweller to change email address.');
  return false;
} else if(modelClass=='.modal-password' && selected>1) {
  alert('Please select one jeweller to change password.');
  return false;
}*/


var Jew = new Array();
$('.select_jeweller:checked').each(function(i){
    Jew[i] = $(this).val();
});
var jewellers = Jew.join(',');
$(modelClass).find('.jewellers').val(jewellers);
if(modelClass=='.modal-postcode') {
$.post($(modelClass).data('url'),{user_id:jewellers}, function(response){
  response = response.split(',');
  for(i in response) {
    $('.postcode').tagsinput('add',response[i]);
  }
  $(modelClass).modal('show');
});
} else {
  $(modelClass).modal('show');
}
return false;
}


function sort_listing(f)
{
  var listing = $(f);
  if(listing.length) {
    $.get(listing.attr('action'),listing.serialize(), function(response){
          $('#sort_listing').html(response);
    });
  }
  return false;
}

$(function(){
$('#sort_listing_form').submit();
});

function setPageFilter(page)
{
  if(page=='<'){
    page = parseInt($('#listing_page').val())-1;
  }

  if(page=='>'){
    page = parseInt($('#listing_page').val())+1;
  }
  if(page<=0) page = 1;
  $('#listing_page').val(page);
  $('#sort_listing_form').submit();
}


function moreless(id, op1, op2)
{
  if($('#content_'+id).hasClass('fixview')) {
    $('#content_'+id).removeClass('fixview');
  }else  {
    $('#content_'+id).addClass('fixview')
  }

  $('#'+op1+'_'+id).removeClass('hidden');
  $('#'+op2+'_'+id).addClass('hidden');

}

function openApproveModal(btn)
{
  var elm = $(btn);
  $('.approve-amount').find('form').attr('action', elm.data('url'));
  $('.approve-amount').modal('show');
}

$('input').on('keydown,keypress', function(e) {
    if (e.which == 13) {
        e.preventDefault();
    }
});
$(document).keypress(function (e) {
    if (e.which == 13) {
        return false;
    }
})

function openActivitesModal(modelClass, elm){
	elm = $(elm);
	$.get(elm.data('url'),'', function(response){ 
		
		$(modelClass).find('.modal-body').html(response);
		$(modelClass).modal('show');
	}); 
	
}
