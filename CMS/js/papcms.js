

document.getElementById('opennwefeldfertigkeit').onclick = function () {
    if (document.getElementById('openfeld')) {
        var fertigkeitenfeld = document.getElementById('openfeld');
        fertigkeitenfeld.style.visibility = 'visible';


    }
}



document.getElementById('close').onclick = function () {
    if (document.getElementById('openfeld')) {
        var fertigkeitenfeld = document.getElementById('openfeld');
        fertigkeitenfeld.style.visibility = 'hidden';


    }
}






/*
document.getElementById('imgauswahl').onclick = function () {
  if (document.getElementById('work')) {
  document.getElementById('work').innerHTML = '<img src="img/brtor.jpg" alt="" class="img" id="imgauswahl">';
  document.getElementById('work').style.marginLeft = "60px" ;
} else {
  console.log('Kein Element');
    }
}



function hide(event) {
  var target = event.target || event.srcElement;
  target.style.visibility = 'hidden';
}

var foo = document.getElementById('foo');
var jochen = document.getElementsByClassName('img')
for (i = 0; i < jochen.length; ++i ){
  jochen[i].onclick= function(e){
    hide(e);
  }


}
*/
/*
document.getElementsByClassName('img').onclick = function (e) {
hide(e);
}
*/
