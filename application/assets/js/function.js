



//**************************************************
//			ONREADY.JS
//*************************************************/



//**************************************************
//				ONCLICK.JS
//*************************************************/				




//**************************************************
//				ONCLICK.JS HELPERS
//*************************************************/


/**************************************************/

//**************************************************
//				FUNCTION.JS
//*************************************************/

jQuery.fn.center = function(parent) {
    if (parent) {
        parent = this.parent();
    } else {
        parent = window;
    }
    this.css({
        "position": "absolute",
        "top": ((($(parent).height() - this.outerHeight()) / 2) + $(parent).scrollTop() + "px"),
        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
    });
return this;
}
jQuery.fn.scenter = function(parent) {
    if (parent) {
        parent = this.parent();
    } else {
        parent = window;
    }
    this.css({
        "position": "absolute",
        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
    });
return this;
}

