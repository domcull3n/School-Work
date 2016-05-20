/**
 * Created by inet2005 on 10/13/15.
 */
function validateForm(bDateWarning, fNameWarning, lNameWarning, selectWarning, hDateWarning)
{
    var bDateWarning = document.getElementById(bDateWarning);
    var fNameWarning = document.getElementById(fNameWarning);
    var lNameWarning = document.getElementById(lNameWarning);
    var selectWarning = document.getElementById(selectWarning);
    var hDateWarning = document.getElementById(hDateWarning);

    if(document.forms["EmpForm"].bDate.value == "")
    {
        bDateWarning.style.color = "red";
        bDateWarning.innerHTML = "Please enter a Birth date";
        return false;
    }else{
        bDateWarning.innerHTML = "";
    }

    var myRegExp = (/^[A-Z][a-z]+/);

    if(myRegExp.test(document.forms["EmpForm"].fName.value) == true)
    {
        fNameWarning.innerHTML = "";
    }else{
        fNameWarning.style.color = "red";
        fNameWarning.innerHTML = "Must start with a capital and have at least 2 letters";
        return false;
    }

    if(myRegExp.test(document.forms["EmpForm"].lName.value) == true)
    {
        lNameWarning.innerHTML = "";
    }else{
        lNameWarning.style.color = "red";
        lNameWarning.innerHTML = "Must start with a capital and have at least 2 letters";
        return false;
    }

    if(document.forms["EmpForm"].gender.value == 1){
        selectWarning.style.color = "red";
        selectWarning.innerHTML = "Must Select M or F";
        return false;
    }

    if(document.forms["EmpForm"].hireDate.value == ""){
        hDateWarning.style.color = "red";
        hDateWarning.innerHTML = "Please enter a Birth date";
        return false;
    }else{
        hDateWarning.innerHTML = "";
    }



}