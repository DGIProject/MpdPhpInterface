/**
 * Created by Guillaume on 16/01/2015.
 */

var lang = [];
var types = [];

function getLangArray(){
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"admin.php?action=getLang", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            lang = JSON.parse(OAjax.responseText);
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('');
}
function valueByType(tag, value){
    console.log(tag, value, types.data[tag]);
    switch (types.data[tag])
    {
        case types.TYPE.BOOL :
            return(value == 1)? lang['true'] : lang['false'];
            break;
        case types.TYPE.TIME :
            return getTime(value);
            break;
        case types.TYPE.TIMESTAMP :
            return new Date(parseInt(value)*1000).toLocaleString();
            break;
        case types.TYPE.INT :
            return (value == -1)? lang['unknown'] : value;
            break;
        default :
            return value;
    }
}
function getTypes(){
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"admin.php?action=getTypes", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            types = JSON.parse(OAjax.responseText);
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('');
}
function getServerInfos(id, cmd){
    var id = id || 0;

    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"admin.php?action=getServerInfo", true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status == 200)
        {
            console.log(OAjax.responseText);
            jsonRep = JSON.parse(OAjax.responseText);
            if (jsonRep.code == 0)
            {
                console.log(jsonRep.data.length);
                content = document.getElementById('contentInfoServer').innerHTML;
                content += '<br>';
                for(var data in jsonRep.data)
                {
                   content += '<br/><b>'+lang[data]+' </b>: '+valueByType(data, jsonRep.data[data]);
                }
                document.getElementById('contentInfoServer').innerHTML = content;


            }
            else
            {

            }
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('id='+id+'&cmd='+cmd);
}
function getTime(time){
    x =time;
    x /= 60;
    minutes = x % 60;
    x /= 60;
    hours = x % 24;
    x /= 24;
    days = x;

    timeStr = "";
    timeStr += (parseInt(days) != 0)? " " + parseInt(days) + " "+ lang['days'] :"";
    timeStr += (parseInt(hours) != 0)? " " + parseInt(hours) + " "+ lang['hours'] :"";
    timeStr += (parseInt(minutes) != 0)? " " + parseInt(minutes) + " "+ lang['minutes'] : "";
    timeStr += (parseInt((minutes-parseInt(minutes))*60) != 0)? " " + parseInt((minutes-parseInt(minutes))*60) + " "+ lang['seconds'] :"";


    console.log(minutes, hours, days, timeStr);
    return timeStr;
}
function getStatus(id ){

    var lis = document.getElementById("serverList").getElementsByTagName("li");
    console.log(lis);
    for (i=0; i<lis.length;i++) {
        lis[i].classList.remove("active");
    }

    document.getElementById('li_'+id).classList.add("active");
    document.getElementById('contentInfoServer').innerHTML = "";
    document.getElementById('StatusNameServer').innerHTML = document.getElementById('server_'+id).innerHTML;
    getServerInfos(id, 'status');
    getServerInfos(id, 'stats');
}
var sendCommand =function(comamnd)
{
    console.log("command Was", comamnd.target.dataset.command, comamnd.target.value);
    //TODO: Send controls commands
};

window.onload = function(){
    getLangArray();
    getTypes();
    getStatus(0);

    $(".mpd-controls-click").each(function(index, value) {
        console.log(index, $(this));
        $(this).click(sendCommand) ;

    });

    $(".mpd-controls-change").each(function(index, value) {
        console.log(index, $(this));
        $(this).change(sendCommand) ;

    });
}