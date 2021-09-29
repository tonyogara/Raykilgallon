/* global ExpertCarpenterScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   });
});

function expert_carpenter_open() {
	window.expert_carpenter_mobileMenu=true;
	jQuery(".sidenav").addClass('show');
}
function expert_carpenter_close() {
	window.expert_carpenter_mobileMenu=false;
	jQuery(".sidenav").removeClass('show');
}

window.expert_carpenter_currentfocus=null;
expert_carpenter_checkfocusdElement();
var expert_carpenter_body = document.querySelector('body');
expert_carpenter_body.addEventListener('keyup', expert_carpenter_check_tab_press);
var expert_carpenter_gotoHome = false;
var expert_carpenter_gotoClose = false;
window.expert_carpenter_mobileMenu=false;
function expert_carpenter_checkfocusdElement(){
 	if(window.expert_carpenter_currentfocus=document.activeElement.className){
	 	window.expert_carpenter_currentfocus=document.activeElement.className;
 	}
}
function expert_carpenter_check_tab_press(e) {
	"use strict";
	// pick passed event or global event object if passed one is empty
	e = e || event;
	var activeElement;

	if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.expert_carpenter_mobileMenu){
				if (!e.shiftKey) {
					if(expert_carpenter_gotoHome) {
						jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
					}
				}
				if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
					expert_carpenter_gotoHome = true;
				} else {
					expert_carpenter_gotoHome = false;
				}
			}else{
				if(window.expert_carpenter_currentfocus=="mobiletoggle"){
					jQuery( "" ).focus();
				}
			}
		}
	}
	if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.expert_carpenter_currentfocus=="header-search"){
				jQuery(".mobiletoggle").focus();
			}else{
				if(window.expert_carpenter_mobileMenu){
					if(expert_carpenter_gotoClose){
						jQuery("a.closebtn.responsive-menu").focus();
					}
					if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
						expert_carpenter_gotoClose = true;
					} else {
						expert_carpenter_gotoClose = false;
					}
				
				}else{
					if(window.expert_carpenter_mobileMenu){
					}
				}
			}
		}
	}
 	expert_carpenter_checkfocusdElement();
}