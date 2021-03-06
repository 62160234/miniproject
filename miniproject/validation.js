function formValidation() {
    var usrname = document.registform.username;
    var pwd = document.registform.passwd;
    var conpwd = document.registform.conpasswd;
    var name = document.registform.name;
    var penname = document.registform.penname;
    var email = document.registform.email;

    checked = false;
    if (validateUserName(usrname, 5, 45)) {
        if (validatePassword(pwd, conpwd, 5, 45)) {
            if (validateName(name)) {
                if (validatePenName(penname)) {
                    if (validateEmail(email)) {
                        return !checked;
                    }
                }
            }
        }
    }
    return checked;
}

function newArtiValidation() {
    var titleA = document.newarti.title;

    checked = false;
    if (validateTitle(titleA)) {
        return !checked;
    }
    return checked;
}

function validateTitle(titleA, min, max) {
    var error = "";
    var illegalChars = /\W/;

    if (titleA.value == "") {
        titleA.style.background = 'Yellow';
        error = "*กรุณากรอกหัวข้อบทความ \n";
        alert(error);
        titleA.focus();
        return false;
    } else {
        titleA.style.background = 'White';
    }
    return true;
}

function validateUserName(usrname, min, max) {
    var error = "";
    var illegalChars = /\W/;

    if (usrname.value == "") {
        usrname.style.background = 'Yellow';
        error = "*กรุณากรอก Username \n";
        alert(error);
        usrname.focus();
        return false;
    } else if ((usrname.value.length < min) || (usrname.value.length > max)) {
        usrname.style.background = 'Yellow';
        error = "*Username ต้องมีความยาว " + min + "-" + max + " ตัวอักษร\n";
        alert(error);
        usrname.focus();
        return false;
    } else if (illegalChars.test(usrname.value)) {
        usrname.style.background = 'Yellow';
        error = "*Username มีตัวอักษรที่ไม่ได้รับอนุญาติ\n";
        alert(error);
        usrname.focus();
        return false;
    } else {
        usrname.style.background = 'White';
    }
    return true;
}

function validatePassword(pwd, uconfirmpwd, min, max) {
    var error = "";
    var illegalChars = /[\W_]/;

    if (pwd.value == "") {
        pwd.style.background = 'Yellow';
        error = "*กรุณากรอกรหัสผ่าน\n";
        alert(error);
        pwd.focus();
        return false;
    } else if ((pwd.value.length < min) || (pwd.value.length > max)) {
        error = "*รหัสผ่านต้องมีความยาว " + min + "-" + max + " ตัวอักษร\n";
        pwd.style.background = 'Yellow';
        alert(error);
        pwd.focus();
        return false;
    } else if (illegalChars.test(pwd.value)) {
        error = "*รหัสผ่านมีตัวอักษรที่ไม่ได้รับอนุญาต\n";
        pwd.style.background = 'Yellow';
        alert(error);
        pwd.focus();
        return false;
    } else if ((pwd.value.search(/[a-zA-Z]+/) == -1) || (pwd.value.search(/[0-9]+/) == -1)) {
        error = "*รหัสผ่านต้องมีทั้งตัวเลขและตัวอักษร\n";
        pwd.style.background = "Yellow";
        alert(error);
        pwd.focus();
        return false;
    } else if (pwd.value != uconfirmpwd.value) {
        error = "*กรุณากรอกรหัสผ่านให้ตรงกัน\n";
        pwd.style.background = "Yellow";
        uconfirmpwd.style.background = "Yellow";
        alert(error);
        pwd.focus();
        return false;
    } else {
        pwd.style.background = "White";
        uconfirmpwd.style.background = "White";
    }
    return true;
}

function validateName(name) {
    var letters = /^[A-Za-z ก-๙]+$/;
    if (name.value == "") {
        name.style.background = 'Yellow';
        error = "*กรุณากรอก ชื่อผู้เขียน\n";
        alert(error);
        name.focus();
        return false;
    } else if (name.value.match(letters)) {
        return true;
    } else {
        alert('ชื่อผู้เขียน ต้องเป็นตัวอักษรเท่านั้น');
        name.focus();
        return false;
    }
}

function validatePenName(penname) {
    var letters = /^[0-9a-zA-Zก-๙]+$/;
    if (penname.value == "") {
        penname.style.background = 'Yellow';
        error = "*กรุณากรอก นามปากกา\n";
        alert(error);
        penname.focus();
        return false;
    } else if (penname.value.match(letters)) {
        return true;
    } else {
        alert('*นามปากกา ต้องประกอบไปด้วยตัวเลขหรือตัวอักษรเท่านั้น');
        penname.focus();
        return false;
    }
}

function validateEmail(email) {
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email.value == "") {
        email.style.background = 'Yellow';
        error = "*กรุณากรอก อีเมล\n";
        alert(error);
        email.focus();
        return false;
    } else if (!filter.test(email.value)) {
        alert('*รูปแบบอีเมลของคุณไม่ถูกต้อง');
        email.focus();
        return false;
    } else {
        return true;
    }
}