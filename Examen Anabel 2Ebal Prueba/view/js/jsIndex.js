document.addEventListener("DOMContentLoaded", function (event) {
	
	loggedVerify();
	var pos=Math.floor(Math.random() * 7);
	
	document.getElementById("random").value=pos;
	
	document.getElementById("login").addEventListener("click",login);  		

})

function loggedVerify(){
	var url = "controller/cLoggedVerify.php";
	
	var usuario = "";

	fetch(url, {
	  method: 'GET', 
	})
	.then(res => res.json()).then(result => {
	
			console.log(result.username); //LLAMAR IGUAL QUE AL CAMPO DEL CONTROLADOR.ç
			usuario = result.username;
			
			if(usuario != undefined){
				alert("Está logueado como " + usuario + " y se le redirigirá a la siguiente página.")
				window.location.href="view/home.html"
			}
		
	})
	.catch(error => console.error('Error status:', error));	

}
function login(){
	
	var letras = document.getElementById("letters").value;
	var num1 = document.getElementById("random").value;
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	
	var url = "controller/cLogin.php";
   	
	var data = { 'username':username, 'password':password, 'num1':num1, 'letras':letras};
	
	fetch(url, {
		  method: 'POST',
		  body: JSON.stringify(data),
		  headers:{'Content-Type': 'application/json'} 
		  
		})
		.then(res => res.json()).then(result => {

	           console.log(result.message);
	           
	           if (result.message==="no error"){
		    	   alert("sin errores maquina");
		    	   window.location.href = "view/home.html";
	           }
	           else {
	               alert("mal"); 
	           }	            

		})
		.catch(error => console.error('Error status:', error));	   
	}