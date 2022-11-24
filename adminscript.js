//////////////////////////// ON LOAD FUNCTION //////////////////////////// 
window.onload=function(){
var searchInput = document.getElementById("searched_title");

searchInput.addEventListener("keypress", function(event) {
   if (event.keyCode == 13) {
		event.preventDefault();
        document.getElementById("searchButton").click();
    };
});
showResults();
}


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
			newDiv.innerHTML += "by: <i>" + jsonData[i].author + "</i><br>";

			var btnDiv = document.createElement("div");
			newDiv.appendChild(btnDiv);
			btnDiv.className = "editdelBtns";

			var editBtn = document.createElement("button");
			btnDiv.appendChild(editBtn);
			editBtn.className = "editButton";
			editBtn.textContent = "Edit";
			editBtn.setAttribute('id', jsonData[i].id);
			editBtn.setAttribute("onclick","editBook(this)");

			var delBtn = document.createElement("button");
			btnDiv.appendChild(delBtn);
			delBtn.className = "deleteButton";
			delBtn.textContent = "Delete";
			delBtn.setAttribute('id', jsonData[i].id);
			delBtn.setAttribute("onclick","deleteBook(this)");
		};
    };

    xmlhttp.open("GET", "db_search.php?searched_title=" + searchStr, false);
    xmlhttp.send();
};


//////////////////////////// DELETE BUTTON //////////////////////////// 

function deleteBook(obj){
	var bookId = obj.id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
		data = xmlhttp.response;

    };
    xmlhttp.open("GET", "delete.php?id=" + bookId, false);
    xmlhttp.send();

	showResults();	
};

function editBook(obj){
	alert("Under construction :)");
};

