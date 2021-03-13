"use strict";

$(document).ready(function(){
	if(window.location.pathname.indexOf("/product") >= 0)
		changeQuantity("addproductform-quantity", "add_product_form_submit",
			"add_product_form_minus", "add_product_form_plus");
	if(window.location.pathname.indexOf("/basket") >= 0)
		changeQuantity("changeorderform-quantity", "change_order_form_submit",
			"change_order_form_minus", "change_order_form_plus", true);
	if(document.getElementsByClassName("sld").length > 0){
		sld_start();
	}
});

function changeQuantity(quantityEl, subBut, minusEl, plusEl, lessThanZero = false) {
	let mArr = document.getElementsByClassName(minusEl);
	let pArr = document.getElementsByClassName(plusEl);
	if((mArr === undefined) || (mArr === null))
		return;

	for(let index = 0; index < mArr.length; ++index){
		mArr[index].addEventListener("click", function (event) {
			let el = document.getElementById(quantityEl);
			let col = el.value - 1;
			if(isNaN(col))
				col = 1;
			if(lessThanZero){
				if(col < -99)
					col = -99;
			} else {
				if(col < 0)
					col = 0;
			}
			if(col > 99)
				col = 99;
			el.value = col;
		})
	}

	for(let index = 0; index < pArr.length; ++index){
		pArr[index].addEventListener("click", function () {
			let el = document.getElementById(quantityEl);
			let col = parseInt(el.value, 10) + 1;
			if(isNaN(col))
				col = 1;
			if(lessThanZero){
				if(col < -99)
					col = -99;
			} else {
				if(col < 0)
					col = 0;
			}
			if(col > 99)
				col = 99;
			el.value = col;
		})
	}

	let submitButton = document.getElementById(subBut);

	submitButton.addEventListener("click", function (event) {
		let el = document.getElementById(quantityEl);
		if(parseInt(el.value, 10) === 0)
			return false;
		else
			return true;
	})
}

function sld_start() {
	let mainImg = document.getElementById("sld_main_img");
	let smallImg = document.getElementsByClassName("sld_small_imgs");
	for(let index = 0; index < smallImg.length; ++index){
		smallImg[index].addEventListener("click", function () {
			mainImg.src = smallImg[index].src;
		})
	}
}
