/**
 * Funciones auxiliares de javascripts 
 */


function confirmarBorrar(nombre,id){
  if (confirm("¿Quieres eliminar el usuario:  "+nombre+"?"))
  {
   document.location.href="?orden=Borrar&id="+id;
  }
}

/**
 *  Muestra la clave del formulario, cambia de password a text
 */
function mostrarclave() {
  let pwd = document.getElementById("clave_id");
  
  
  if(pwd.getAttribute("type") == "password"){
    pwd.setAttribute("type", "text");
    visible = true;
  }else{
    pwd.setAttribute("type", "password");
    visible = false;
  }
} 

/**
 *  Pide confirmación de volcar los datos 
 */
function confirmarVolcar(){
  let comprobacion = confirm("¿Deseas volcar la información?");
  console.log(comprobacion);
  (comprobacion != false && comprobacion != null) ? document.location.href="?orden=Terminar": document.location.reload();
}

