/**
 * Created by Guillaume on 11/01/2015.
 */

function validate()
{
    var username = document.getElementById('inputUsername').value;;
    var password = document.getElementById('inputPassword').value;;

    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"admin.php?action=login", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            if (OAjax.responseText == "true")
            {
                window.location.reload();
            }
            else{
                document.getElementById("errorCo").style.display = '';
            }
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('username=' + username + "&password=" +password );

}

window.onload = function(){
    document.getElementById("submitBtn").onclick = function(){
        validate();
    }
}
