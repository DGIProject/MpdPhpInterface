/**
 * Created by Guillaume on 09/01/2015.
 */

function validate()
{
    var select = document.getElementById('langSelect');
    var lang = select.options[select.selectedIndex].value;
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"index.php?type=install&action=updateLang", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            if (OAjax.responseText == "true")
            {
                window.location.href = '?type=install&step=1'
            }
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('lang=' + lang );

}

window.onload = function(){
    document.getElementById("submitBtn").onclick = function(){
        validate();
    }
}
