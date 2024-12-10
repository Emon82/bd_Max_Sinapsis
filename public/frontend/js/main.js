


function dropDown(){
    let dropDown = document.querySelector('.dropDownMenu');
    let menu = document.querySelector('.more--drop--down');

    if(dropDown && menu){
        dropDown.addEventListener('click', function(event) {
            menu.classList.toggle('active');
            event.stopPropagation();
        });

        document.addEventListener('click', function(event) {
            if (!dropDown.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('active');
            }
        });
    }

}

dropDown()





function sideNav (){
    let menuCloser = document.querySelector('.harmburg--icon');
    let menuMain = document.querySelector('.phone--navbar');
    let body = document.querySelector('body');

    if(menuCloser && menuMain && body){


        menuCloser.addEventListener('click', function(event) {
            menuMain.classList.toggle('activess');
            if (menuMain.classList.contains('activess')) {
                body.style.overflowY = "hidden";
            } else {
                body.style.overflowY = "auto";
            }
            event.stopPropagation(); // Correctly stop propagation
        });

        document.addEventListener('click', function(event) {
            if (!menuCloser.contains(event.target) && !menuMain.contains(event.target)) {
                menuMain.classList.remove('activess');
                body.style.overflowY = "auto";
            }
        });

    }

}

sideNav()




