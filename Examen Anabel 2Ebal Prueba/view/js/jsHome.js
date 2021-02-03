document.addEventListener("DOMContentLoaded", function (event) {
	
	loggedVerify();
	loadCombo();
	document.getElementById("logout").addEventListener("click",logout);  
	document.getElementById("cmbCategories").addEventListener("change", showCatArticles);
	var usuario = "";

})

function loggedVerify(){
	
	var url = "../controller/cLoggedVerify.php";

	fetch(url, {
	  method: 'GET', 
	})
	.then(res => res.json()).then(result => {
	
			console.log(result.username); //LLAMAR IGUAL QUE AL CAMPO DEL CONTROLADOR.ç
			usuario = result.username;
		
		
	})
	.catch(error => console.error('Error status:', error));	

}

function loadCombo(){
	var url = "../controller/cLoadCombos.php";

	fetch(url, {
	  method: 'GET', 
	})
	.then(res => res.json()).then(result => {
	
			console.log(result.list);
			
			var categories=result.list;

			var newRow ="";
	   		
			newRow += "<option value='0'>Elige una categoria....</option>";	
	   		
	   		for (let i = 0; i < categories.length; i++) {
								
				newRow += "<option id=" + categories[i].idCategory + " value='" + categories[i].idCategory + "'>" + categories[i].categoryName  + "</option>";	
			}  		 
			document.getElementById("cmbCategories").innerHTML=newRow;
	})
	.catch(error => console.error('Error status:', error));	

}

function showCatArticles(){
	var idCategory=this.value;
	
	var url = "../controller/cShowHires.php";
	var data = { 'usuario':usuario};

	fetch(url, {
	  method: 'POST',
	  body: JSON.stringify(data),
	  headers:{'Content-Type': 'application/json'}
	  
	})
	.then(res => res.json()).then(result => {
       		
		console.log(result.list);
		
		var hires=result.list;
   		
   		var newRow ="<table > ";
		newRow +="<tr><th>idHire</th><th>idArticle</th><th>Article</th><th>Description</th><th>Hires</th></tr>";
   		
   		for (let i = 0; i < hires.length; i++) {
   			newRow += "<tr><th>" + hires[i].idHire + "</th><th>" + hires[i].objArticle.idArticle + "</th><th>" + hires[i].objArticle.article + "</th><th>" + hires[i].objArticle.description + "</th><th>" + hires[i].startingDate + " // " + hires[i].returnDate + "</th>";	
		}
   		newRow +="</table>";   
   		
   		document.getElementById("idTable").innerHTML=newRow;
	  		
	})
	.catch(error => console.error('Error status:', error));	
}

function logout(){
   	var url = "../controller/cLogout.php";

	fetch(url, {
	  method: 'GET',  
	})
	.then(res => res.text()).then(result => {
	
		   window.location.href="../index.html";
	})
	.catch(error => console.error('Error status:', error));	   
}




