


function showDiv(div)
{
   document.getElementById(div).style.display='inline';
}

function showDivMulti(name)
{
   var ogg = document.getElementsByName(name);
   for(var i=0;i<ogg.length;i++)
   {
    ogg[i].style.display='inline';
   }
}

function hideDiv(div)
{
   document.getElementById(div).style.display='none';
}

function hideDivMulti(name)
{
   var ogg = document.getElementsByName(name);
   for(var i=0;i<ogg.length;i++)
   {
    ogg[i].style.display='none';
   }
}


//Function get field for Modify
function getTextField(OP,id)
{
    

    var name = document.getElementById('name£'+id).value;
    var surname = document.getElementById('surname£'+id).value;
    var username = document.getElementById('username£'+id).value;
    var mail = document.getElementById('mail£'+id).value;
    var password = document.getElementById('psw£'+id).value;
    var type = document.getElementById('type£'+id).value;
    var status = document.getElementById('status£'+id).value;


    if(name === '')
        return alert('Fill in all fields !');
    
    if(surname === '')
        return alert('Fill in all fields !');


    var pars = id+"|"+name +"|"+ surname +"|"+ username +"|"+ mail +"|"+ password +"|" + type + "|"+ status;

    //conversion char
    pars = pars.replace("&", " e ");
    pars = pars.replace("+", "/");

    saveRec(OP,pars);
              

}

//Function get field for Insert
function getTextFieldA(OP)
{
    

    var name = document.getElementById('i_name').value;
    var surname = document.getElementById('i_surname').value;
    var username = document.getElementById('i_username').value;
    var mail = document.getElementById('i_mail').value;
    var password = document.getElementById('i_psw').value;
    var passwordr = document.getElementById('i_pswr').value;
    var type = document.getElementById('i_type').value;
    var status = document.getElementById('i_status').value;


    if(name === '')
        return alert('Fill in all fields !');
    
    if(surname === '')
        return alert('Fill in all fields !');

    if(password == passwordr)
    {
        if(password.length < 6)
        {
            return alert('The password must contain at least 6 characters !');
        }
    }
    else
    {
        return alert('The two passwords do not match !');
    }

    var pars = name +"|"+ surname +"|"+ username +"|"+ mail +"|"+ password +"|" + type + "|"+ status;

    //conversion char
    pars = pars.replace("&", " e ");
    pars = pars.replace("+", "/");

    insertRec(OP,pars);
              

}

//Function get field for Search
function getTextFieldB(OP,dt)
{
    

    var name = document.getElementById('s_name').value;
    var surname = document.getElementById('s_surname').value;
    var username = document.getElementById('s_username').value;
    var mail = document.getElementById('s_mail').value;
    var type = document.getElementById('s_type').value;
    var status = document.getElementById('s_status').value;


    
    var pars = '';

    if(name !== '')
    {
        pars += "AND name like "+"'%"+name+"%' ";
    }

    if(surname !== '')
    {
        pars += "AND surname like "+"'%"+surname+"%' ";
    }

    if(username !== '')
    {
        pars += "AND username like "+"'%"+username+"%' ";
    }

    if(mail !== '')
    {
        pars += "AND mail like "+ "'%"+mail+"%' ";
    }

    if(type !== '')
    {
        pars += "AND type like "+ "'%"+type+"%' ";
    }

    if(status !== '')
    {
        pars += "AND status like "+ "'%"+status+"%' ";
    }

    pars = pars.substr(3);

    //conversion char
    pars = pars.replace("&", " e ");
    pars = pars.replace("+", "/");

    setGlobalSession(OP,pars);
              

}


function saveRec(op,pars)
{  
    
    if (window.XMLHttpRequest)
        ajax = new XMLHttpRequest(); //new browsers
    else
        ajax = new ActiveXObject("Microsoft.XMLHTTP"); //old browsers

    ajax.onreadystatechange = function()
    { //alert(ajax.readyState);
        if (ajax.readyState==4 && ajax.status==200)
        {    
            alert(ajax.responseText);
            location.reload();
        }
    }
     
    ajax.open("POST","../ajax/usersMNG_ajax.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send('OP='+op+'&param='+pars+'&action=SAVE');
}


function insertRec(op,pars)
{  
    
    if (window.XMLHttpRequest)
        ajax = new XMLHttpRequest(); //new browsers
    else
        ajax = new ActiveXObject("Microsoft.XMLHTTP"); //old browsers

    ajax.onreadystatechange = function()
    { //alert(ajax.readyState);
        if (ajax.readyState==4 && ajax.status==200)
        {    
            alert(ajax.responseText);
            location.reload();
            
        }
    }
     
    ajax.open("POST","../ajax/usersMNG_ajax.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send('OP='+op+'&param='+pars+'&action=INSERTREC');
}

function setGlobalSession(OP,pars)
{  
    
    if (window.XMLHttpRequest)
        ajax = new XMLHttpRequest(); //new browsers
    else
        ajax = new ActiveXObject("Microsoft.XMLHTTP"); //old browsers

    ajax.onreadystatechange = function()
    { //alert(ajax.readyState);
        if (ajax.readyState==4 && ajax.status==200)
        {    
            if(ajax.responseText === 'RTNULL')
            {
                alert('No data in the selection !');
            }
            else
            {
                location.reload();
            }
            
        }
    }
     
    ajax.open("POST","../ajax/usersMNG_ajax.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send('OP='+OP+'&param='+pars+'&action=GSESSION');
}

function refreshSessionFilter(OP)
{
    if (window.XMLHttpRequest)
        ajax = new XMLHttpRequest(); //new browsers
    else
        ajax = new ActiveXObject("Microsoft.XMLHTTP"); //old browsers

    ajax.onreadystatechange = function()
    { //alert(ajax.readyState);
        if (ajax.readyState==4 && ajax.status==200)
        {    
            location.reload();
        }
    }
     
    ajax.open("POST","../ajax/usersMNG_ajax.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send('OP='+OP+'&action=REFSESSION');
}

function deleteRecord(op,id)
{
    if(confirm("Are you sure you want to delete the selected record?") === true)
    {
        deleteRec(op,id);
    }
}

function deleteRec(op,pars)
{  
    
    if (window.XMLHttpRequest)
        ajax = new XMLHttpRequest(); //new browsers
    else
        ajax = new ActiveXObject("Microsoft.XMLHTTP"); //old browsers

    ajax.onreadystatechange = function()
    { //alert(ajax.readyState);
        if (ajax.readyState==4 && ajax.status==200)
        {    
            alert(ajax.responseText);
            location.reload();
            
        }
    }
     
    ajax.open("POST","../ajax/usersMNG_ajax.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send('OP='+op+'&param='+pars+'&action=DELETEREC');
}