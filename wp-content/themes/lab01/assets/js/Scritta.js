jQuery.noConflict();
jQuery( document ).ready(function( $ ) {
    var container = document.getElementById('changeText');

    var things = [' Web Developers','Web Designers', "diamoci un < div >"];
    var t = -1;
    var thing = '';
    var message = container.innerHTML;
    things.push(message);
    var mode = 'write';
    var delay = 500;

    function updateText(txt) {
        container.innerHTML = txt;
    }

    function tick() {

        if(container.innerHTML.length == 0) {
            t = (t+1) % things.length;
            thing = things[t];
            message = '';
            mode = 'write';
        }

        switch(mode) {
            case 'write' :
            message += thing.slice(0, 1);
            thing = thing.substr(1);

            updateText(message);

            if(thing.length == 0){
                mode = 'delete';
                // delay = delay;
            } else {
                // delay = delay;
            }

            break;

            case 'delete' :
            message = message.slice(0, -1);
            updateText(message);

            if(message.length == 0)
            {
                mode = 'write';
                // delay = 1000;
            } else {
                // delay = 1000;
            }
            break;
        }

        timeout = window.setTimeout(tick, delay);
    }

    var timeout = window.setTimeout(tick, delay);
});
