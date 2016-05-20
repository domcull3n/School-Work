/**
 * Created by inet2005 on 11/9/15.
 */
$(document).ready(function(){
    $('#q').keyup(function () {
        var t = this;
        $("#TxtHint").load("empLookup.php?q=" + t.value);
    });
});