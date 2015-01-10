/**
 * Created by Guillaume on 09/01/2015.
 */

function validate(save)
{
    var save = save || true;

    var hostName = document.getElementById('inputHostName').value;
    var port = document.getElementById('inputPort').value;
    var password = document.getElementById('inputPassword').value;
    var name = document.getElementById('inputName').value;


    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"index.php?type=install&step=2&action=addServer", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            if (OAjax.responseText == "true")
            {
                window.location.href = '?type=install&step=3';
            }
            else
            {
                document.getElementById("errorCo").style.display = '';
            }
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('name='+name+'&hostName=' + hostName + "&password=" +password +"&port="+port);

}

window.onload = function(){
    document.getElementById("submitBtn").onclick = function(){
        validate();
    }

}