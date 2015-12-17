$(document).ready(function() {
    $('.drop-trigger').click(function() {
        $(this).next().slideToggle();
    });
});

var items = document.querySelector("#items");
var item;
var span;
var span2;
var span3;

function CreateItems(c, s, p, t, l, w, h) {
    for(var i = 0; i < c; i++) {
        item = document.createElement("div");
        item.style.backgroundImage = 'url(media/boxes/'+ t +'/'+ t +'1.jpg)';
        item.classList.add("item");
        
        span = document.createElement("span");
        span.appendChild(document.createTextNode(""+ p[i] +""));
        
        span2 = document.createElement("span");
        span2.appendChild(document.createTextNode(""+ s[i] +""));
        
        span3 = document.createElement("span");
        span3.appendChild(document.createTextNode(""+l[i]+" x "+w[i]+" x "+h[i]+""));
        
        item.appendChild(span2);
        item.appendChild(span);
        item.appendChild(span3);
        items.appendChild(item);
    }
}