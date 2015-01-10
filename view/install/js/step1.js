/**
 * Created by Guillaume on 09/01/2015.
 */

function validate()
{
    var username = document.getElementById('inputUsername').value;;
    var password = document.getElementById('inputPassword').value;;

    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"index.php?type=install&step=1&action=addAdmin", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            if (OAjax.responseText == "true")
            {
                window.location.href = '?type=install&step=2'
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
