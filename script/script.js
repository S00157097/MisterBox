// Variables
var newBox, ctrl, image;
var wrap = document.querySelector('#wrap');
var box = [], span = [];
var images = [
    "image1.jpg",
    "image2.jpg",
    "image3.jpg",
    "image4.jpg",
    "image5.jpg",
    "image6.jpg"
];


// Creating Slides
for (i = 0; i < images.length; i++) {
    box[i] = document.createElement('div');
    box[i].classList.add('box');
    box[i].style.backgroundImage = 'url(media/' + images[i] + ')';

    AddFilterEvent(box[i]);
    wrap.appendChild(box[i]);
}


SetSlide(); // Slide Transforms
function SetSlide() {
    for (var i = 0; i < box.length; i++) {
        box[i].style.left = ((600 - 300) / (box.length - 1) * i) + 'px';
        box[i].style.top = (i * 1) + 'px';
        box[i].style.transform = 'rotateY(55deg) skew(-20deg) scale(.7)';
    }

    box[box.length - 1].style.transform = 'rotateY(0deg) skew(0deg) scale(1.2)';
}

CreateCtrl(); // Add Controls For The Last Slide
function CreateCtrl() {
    ctrl = document.createElement('div');
    ctrl.setAttribute('id', 'ctrl');

    for (var i = 0; i < 2; i++) {
        span[i] = document.createElement('span');
        span[i].style.userSelect = 'none';
        ctrl.appendChild(span[i]);
    }

    span[0].setAttribute('onClick', 'GoLeft()');
    span[1].setAttribute('onClick', 'GoRight()');

    span[0].innerHTML = '«';
    span[1].innerHTML = '»';

    box[box.length - 1].appendChild(ctrl);
}
function AddFilterEvent(x) {
    x.addEventListener('mouseover', function() {
        this.style.webkitFilter = 'grayscale(0%)';

        span[0].style.left = '5px';
        span[1].style.right = '5px';
    }, false);

    x.addEventListener('mouseout', function() { 
        this.style.webkitFilter = 'grayscale(100%)';

        span[0].style.left = '-75px';
        span[1].style.right = '-75px';
    }, false);
}


function GoLeft() {   // Left Button Clicked
    Extra(box.length - 1);
    newBox.style.transform = '';
    wrap.insertBefore(newBox, box[0]);

    box = document.querySelectorAll('.box');

    SetSlide();
    CreateCtrl();
}

function GoRight() {  // Right Button Clicked
    Extra(0);
    wrap.appendChild(newBox);

    box = document.querySelectorAll('.box');
    box[box.length - 2].style.webkitFilter = '';

    SetSlide();
    CreateCtrl();
}

function Extra(target) {  // Shorten Code
    document.querySelector('#ctrl').parentNode.removeChild(document.querySelector('#ctrl'));

    image = window.getComputedStyle(box[target]).getPropertyValue('background-image');
    box[target].parentNode.removeChild(box[target]);

    newBox = document.createElement('div');
    AddFilterEvent(newBox); // Animate Slides
    newBox.classList.add('box');
    newBox.style.backgroundImage = image;
}