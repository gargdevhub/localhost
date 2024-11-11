$(document).on('click','[confirm-href]',function(){
	var confirm_text = ($(this).attr('confirm-text') && $(this).attr('confirm-text') != '') ? $(this).attr('confirm-text') : 'Visit '+$(this).attr('confirm-href')+'?';
	if(confirm(confirm_text)){
		location.href = $(this).attr('confirm-href');
		return true;
	}
	return false;
});