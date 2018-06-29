window.onload=function(){

	document.body.style.backgroundColor="#1d1d1d";
	document.body.style.color="White";

	var desconectado=document.getElementById('desconectado');
	desconectado.style.color="black";

	document.getElementById("logo").style.cursor = "pointer";

	var logo=document.getElementById('logo');
		
	logo.onclick=function(){
		window.location.href= "http://localhost/meatsProject";
	} 

	

	var email=document.getElementById('email');
	var senha=document.getElementById('senha');
	var confirma_senha=document.getElementById('confirma_senha');
	var formulario=document.getElementById('formulario');
	
	email.style.borderColor="lightgray";
	senha.style.borderColor="lightgray";
	confirma_senha.style.borderColor="lightgray";

	email.onblur=function(){
		usuario = email.value.substring(0, email.value.indexOf("@"));
		dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);
		 
		if ((usuario.length >=1) &&
		    (dominio.length >=3) && 
		    (usuario.search("@")==-1) && 
		    (dominio.search("@")==-1) &&
		    (usuario.search(" ")==-1) && 
		    (dominio.search(" ")==-1) &&
		    (dominio.search(".")!=-1) &&      
		    (dominio.indexOf(".") >=1)&& 
		    (dominio.lastIndexOf(".") < dominio.length - 1)) {
				
			document.getElementById("aviso_email").innerHTML="";
			email.style.borderColor="lightgray";
			valida_email=1;
		}
		else{	
			document.getElementById("aviso_email").innerHTML="E-mail invalido";
			email.style.borderColor="red";
			valida_email=0;
		}
	}

	senha.onblur=function(){
		if(senha.value!=""){
			document.getElementById("aviso_senha").innerHTML="";
			senha.style.borderColor="lightgray";
			valida_senha=1;
		}
		else{
			document.getElementById("aviso_senha").innerHTML="Senha invalida";
			senha.style.borderColor="red";
			valida_senha=0;
		}

		if(confirma_senha.value==senha.value){
			document.getElementById("aviso_confirma_senha").innerHTML="";
			confirma_senha.style.borderColor="lightgray";
			valida_confirma_senha=1;
		}
		else{
			valida_confirma_senha=0;
		}
	}

	confirma_senha.onblur=function(){
		if(confirma_senha.value==senha.value){
			document.getElementById("aviso_confirma_senha").innerHTML="";
			confirma_senha.style.borderColor="lightgray";
			valida_confirma_senha=1;
		}
		else{
			document.getElementById("aviso_confirma_senha").innerHTML="Senha diferente";
			confirma_senha.style.borderColor="red";
			valida_confirma_senha=0;
		}
	}

	formulario.onsubmit=function(){
		usuario = email.value.substring(0, email.value.indexOf("@"));
		dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);
		 
		if ((usuario.length >=1) &&
		    (dominio.length >=3) && 
		    (usuario.search("@")==-1) && 
		    (dominio.search("@")==-1) &&
		    (usuario.search(" ")==-1) && 
		    (dominio.search(" ")==-1) &&
		    (dominio.search(".")!=-1) &&      
		    (dominio.indexOf(".") >=1)&& 
		    (dominio.lastIndexOf(".") < dominio.length - 1)) {
				
			document.getElementById("aviso_email").innerHTML="";
			email.style.borderColor="lightgray";
			valida_email=1;
		}
		else{	
			document.getElementById("aviso_email").innerHTML="E-mail invalido";
			email.style.borderColor="red";
			valida_email=0;
		}
		
		if(senha.value==""){
			document.getElementById("aviso_senha").innerHTML="Senha invalida";
			senha.style.borderColor="red";
			valida_senha=0;
		}

		if(confirma_senha.value!=senha.value){
			document.getElementById("aviso_confirma_senha").innerHTML="Senha diferente";
			confirma_senha.style.borderColor="red";
			valida_confirma_senha=0;
		}

		if(valida_email==1 && valida_senha==1 && valida_confirma_senha==1){

		}
		else{
			event.preventDefault();
		}
	}

}