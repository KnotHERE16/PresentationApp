var modal = document.getElementById('modalID');
var modal_assess = document.getElementById('modal_assessID');
var modal_OTP = document.getElementById('modal_OTPid');
var cross = document.getElementsByClassName("close")[0];
var cross2 = document.getElementsByClassName("close")[1];
var cross3 = document.getElementsByClassName("close")[2];
var boxvalue;
var schedulearray;//store result


function sdisplay(boxdata) {
    boxvalue = boxdata.getAttribute("data-box"); // array index for the box
    truevalue = boxdata.getAttribute("data-assess"); // assessor status
    boxdate = boxdata.getAttribute("data-date"); // value TODAY==1 / Future==0
    nowdata = boxdata.getAttribute("data-now");// value 2 = True / 4 = False

    if (truevalue == 1) {
        if (nowdata == 2) {
            document.getElementById("otpboxid").value = boxvalue;
            modal_OTP.style.display = "block";
        }
        else {
            modal_assess.style.display = "block";
        }
    }
    else {
        if (boxdate == "today") {
            document.getElementById("hiddenid").value = 1;
        }
        else {
            document.getElementById("hiddenid").value = 0;
        }

        document.getElementById("yesbtnid").value = boxvalue;
        modal.style.display = "block";
    }

}

function nobutton() {
    modal.style.display = "none";
    modal_assess.style.display = "none";
}

cross.onclick = function () {
    modal.style.display = "none";
}

cross2.onclick = function () {
    modal_assess.style.display = "none";
}
cross3.onclick = function () {
    modal_OTP.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

    if (event.target == modal_assess) {
        modal_assess.style.display = "none";
    }

    if (event.target == modal_OTP) {
        modal_OTP.style.display = "none";
    }
}

function goassess()
{
var f =document.createElement("form");
f.method ="POST";
f.action ="../process/assessmentpre.php";

var element1 = document.createElement("input");
element1.type = 'hidden';
element1.name = "successname";
element1.value = schedulearray[boxvalue];
f.appendChild(element1);
document.body.appendChild(f);
f.submit();
}

$("#otpform").submit(function (event) {
    event.preventDefault();
    var form = $(this);
    var url = "../process/otpform.php";
    var formData = {
        'otpname': $('input[name=otpname]').val(),
        'otpboxname': $('input[name=otpboxname').val(),

    };

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function (data) {
            if (data == "true") {
             
                goassess();
            }
            else {
                alert("WRONG ONE TIME PASSWORD");
            }

        }
    });
});

