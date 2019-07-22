
function submitform()
{
    document.getElementById('name').required = true;
    document.getElementById('email').required = true;
	document.getElementById('password').required = true;
    document.getElementById('confirm').required = true;
}


function checkpassword()
{
if (document.getElementById('password').value == document.getElementById('confirm').value) 
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
var label_studentid = document.getElementById('labelstudentid');
var label_course = document.getElementById('labelcourse');
var label_aff = document.getElementById('labelAff');
var label_SchoolID = document.getElementById('labelschoolid');

if(label_course.style.display != 'none') //remove course
{
	label_course.style.display = 'none';
}
if(document.getElementById('course').style.display != 'none')
{
	document.getElementById('course').style.display = 'none';
}

if(label_studentid.style.display != 'none') //remove studentID
{
	label_studentid.style.display = 'none';
}
if(document.getElementById('studentid').style.display != 'none')
{
	document.getElementById('studentid').style.display = 'none';
}

if(label_SchoolID.style.display != 'none')//remove schoolID
{
label_SchoolID.style.display ='none';
}
if(document.getElementById('schoolid').style.display != 'none')
{
document.getElementById('schoolid').style.display = 'none';
}

if(label_aff.style.display == 'none')//show affiliation
{
	label_aff.style.display ='initial';
}
if(document.getElementById('affiliation').style.display == 'none')
{
	document.getElementById('affiliation').style.display='initial';
}
}

function studentInput()
{
var label_studentid = document.getElementById('labelstudentid');
var label_course = document.getElementById('labelcourse');
var label_aff = document.getElementById('labelAff');
var label_SchoolID = document.getElementById('labelschoolid');

if(label_studentid.style.display == 'none') //show studentID
{
	label_studentid.style.display = 'initial';
}
if(document.getElementById('studentid').style.display == 'none')
{
	document.getElementById('studentid').style.display = 'initial';
}

if(label_course.style.display == 'none') //show course
{
	label_course.style.display = 'initial';
}
if(document.getElementById('course').style.display == 'none')
{
	document.getElementById('course').style.display = 'initial';
}


if(label_SchoolID.style.display != 'none')//remove schoolID
{
	label_SchoolID.style.display ='none';
}
if(document.getElementById('schoolid').style.display != 'none')
{
document.getElementById('schoolid').style.display = 'none';
}

if(label_aff.style.display != 'none') //remove affiliation
{
	label_aff.style.display ='none';
}
if(document.getElementById('affiliation').style.display != 'none')
{
	document.getElementById('affiliation').style.display='none';
}
}

function staffInput()
{
var label_studentid = document.getElementById('labelstudentid');
var label_course = document.getElementById('labelcourse');
var label_aff = document.getElementById('labelAff');
var label_SchoolID = document.getElementById('labelschoolid');

if(label_studentid.style.display != 'none') //remove studentID
{
	label_studentid.style.display = 'none';
}
if(document.getElementById('studentid').style.display != 'none')
{
	document.getElementById('studentid').style.display = 'none';
}

// Remove Course
if(label_course.style.display != 'none')
{
	label_course.style.display = 'none';
}

if(document.getElementById('course').style.display != 'none')
{
	document.getElementById('course').style.display = 'none';
}

// Remove Affiliation
if(label_aff.style.display != 'none')
{
	label_aff.style.display ='none';
}

if(document.getElementById('affiliation').style.display != 'none')
{
	document.getElementById('affiliation').style.display='none';
}

// Show SchoolID
if(label_SchoolID.style.display == 'none')
{
label_SchoolID.style.display ='initial';
}
if(document.getElementById('schoolid').style.display == 'none')
{
document.getElementById('schoolid').style.display = 'initial';
}
}


