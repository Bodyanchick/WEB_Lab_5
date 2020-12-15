
$('.form_ochka').submit(function validate_form() 
{

    var msg = $('.form_ochka').serialize();
    
	let pib_p = /^[А-Яа-яІі\s]+$/;
	let group_p = /^[А-Яа-яІі]{2,2}-[0-9]{2,2}/;
	let email_p = /^[a-z0-9._-]+\@[a-z0-9]+\.[a-z]{2,4}$/;
	let yob = document.getElementById('yob_input').value;
	let person = document.getElementById('pib_input').value;
	let group = document.getElementById('group_input').value;
	let email = document.getElementById('email_input').value;

	

	if(pib_p.test(person) == false && person != '')
	{
		$('#msginf').html('Помилка:</br>Ім\'я повинно бути введене українськими літерами');
		return false;
	}

	if(group_p.test(group) == false && group != '')
	{
		$('#msginf').html('Помилка:</br>Поле групи повинне містити дві українські літери, дефіс та номер');
		return false;
	}

	if(email_p.test(email) == false && email != '')
	{
		$('#msginf').html('Помилка:</br>Це не схоже на Email.');
		return false;
	}

	else
	{
	    $.ajax({
	         type: 'POST',
	         url: './php_form.php',
	         data: msg,
	        success: function(data)
	        { 
	            $('#msginf').html(data);
	        },
	         error:  function(xhr, str) 
	        {
		    	alert('Виникла помилка: ' + xhr.responseCode);
	        }
	     });
	    return false;
	}
});





		