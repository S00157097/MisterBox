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

function CreateBoxes(c, s, p, t, l, w, h) {
    for(var i = 0; i < c; i++) {
        item = document.createElement("div");
        item.style.backgroundImage = 'url(media/boxes/'+ t +'/'+ t +'1.jpg)';
        item.classList.add("item");
        
        span = document.createElement("span");
        span.appendChild(document.createTextNode(""+ p[i] +""));
        span.classList.add('price');
        
        span2 = document.createElement("span");
        span2.appendChild(document.createTextNode(""+ s[i] +""));
        span2.classList.add('type');
        
        span3 = document.createElement("span");
        span3.appendChild(document.createTextNode(""+l[i]+" x "+w[i]+" x "+h[i]+""));
        span3.classList.add('width');
        
        item.appendChild(span2);
        item.appendChild(span);
        item.appendChild(span3);
        items.appendChild(item);
    }
}

function CreateBows(c, id, w, p) {
    for(var i = 0; i < c; i++) {
        item = document.createElement("div");
        item.style.backgroundImage = 'url(media/bows/'+ id[i] +'.jpg)';
        item.classList.add("item");
        
        span = document.createElement("span");
        span.appendChild(document.createTextNode(""+ p[i] +""));
        span.classList.add('price');
        
        span3 = document.createElement("span");
        span3.appendChild(document.createTextNode("Width "+w[i]+"mm"));
        span3.classList.add('width');
        
        item.appendChild(span);
        item.appendChild(span3);
        items.appendChild(item);
    }
}

function CreateItems(c, id, p, s, dir) {
    for(var i = 0; i < c; i++) {
        item = document.createElement("div");
        item.style.backgroundImage = 'url(media/'+dir+'/'+s+'/'+ id[i] +'.jpg)';
        item.classList.add("item");
        
        span = document.createElement("span");
        span.appendChild(document.createTextNode(""+ p[i] +""));
        span.classList.add('price');
        
        span3 = document.createElement("span");
        span3.appendChild(document.createTextNode("Width "+(s)+"cm"));
        span3.classList.add('width');
        
        item.appendChild(span);
        item.appendChild(span3);
        items.appendChild(item);
    }
}