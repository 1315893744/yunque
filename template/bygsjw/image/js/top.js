var jq = jQuery.noConflict();
(function(jq) {
    "use strict";
    jq.fn.stickMe = function(options) {
        // Assigning variables
        var jqwindow = jq(window),
            jqdocument = jq(document),
            jqbody = jq('.hd_xin_top'),
            position = 0,
            jqelem = this,
            jqelemHeight = jqelem.innerHeight(),
            jqwin_center = jqwindow.height() / 2,
            jqpos,
            settings = jq.extend({
                transitionDuration: 0,
                shadow: false,
                shadowOpacity: 1,
                animate: false,
                triggerAtCenter: true,
                topOffset: 46,
                transitionStyle: 'slide',
                stickyAlready: false
            }, options);
        // Initial state
        jqelem
            .addClass('stick-me')
            .addClass('not-sticking');
        switch (settings.triggerAtCenter) {
            case (settings.triggerAtCenter && settings.topOffset < jqelemHeight) || (settings.triggerAtCenter && settings.topOffset > jqelemHeight):
                settings.triggerAtCenter = false;
                break;
        }
        if (settings.stickyAlready) {
            settings.triggerAtCenter = false;
            settings.topOffset = 0;
            stick();
        }

        function jqelem_slide() {
            if (settings.animate === true && settings.transitionStyle === 'slide' && settings.stickyAlready !== true) {
                jqelem.slideDown(settings.transitionDuration);
            }
            if (settings.animate === true && settings.transitionStyle === 'fade' && settings.stickyAlready !== true) {
                jqelem.fadeIn(settings.transitionDuration);
            } else {
                jqelem.show();
            }
            jqelem.removeClass('not-sticking');
        }

        function stick() {
            if (jqelem.hasClass('sticking')) {
                jqelem.trigger('sticking');
            }
            if (position === 0) {
                position = 1;
                if(settings.stickyAlready === false) {
                    jqelem.trigger('sticky-begin');
                }
            }
            if (jqelem.hasClass('not-sticking')) {
                jqelem.hide();
                jqelem_slide();
            }
            if (settings.shadow === true) {
                jqelem.css('box-shadow', '0px 1px 2px rgba(0,0,0,' + settings.shadowOpacity + ')');
            }
            jqelem
                .addClass('sticking')
                .css('position', 'fixed')
                .css('top', '0');
            jqbody.css('padding-top', jqelemHeight);
        }

        function unstick() {
            if (settings.shadow === true) {
                jqelem.css('box-shadow', 'none');
            }
            jqelem.addClass('not-sticking')
                .removeClass('sticking')
                .show()
                .css('position', 'relative');
            jqbody.css('padding-top', '0');
        }
        jqwindow.scroll(function() {
            jqpos = jqwindow.scrollTop();
            if (jqpos === 0) {
                position = 0;
                jqelem.trigger('top-reached');
            }
            if (settings.triggerAtCenter === true) {
                if (jqpos > jqwin_center + jqelemHeight) {
                    stick();
                }
            }
            if (settings.triggerAtCenter === false) {
                if (jqpos > settings.topOffset) {
                    stick();
                }
            }
            if (jqpos + jqwindow.height() > jqdocument.height() - 1) {
                jqelem.trigger('bottom-reached');
            }
            if (settings.triggerAtCenter === true) {
                if (jqpos < 46) {
                    unstick();
                }
            }
            if (settings.triggerAtCenter === false) {
                if (jqpos < 46) {
                    if (settings.stickyAlready !== true) {
                        unstick();
                    }
                }
            }
        });
        return this;
    };
}(jQuery));
