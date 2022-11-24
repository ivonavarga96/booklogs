//////////////////////////// ON LOAD FUNCTION //////////////////////////// 
window.onload=function(){
var searchInput = document.getElementById("searched_title");

searchInput.addEventListener("keypress", function(event) {
   if (event.keyCode == 13) {
		event.preventDefault();
        document.getElementById("searchButton").click();
    };
});


//////////////////////////// MAIN LAYOUT //////////////////////////// 
var lColumn = document.getElementById("leftcol");
var lHeader = document.getElementById("leftHeader");
var left1 = document.getElementById("left1");
var left2 = document.getElementById("left2");
var left3 = document.getElementById("left3");
var left4 = document.getElementById("left4");

var mColumn = document.getElementById("middlecol");
var mHeader = document.getElementById("middleHeader");
var middle1 = document.getElementById("middle1");
var middle2 = document.getElementById("middle2");
var middle3 = document.getElementById("middle3");
var middle4 = document.getElementById("middle4");

var rColumn = document.getElementById("rightcol");
var rHeader = document.getElementById("rightHeader");
var right1 = document.getElementById("right1");
var right2 = document.getElementById("right2");
var right3 = document.getElementById("right3");
var right4 = document.getElementById("right4");

var Items = [left1,left2,left3,left4,middle1,middle2,middle3,middle4,right1,right2,right3,right4]; 

const today = new Date();
const month = today.toLocaleString("default", {month: "long"});
const yearr = today.getFullYear();
const nextYear = today.getFullYear() +1;
lHeader.innerHTML = month + " releases";
mHeader.innerHTML = yearr + " National Book Awards Winners";
rHeader.innerHTML = "Upcoming books for " + nextYear;

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	
	data = xmlhttp.response;
	jsonData = JSON.parse(data);
	
	// LEFT COLUMN
	for (let i = 0; i < 4; i++) {	
		Items[i].classList.add("bookcoverBox");

		var imgElem = document.createElement("img");
		Items[i].appendChild(imgElem);
		imgElem.className = "bookcover";
		imgElem.setAttribute("src", jsonData[i].imgsrc);
		
		Items[i].innerHTML += "<b>" + jsonData[i].title + "</b><br>";
		Items[i].innerHTML += "by: <i>" + jsonData[i].author + "</i>";
	};

	// MIDDLE COLUMN
	for (let i = 4; i < 8; i++) {	
		Items[i].classList.add("bookcoverBox");

		var imgElem = document.createElement("img");
		Items[i].appendChild(imgElem);
		imgElem.className = "bookcover";
		imgElem.setAttribute("src", jsonData[i].imgsrc);
		
		Items[i].innerHTML += "<b>" + jsonData[i].title + "</b><br>";
		Items[i].innerHTML += "by: <i>" + jsonData[i].author + "</i>";
	};

	// RIGHT COLUMN
	for (let i = 8; i < 12; i++) {	
		Items[i].classList.add("bookcoverBox");

		var imgElem = document.createElement("img");
		Items[i].appendChild(imgElem);
		imgElem.className = "bookcover";
		imgElem.setAttribute("src", jsonData[i].imgsrc);
		
		Items[i].innerHTML += "<b>" + jsonData[i].title + "</b><br>";
		Items[i].innerHTML += "by: <i>" + jsonData[i].author + "</i>";
	};
};

xmlhttp.open("GET", "dynamicLayout.php", false);
xmlhttp.send();
};


//////////////////////////// SEARCH BUTTON //////////////////////////// 
function showResults() {

	var searchStr = document.getElementById("searched_title").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

		// DUMP POSTOJEĆEG SADRŽAJA
        var searchDiv = document.getElementById("searchDiv");
		searchDiv.innerHTML = "";
		
		// DOHVAT PODATAKA S BAZE
		data = xmlhttp.response;
		jsonData = JSON.parse(data);

		
		// MAIN LOOP
		for (let i = 0; i < jsonData.length; i++) {
 
			// KREIRANJE NOVOG DIV-A ZA ISPIS REZULTATA
			var newDiv = document.createElement("div");
			searchDiv.appendChild(newDiv);
			newDiv.className = "bookcoverBoxforSearch";
			
			var imgElem = document.createElement("img");
			newDiv.appendChild(imgElem);
			imgElem.className = "bookcover";
			imgElem.setAttribute("src", jsonData[i].img_src);
			
			newDiv.innerHTML += "<b>" + jsonData[i].title + "</b><br>";
			newDiv.innerHTML += "by: <i>" + jsonData[i].author + "</i>";
		};

    };
    xmlhttp.open("GET", "db_search.php?searched_title=" + searchStr, false);
    xmlhttp.send();
};


//////////////////////////// CHANGE PASSWORD //////////////////////////// 

function changePassword(){
	var username = document.getElementById("username").textContent;
	var newPassword = document.getElementById("newPassword").value;
	console.log(newPassword, username);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
		data = xmlhttp.response;
    };

    xmlhttp.open("GET", "edit.php?username=" + username + "&newPassword=" + newPassword, false);
    xmlhttp.send();
};


//////////////////////////// FILTER BOOKS BY GENRE //////////////////////////// 

function filterBooks(obj){
	var genre = obj;
	showResults();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

		// DUMP POSTOJEĆEG SADRŽAJA
        var searchDiv = document.getElementById("searchDiv");
		searchDiv.innerHTML = "";
		
		// DOHVAT PODATAKA S BAZE
		data = xmlhttp.response;
		jsonData = JSON.parse(data);

		
		// MAIN LOOP
		for (let i = 0; i < jsonData.length; i++) {
 
			// KREIRANJE NOVOG DIV-A ZA ISPIS REZULTATA
			var newDiv = document.createElement("div");
			searchDiv.appendChild(newDiv);
			newDiv.className = "bookcoverBoxforSearch";
			
			var imgElem = document.createElement("img");
			newDiv.appendChild(imgElem);
			imgElem.className = "bookcover";
			imgElem.setAttribute("src", jsonData[i].img_src);
			
			newDiv.innerHTML += "<b>" + jsonData[i].title + "</b><br>";
			newDiv.innerHTML += "by: <i>" + jsonData[i].author + "</i>";
		};

    };
    xmlhttp.open("GET", "filter.php?genre=" + genre, false);
    xmlhttp.send();
};

