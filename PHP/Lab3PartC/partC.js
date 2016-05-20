/**
 * Created by inet2005 on 10/4/15.
 */

function modifiedText(textBox, label)
{
    var formItem = document.getElementById(textBox);
    var formItemLbl = document.getElementById(label);

    formItem.style.backgroundColor = "yellow";
    if(formItem != null){
        formItem.style.fontStyle='italic';
    }
    formItemLbl.style.textDecoration = "underline";
}

function normalText(textBox, label)
{
    var formItem = document.getElementById(textBox);
    var formItemLbl = document.getElementById(label);
    formItem.style.backgroundColor = "";
    if(formItem != null){
        formItem.style.fontStyle='';
    }
    formItemLbl.style.textDecoration = "";
}

function validateForm(checkBox, TCWarning) {

    var formCheckBox = document.getElementById(checkBox);
    var formSpan = document.getElementById(TCWarning);

    if(!formCheckBox.checked){
        formSpan.style.color = "red";
        formSpan.innerHTML = "Must Accept Terms and Conditions"
    }

    if (document.forms["vForm"].fName.value.length == 0) {
        document.forms["vForm"].fName.style.borderColor = "red";
        return false;

    }
    else{
        document.forms["vForm"].fName.style.borderColor = "white";
    }

    if (document.forms["vForm"].lName.value.length == 0) {
        document.forms["vForm"].lName.style.borderColor = "red";
        return false;

    }
    else{
        document.forms["vForm"].lName.style.borderColor = "white";
    }

    if (document.forms["vForm"].address1.value.length == 0) {
        document.forms["vForm"].address1.style.borderColor = "red";
        return false;

    }
    else{
        document.forms["vForm"].address1.style.borderColor = "white";
    }

    if (document.forms["vForm"].address2.value.length == 0) {
        document.forms["vForm"].address2.style.borderColor = "red";
        return false;

    }
    else{
        document.forms["vForm"].address2.style.borderColor = "white";
    }

    if (document.forms["vForm"].email.value.length == 0) {
        document.forms["vForm"].email.style.borderColor = "red";
        return false;

    }
    else{
        document.forms["vForm"].email.style.borderColor = "white";
    }




}
