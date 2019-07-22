function checkpassword()
{
if (document.getElementById('newpass').value == document.getElementById('newconfirm').value) 
{
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'passwords are matching';
	document.getElementById('submit').disabled = false;
} 
else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'passwords are not matching';
	document.getElementById('submit').disabled = true;
}
}

function guestInput()
{
var label_SchoolID = document.getElementById('labelSchoolID');
var label_email = document.getElementById('labelemail');

if(document.getElementById('labelSchoolID').style.display != 'none')//remove schoolID
{
document.getElementById('labelSchoolID').style.display = 'none';
}
if(document.getElementById('schoolid').style.display != 'none')
{
document.getElementById('schoolid').style.display = 'none';
}

if(label_email.style.display == 'none')//show email
{
	label_email.style.display ='initial';
}
if(document.getElementById('email').style.display == 'none')
{
	document.getElementById('email').style.display='initial';
}
document.getElementById("schoolid").required = false;
document.getElementById("email").required = true;
document.getElementById("newpass").required = true;
document.getElementById("newpass").required = true;
}

function studentInput()
{
var label_SchoolID = document.getElementById('labelSchoolID');
var label_email = document.getElementById('labelemail');

if(document.getElementById('labelSchoolID').style.display == 'none')//show schoolID
{
document.getElementById('labelSchoolID').style.display ='initial';
}
if(document.getElementById('schoolid').style.display == 'none')
{
document.getElementById('schoolid').style.display = 'initial';
}

if(label_email.style.display != 'none') //remove email
{
	label_email.style.display ='none';
}
if(document.getElementById('email').style.display != 'none')
{
	document.getElementById('email').style.display='none';
}
document.getElementById("email").required = false;
document.getElementById("schoolid").required = true;
document.getElementById("newpass").required = true;
document.getElementById("newpass").required = true;
}

function staffInput()
{
var label_SchoolID = document.getElementById('labelSchoolID');
var label_email = document.getElementById('labelemail');

if(document.getElementById('labelSchoolID').style.display == 'none')//show schoolID
{
document.getElementById('labelSchoolID').style.display ='initial';
}
if(document.getElementById('schoolid').style.display == 'none')
{
document.getElementById('schoolid').style.display = 'initial';
}

if(label_email.style.display != 'none') //remove email
{
	label_email.style.display ='none';
}
if(document.getElementById('email').style.display != 'none')
{
	document.getElementById('email').style.display='none';
}
document.getElementById("email").required = false;
document.getElementById("schoolid").required = true;
document.getElementById("newpass").required = true;
document.getElementById("newpass").required = true;
}
