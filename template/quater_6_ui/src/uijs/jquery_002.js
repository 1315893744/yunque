/* ===========================================================
 * jquery-jumpto.js v1
 * ===========================================================
 * Copyright 2013 Pete Rojwongsuriya.
 * http://www.thepetedesign.com
 *
 * Create a smooth jump to sub navigational sidebar
 * with one js call
 *
 * https://github.com/peachananr/jumpto
 *
 * ========================================================== */

!function(jQuery){
  
  var defaults = {
    firstLevel: "> h2",
    secondLevel: false,
    innerWrapper: ".menu-wrap",
    offset: 90,
    animate: 1000,
    navContainer: false,
    anchorTopPadding: 20,
    showTitle: false,
    closeButton: false
	};
	
	function isScrolledIntoView(elem)
  {
      var docViewTop = jQuery(window).scrollTop();
      var docViewBottom = docViewTop + (jQuery(window).height() /4);
      
      var elemTop = jQuery(elem).offset().top;
      var elemBottom = elemTop + jQuery(elem).height();

      return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }
	
  jQuery.fn.jumpto = function(options){
    var settings = jQuery.extend({}, defaults, options),
        el = jQuery(this),
        html = "",
        block = jQuery(settings.innerWrapper),
        selectors = "",
        title = "",
        close ="";
        
    el.addClass("jumpto-cotainer");
    
    redrawMenu = function(){
      jQuery(selectors.slice(0,-2)).each(function( index ) {
        if (isScrolledIntoView(jQuery(this))) {
          jQuery(".about-subnav a").removeClass("on").parent().find(" a[href='#"+jQuery(this).attr("id")+"']").addClass("on")
          
          if(jQuery("a[href='#"+jQuery(this).attr("id")+"']").parent().parent().hasClass("jumpto-second")) {
            jQuery("a[href='#"+jQuery(this).attr("id")+"']").closest(".jumpto-second").show()
          }
          if(jQuery("a[href='#"+jQuery(this).attr("id")+"']").parent().parent().hasClass("about-menu")) {
            jQuery("a[href='#"+jQuery(this).attr("id")+"']").closest(".about-menu").find(".jumpto-second").hide()
          }
          if(jQuery("a[href='#"+jQuery(this).attr("id")+"']").parent().find(".jumpto-second")) {
            jQuery("a[href='#"+jQuery(this).attr("id")+"']").parent().find(".jumpto-second").show()
          }
        }
      });
      if(jQuery(document).scrollTop() > settings.offset) {
        jQuery(".about-subnav").removeClass("bottom").addClass("fixed");
      } else {
        jQuery(".about-subnav").removeClass("bottom fixed");
      }
      if(jQuery(document).scrollTop() > el.outerHeight(true)) {
        jQuery(".about-subnav").addClass("bottom fixed");
      }
    }
    
    block.find(settings.firstLevel).each(function( index ) {
      var b = jQuery(this),
          i = index,
          inner_html = "";
      if ( b.parent().find(settings.secondLevel).length > 0) {
        inner_html += "<ul class='jumpto-second'>"
        b.parent().find(settings.secondLevel).each(function( index ) {
          var id = "section-" + i + "_" + index;
          jQuery(this).attr("id", id);
          link_to = "<a href='#" + id + "'>" + jQuery(this).text() + "</a>"
          inner_html += "<li>" + link_to + "</li>"
          selectors += "#"+id + ", ";
        });
        inner_html += "</ul>"
        var id = "section-" + i;
        b.attr("id", id);
        link_to = "<a href='#" + id + "'>" + b.text() + "</a>"
        selectors += "#"+id + ", ";
        html += "<li>" + link_to + inner_html + "</li>"
      } else {
        var id = "section-" + i;
        link_to = "<a href='#" + id + "'>" + b.text() + "</a>"
        b.attr("id", id);
        selectors += "#"+id + ", ";
        html += "<li>" + link_to + "</li>"
      }
    });
    if (settings.showTitle != false) {
      var title = "<div class='jumpto-title'>"+settings.showTitle+"</div>"
    }
    
    if (settings.closeButton != false) {
      var close = "<div class='jumpto-close'><a href='#' id='jumpto-close'>Close</a></div>"
    }
    if(settings.navContainer == false) {
      jQuery(this).append("<nav class='about-subnav'>"+ title +"<ul class='about-menu'>" + html + "</ul>"+ close +"</nav>")
    }else{
      jQuery(settings.navContainer).addClass("about-subnav").html(title +"<ul class='about-menu'>" + html + "</ul>"+ close)
    }
    
    
    jQuery('.about-subnav a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
          || location.hostname == this.hostname) {
    
        var target = jQuery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          jQuery('html,body').animate({
            scrollTop: target.offset().top - settings.anchorTopPadding
          }, settings.animate, 'swing');
          return false;
        }
      }
    });
    
    jQuery(window).scroll(function() {
      redrawMenu()
    });
    
    // jQuery(".about-subnav #jumpto-close").click(function() {
    //   var btn = jQuery(this)
    //   btn.parent().parent().find("> .about-menu").slideToggle( "slow", function() {
    //       if (jQuery(this).is(":visible")) {
    //         btn.html("Close");
    //       } else {
    //         btn.html("Open");
    //       }
    //     });
    //     return false;
    // });
    
    setInterval(function() {
      var track = [];
      jQuery(selectors.slice(0,-2)).each(function( index ) {
        track.push(isScrolledIntoView(jQuery(this)))
      });
      if(jQuery.inArray(true, track) == -1) {
        // jQuery(".about-subnav a").removeClass("on")
        jQuery(".about-subnav .jumpto-second").hide()
      }
    }, 500);
  }
}(window.jQuery);


