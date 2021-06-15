function reloadPage(page)
{ 
    if(page === this)
    { 
        location.reload();
    }
    else
    { 
        location.href = page
    }
}

function showDiv(div)
{
    document.getElementById(div).style.display = "inline";
}
         
function hideDiv(div)
{
    document.getElementById(div).style.display = 'none';
}

function execAjax(target,msg,op,pars,ondone,parsB,parFunRet)
{  
    if (window.XMLHttpRequest)
        ajax = new XMLHttpRequest(); //new browsers
    else
        ajax = new ActiveXObject("Microsoft.XMLHTTP"); //old browsers

    ajax.onreadystatechange = function()
    { //alert(ajax.readyState);
        if (ajax.readyState==4 && ajax.status==200)
        {    
            if(target != '')
            {   
                document.getElementById(target).innerHTML = ajax.responseText;
            }
            if(msg)
            {
                alert(ajax.responseText);
            }

            if(ondone != '')
            { 
                var fn = window[ondone];
                if(parFunRet === true)
                  fn(ajax.responseText);
                else
                {
                    fn(parsB);
                }
                  
            }
           
        }
    }
     
    ajax.open("POST","../ajax/home_ajax.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send('OP='+op+'&param='+pars);
}

function setOpacity(div,val)
{
    document.getElementById(div).style.opacity = val;
}

function loadDIV(script,div)
{ 
    //Controllo lo stato del webserver
    execAjax('pages',false,'stateSite','',false,'',false);
    var ifrm = document.getElementById(div);
    ifrm.src = script;

}