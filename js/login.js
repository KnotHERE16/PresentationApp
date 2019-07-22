
function otherInput()
{
var label_studentid = document.getElementById('labelstudentid');
var label_email = document.getElementById('labelemail');

if(label_studentid.style.display != 'none')//remove studentid
{
label_studentid.style.display = 'none';
}
if(document.getElementById('studentid').style.display != 'none')
{
document.getElementById('studentid').style.display = 'none';
}

if(label_email.style.display == 'none')//show email
{
	label_email.style.display ='initial';
}
if(document.getElementById('email').style.display == 'none')
{
	document.getElementById('email').style.display='initial';
}
document.getElementById('studentid').removeAttribute('required');
/*
document.getElementById('email').required = true;
document.getElementById('password').required = true;
*/
}

function studentInput()
{
var label_studentid = document.getElementById('labelstudentid');
var label_email = document.getElementById('labelemail');

if(label_studentid.style.display == 'none')//show studentid
{
label_studentid.style.display ='initial';
}
if(document.getElementById('studentid').style.display == 'none')
{
document.getElementById('studentid').style.display = 'initial';
}

if(label_email.style.display != 'none') //remove email
{
	label_email.style.display ='none';
}
if(document.getElementById('email').style.display != 'none')
{
	document.getElementById('email').style.display='none';
}
/*
document.getElementById('studentid').required = true;
document.getElementById('password').required = true;
*/
document.getElementById('email').removeAttribute('required');

}


