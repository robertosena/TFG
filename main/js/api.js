function ApiScrims() {
    fetch("./api.php").then(res => res.json()).then((out) => {
    tasklong = Object.keys(out['data']).length;
    console.log(out);
    var scrimbox = document.getElementById('scrimbox');
    var titlebox = document.getElementsByClassName('titlebox');
    var elobox = document.getElementsByClassName('elobox');
    var serverbox = document.getElementsByClassName('serverbox'); //<a href="./joinscrim.php?idscrim='.$row['idscrim'].'"><button type="button" class="btn btn-success">Join scrim</button></a>
    var datebox = document.getElementsByClassName('datebox');
    var opggbox = document.getElementsByClassName('opggbox');
    scrimbox.innerHTML="";
    for(var i=0; i<tasklong; i++) { 
        var idscri = out['data'][i]['idscrim'];
    scrimbox.innerHTML+="<div><p class='titlebox'></p><p class='elobox'></p><p class='serverbox'></p><p class='datebox'></p><p class='opggbox'></p><a href='./joinscrim.php?idscrim="+idscri+"'><button type='submit' class='btn btn-success'>Join scrim</button></div></a>";
    }
    for(var i=0; i<tasklong; i++) { 
    titlebox[i].innerHTML=out['data'][i]['teamname'];
    elobox[i].innerHTML=out['data'][i]['elo'];
    serverbox[i].innerHTML="📍"+out['data'][i]['server'];
    opggbox[i].innerHTML="<a href="+out['data'][i]['multiopgg']+">"+"op.gg"+"</a>";
    datebox[i].innerHTML="📅"+out['data'][i]['scrimdate'];
        }
    }
    );
    
}
ApiScrims();
setInterval(ApiScrims, 1000);