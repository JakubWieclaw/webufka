function isEmpty(s) {
    if (s.length === 0) {
        return true;
    }
    return false;
}

function validate(form) {
    if (!checkString(form.elements["f_imie"].value, "Podaj imię!")) {
        return false;
    }
    if (!checkString(form.elements["f_nazwisko"].value, "Podaj nazwisko!")) {
        return false;
    }
    if (!checkString(form.elements["f_kod"].value, "Podaj kod pocztowy!")) {
        return false;
    }
    if (!checkString(form.elements["f_ulica"].value, "Podaj ulicę!")) {
        return false;
    }
    if (!checkString(form.elements["f_miasto"].value, "Podaj miasto!")) {
        return false;
    }
    return true;
    // if (isEmpty(form.elements["f_imie"].value) || isWhiteSpaceOrEmpty(form.elements["f_imie"].value)) {
    //     alert("Podaj imię!");
    //     return false;
    // }

    // return true;
}

function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str);
}

function checkString(string, alertText) {
    if (isWhiteSpaceOrEmpty(string)) {
        alert(alertText);
        return false;
    }
    return true;
}