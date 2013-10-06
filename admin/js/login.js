try{Typekit.load();}catch(e){}

$(document).ready(function() {
	$('#loginform input[type="text"]').attr('placeholder', 'Usuario');
	$('#loginform input[type="password"]').attr('placeholder', 'Senha');
	$('#lostpasswordform input[type="text"]').attr('placeholder', 'Usuario ou e-mail');
	$('#loginform input[type="submit"]').attr('value', 'Acessar painel');
	$('#lostpasswordform input[type="submit"]').attr('value', 'Recuperar senha');

	$('#loginform label[for="user_login"]').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	$('#loginform label[for="user_pass"]').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	$('#lostpasswordform label[for="user_login"]').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	
	$(document.documentElement).addClass('js');
});

var usr = document.documentElement;
usr.setAttribute('data-useragent', navigator.userAgent);