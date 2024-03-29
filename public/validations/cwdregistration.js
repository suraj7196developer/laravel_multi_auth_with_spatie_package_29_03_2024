/*Aadhaar No Validation*/
function checkUID(e) {
    var uid = $('#aadhaar_no').val();
    var Verhoeff = {
        "d": [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
            [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
            [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
            [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
            [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
            [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
            [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
            [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
            [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
        ],
        "p": [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
            [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
            [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
            [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
            [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
            [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
            [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
        ],
        "j": [0, 4, 3, 2, 1, 5, 6, 7, 8, 9],
        "check": function(str) {
            var c = 0;
            str.replace(/\D+/g, "").split("").reverse().join("").replace(/[\d]/g, function(u, i) {
                c = Verhoeff.d[c][Verhoeff.p[i % 8][parseInt(u, 10)]];
            });
            return c;

        },
        "get": function(str) {

            var c = 0;
            str.replace(/\D+/g, "").split("").reverse().join("").replace(/[\d]/g, function(u, i) {
                c = Verhoeff.d[c][Verhoeff.p[(i + 1) % 8][parseInt(u, 10)]];
            });
            return Verhoeff.j[c];
        }
    };

    String.prototype.verhoeffCheck = (function() {
        var d = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
            [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
            [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
            [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
            [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
            [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
            [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
            [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
            [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
        ];
        var p = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
            [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
            [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
            [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
            [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
            [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
            [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
        ];

        return function() {
            var c = 0;
            this.replace(/\D+/g, "").split("").reverse().join("").replace(/[\d]/g, function(u, i) {
                c = d[c][p[i % 8][parseInt(u, 10)]];
            });
            return (c === 0);
        };
    })();

    if (Verhoeff['check'](uid) === 0) {
        return true;
        /*alert('Match Found..!');*/
    } else if (Verhoeff['check'](uid) != 12){
        /*return false;*/
        alert('Aadhaar no is not valid..!');
        $("#aadhaar_no").val('');
    } else {
        /*return false;*/
        alert('Aadhaar no is not valid..!');
        $("#aadhaar_no").val('');
    }
}

// SET CURRENT DATE IN REGISTRATION DATE
var date = new Date();
var currentDate = date.toISOString().slice(0, 10);
document.getElementById('registration_date').value = currentDate;

/*Check Unique Aadhaar*/
$(document).ready(function() {
    $("#siep_reg_no").blur(function() {
        $.get("{{URL::to('/cwd/registration/checkUniqueSiepId')}}", {
            thesiepid: $(this).val()
        }, function(data) {
            if (data == 0) {
                $('#check_siep_regd_no').html('<span style="color:#03713E">OK </span>');
            } else {
                $('#check_siep_regd_no').html('<span style="color:#FF0000">SIEP Regd No is Already Registered.</span>');
                $("#siep_reg_no").val('');
            }
        });
    });
});

/*Check Unique Aadhaar*/
$(document).ready(function() {
    $("#aadhaar_no").blur(function() {
        $.get("{{URL::to('/cwd/registration/checkUniqueAadhaar')}}", {
            theaadhaarno: $(this).val()
        }, function(data) {
            if (data == 0) {
                $('#check_aadhaar_no').html('<span style="color:#03713E">OK </span>');
            } else {
                $('#check_aadhaar_no').html('<span style="color:#FF0000">Aadhaar No is Already Registered.</span>');
                $("#aadhaar_no").val('');
            }
        });
    });
});
/*Check Unique Udid No*/
$(document).ready(function() {
    $("#udid_no").blur(function() {
        $.get("{{URL::to('/cwd/registration/checkUniqueUdid')}}", {
            theudidno: $(this).val()
        }, function(data) {
            if (data == 0) {
                $('#check_udid_no').html('<span style="color:#03713E">OK </span>');
            } else {
                $('#check_udid_no').html('<span style="color:#FF0000">UDID No is Already Registered.</span>');
                $("#udid_no").val('');
            }
        });
    });
});

// SELECTING ALL TEXT ELEMENTS FOR FORM VALIDATION
var patientname = document.forms['vform']['patient_name'];
var parentname = document.forms['vform']['parent_name'];
var mobileno = document.forms['vform']['mobile_no'];
var date_of_birth = document.forms['vform']['date_of_birth'];
var gender = document.forms['vform']['gender'];
var caste = document.forms['vform']['caste'];
var aadhaar_no = document.forms['vform']['aadhaar_no'];
var siep_reg_no = document.forms['vform']['siep_reg_no'];
var state_id = document.forms['vform']['state_id'];
var district_id = document.forms['vform']['district_id'];
var pin_no = document.forms['vform']['pin_no'];
var registration_date = document.forms['vform']['registration_date'];
// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var parent_name_error = document.getElementById('parent_name_error');
var mobile_no_error = document.getElementById('mobile_no_error');
var dob_error = document.getElementById('dob_error');
var gender_error = document.getElementById('gender_error');
var caste_error = document.getElementById('caste_error');
var aadhaar_no_error = document.getElementById('aadhaar_no_error');
var siep_reg_no_error = document.getElementById('siep_reg_no_error');
var state_error = document.getElementById('state_error');
var district_error = document.getElementById('district_error');
var pin_no_error = document.getElementById('pin_no_error');
var registration_date_error = document.getElementById('registration_date_error');
// SETTING ALL EVENT LISTENERS
patientname.addEventListener('blur', nameVerify, true);
parentname.addEventListener('blur', parentVerify, true);
mobileno.addEventListener('blur', mobilenoVerify, true);
date_of_birth.addEventListener('blur', dobVerify, true);
gender.addEventListener('blur', genderVerify, true);
caste.addEventListener('blur', casteVerify, true);
aadhaar_no.addEventListener('blur', aadhaarnoVerify, true);
siep_reg_no.addEventListener('blur', siepnoVerify, true);
state_id.addEventListener('blur', stateVerify, true);
district_id.addEventListener('blur', districtVerify, true);
pin_no.addEventListener('blur', pinnoVerify, true);
registration_date.addEventListener('blur', regddateVerify, true);

function IsEmpty() {
    if (document.forms['vform'].siep_reg_no.value === "") {
        alert("Please, provide SIEP Registration no.");
        return false;
    }
    return true;
}
// validation function
function Validate() {
    // validate patientname
    if (patientname.value == "") {
        patientname.style.border = "1px solid red";
        document.getElementById('cwdname_div').style.color = "red";
        name_error.textContent = "CWD name is required";
        patientname.focus();
        return false;
    }
    // validate patientname
    if (patientname.value.length < 3) {
        patientname.style.border = "1px solid red";
        document.getElementById('cwdname_div').style.color = "red";
        name_error.textContent = "patientname must be at least 3 characters";
        patientname.focus();
        return false;
    }
    // validate parentname
    if (parentname.value == "") {
        parentname.style.border = "1px solid red";
        document.getElementById('parent_name_div').style.color = "red";
        parent_name_error.textContent = "Parent name is required";
        parentname.focus();
        return false;
    }
    // validate mobile no
    if (mobileno.value == "") {
        mobileno.style.border = "1px solid red";
        document.getElementById('mobile_no_div').style.color = "red";
        mobile_no_error.textContent = "Mobile no is required";
        mobileno.focus();
        return false;
    }
    // validate DOB
    if (date_of_birth.value == "") {
        date_of_birth.style.border = "1px solid red";
        document.getElementById('dob_div').style.color = "red";
        dob_error.textContent = "Date of Birth is required";
        date_of_birth.focus();
        return false;
    }
    // validate Gender
    if (gender.value == "") {
        gender.style.border = "1px solid red";
        document.getElementById('gender_div').style.color = "red";
        gender_error.textContent = "Gender is required";
        gender.focus();
        return false;
    }
    // validate Caste
    if (caste.value == "") {
        caste.style.border = "1px solid red";
        document.getElementById('caste_div').style.color = "red";
        caste_error.textContent = "Caste is required";
        caste.focus();
        return false;
    }
    // validate SIEP Regd No
    if (siep_reg_no.value == "") {
        siep_reg_no.style.border = "1px solid red";
        document.getElementById('siep_reg_no_div').style.color = "red";
        siep_reg_no_error.textContent = "SIEP No is required";
        siep_reg_no.focus();
        return false;
    }
    // validate Aadhaar No
    if (aadhaar_no.value == "") {
        aadhaar_no.style.border = "1px solid red";
        document.getElementById('aadhaar_no_div').style.color = "red";
        aadhaar_no_error.textContent = "Aadhaar No is required";
        aadhaar_no.focus();
        return false;
    }
    // validate State
    if (state_id.value == "") {
        state_id.style.border = "1px solid red";
        document.getElementById('state_div').style.color = "red";
        state_error.textContent = "State is required";
        state_id.focus();
        return false;
    }
    // validate District
    if (district_id.value == "") {
        district_id.style.border = "1px solid red";
        document.getElementById('district_div').style.color = "red";
        district_error.textContent = "District is required";
        district_id.focus();
        return false;
    }
    // validate Pin No
    if (pin_no.value == "") {
        pin_no.style.border = "1px solid red";
        document.getElementById('pin_no_div').style.color = "red";
        pin_no_error.textContent = "Pin No is required";
        pin_no.focus();
        return false;
    }

    // validate Registration Date
    if (registration_date.value == "") {
        registration_date.style.border = "1px solid red";
        document.getElementById('registration_date_div').style.color = "red";
        registration_date_error.textContent = "Registration Date is required";
        registration_date.focus();
        return false;
    }
}
// event handler functions
function nameVerify() {
    if (patientname.value != "") {
        patientname.style.border = "1px solid #5e6e66";
        document.getElementById('cwdname_div').style.color = "#5e6e66";
        name_error.innerHTML = "";
        return true;
    }
}

function parentVerify() {
    if (parentname.value != "") {
        parentname.style.border = "1px solid #5e6e66";
        document.getElementById('parent_name_div').style.color = "#5e6e66";
        parent_name_error.innerHTML = "";
        return true;
    }
}

function mobilenoVerify() {
    if (mobileno.value != "") {
        mobileno.style.border = "1px solid #5e6e66";
        document.getElementById('mobile_no_div').style.color = "#5e6e66";
        mobile_no_error.innerHTML = "";
        return true;
    }
}

function dobVerify() {
    if (date_of_birth.value != "") {
        date_of_birth.style.border = "1px solid #5e6e66";
        document.getElementById('dob_div').style.color = "#5e6e66";
        dob_error.innerHTML = "";
        return true;
    }
}

function genderVerify() {
    if (gender.value != "") {
        gender.style.border = "1px solid #5e6e66";
        document.getElementById('gender_div').style.color = "#5e6e66";
        gender_error.innerHTML = "";
        return true;
    }
}

function casteVerify() {
    if (caste.value != "") {
        caste.style.border = "1px solid #5e6e66";
        document.getElementById('caste_div').style.color = "#5e6e66";
        caste_error.innerHTML = "";
        return true;
    }
}

function siepnoVerify() {
    if (siep_reg_no.value != "") {
        siep_reg_no.style.border = "1px solid #5e6e66";
        document.getElementById('siep_reg_no_div').style.color = "#5e6e66";
        siep_reg_no_error.innerHTML = "";
        return true;
    }
}

function aadhaarnoVerify() {
    if (aadhaar_no.value != "") {
        aadhaar_no.style.border = "1px solid #5e6e66";
        document.getElementById('aadhaar_no_div').style.color = "#5e6e66";
        aadhaar_no_error.innerHTML = "";
        return true;
    }
}

function stateVerify() {
    if (state_id.value != "") {
        state_id.style.border = "1px solid #5e6e66";
        document.getElementById('state_div').style.color = "#5e6e66";
        state_error.innerHTML = "";
        return true;
    }
}

function districtVerify() {
    if (district_id.value != "") {
        district_id.style.border = "1px solid #5e6e66";
        document.getElementById('district_div').style.color = "#5e6e66";
        district_error.innerHTML = "";
        return true;
    }
}

function pinnoVerify() {
    if (pin_no.value != "") {
        pin_no.style.border = "1px solid #5e6e66";
        document.getElementById('pin_no_div').style.color = "#5e6e66";
        pin_no_error.innerHTML = "";
        return true;
    }
}

function regddateVerify() {
    if (registration_date.value != "") {
        registration_date.style.border = "1px solid #5e6e66";
        document.getElementById('registration_date_div').style.color = "#5e6e66";
        registration_date_error.innerHTML = "";
        return true;
    }
}

//Get age according to DOB
function getAge(date_of_birth) {
    return ~~((new Date() - new Date(date_of_birth)) / 31556952000);
}
$("date_of_birth").val();
$("input.mydob").change(function() {
    $(".age").val(getAge($(this).val()));
});

//Get Block & Muncipality ACcordingly
$('#block_id, #grampanchyat_id, #village_id, #muncipality_id, #ward_no, #house_no').attr('disabled', true);
$('select[name="address_type_id"]').on('change', function() {
    var address_type_id = $(this).val();
    $('#block_id, #grampanchyat_id, #village_id, #muncipality_id, #ward_no, #house_no').attr('disabled', true);

    if (address_type_id == "2") {
        $('#block_id, #grampanchyat_id, #village_id').attr('disabled', false);
        $('#muncipality_id, #ward_no, #house_no').attr('disabled', true);
    } else if (address_type_id == "3") {
        $('#muncipality_id, #ward_no, #house_no').attr('disabled', false);
        $('#block_id, #grampanchyat_id, #village_id').attr('disabled', true);
    } else {
        $('#block_id, #grampanchyat_id, #village_id, #muncipality_id, #ward_no, #house_no').attr('disabled', true);
    }
});