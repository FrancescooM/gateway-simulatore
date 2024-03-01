/*

Copyright (C) 2024 Francesco Mancuso - www.francescomancuso.it 
E' vietata la copia, la pubblicazione, la riproduzione e la redistribuzione dei contenuti in qualsiasi modo o forma

*/


const SwitchThemes = document.querySelector("[data-switchdarkmode]")
const IconTheme = document.querySelector("[data-icontheme]")


var TemaCorrente = localStorage.getItem('discourse_color_scheme_override') /*|| (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light")*/;
if (TemaCorrente) {
  document.documentElement.setAttribute('data-theme', TemaCorrente)
}


var TemaInUso = document.documentElement.getAttribute("data-theme");

function checkTheme() {
	const checkattribute = document.documentElement.hasAttribute('data-theme');
	
	if (TemaCorrente == "light") {
		LightModeOn();
	} else if (TemaCorrente == "dark") {
		DarkModeOn();
	} else if (checkattribute == false) {
		AutoModeOn();
	}
}

SwitchThemes.addEventListener("click", () => {
	if (IconTheme.classList.contains("fa-circle-half-stroke")) {
		var targetTheme = "light";
  	document.documentElement.setAttribute('data-theme', targetTheme);
  	localStorage.setItem('discourse_color_scheme_override', targetTheme);
  	LightModeOn();
		alertify.success('Tema chiaro applicato!'); 
	} else if (IconTheme.classList.contains("fa-sun")) {
		var targetTheme = "dark";
		document.documentElement.setAttribute('data-theme', targetTheme);
		localStorage.setItem('discourse_color_scheme_override', targetTheme);
		DarkModeOn();
		alertify.success('Tema scuro applicato!'); 
	} else if (IconTheme.classList.contains("fa-moon")) {
		localStorage.removeItem('discourse_color_scheme_override');
		document.documentElement.removeAttribute('data-theme');
		AutoModeOn();
		alertify.success('Tema automatico applicato!'); 
	}
})

function LightModeOn() {
  IconTheme.classList.add("fa-sun");
  IconTheme.classList.remove("fa-moon");
  IconTheme.classList.remove("fa-circle-half-stroke");
}

function DarkModeOn() {
  IconTheme.classList.remove("fa-sun");
  IconTheme.classList.add("fa-moon");
  IconTheme.classList.remove("fa-circle-half-stroke");
}

function AutoModeOn() {
  IconTheme.classList.remove("fa-sun");
  IconTheme.classList.remove("fa-moon");
  IconTheme.classList.add("fa-circle-half-stroke");
}

window.onload = function() {
	checkTheme();
}


setTimeout(console.log.bind(console, '%cSimulatore - Gateway', 'color: #051755; font-size: 15px; font-weight: 500; font-family: system-ui, ubuntu;'));
setTimeout(console.log.bind(console, '%cCopyright (C) 2024 Francesco Mancuso\n', 'font-size: 14px; font-family: system-ui, ubuntu; line-height: 1.5'));