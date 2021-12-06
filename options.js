function validarOpciones(){
    if(Emailmal(document.opciones.email)) return;
    if(Nombremal(document.opciones.nombre)) return;
    if(TLFmal(document.opciones.telefono)) return;
    if(DNImal(document.opciones.dni)) return;
    if(Fechamal(document.opciones.FechaNacimiento)) return;

    document.opciones.submit()
}

function Emailmal(campo){
    var camp=campo.value;
    
    if(camp.length==0){
        return false; 
    
    } else {
        var email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

        if (!email.test(campo.value)){
            alert("El correo electronico " + campo.value + " es incorrecto.");
            campo.focus();
            campo.select();
            return true;
        }
        return false;
    }
}

function Nombremal(campo){
    var camp=campo.value;
    
    if(camp.length==0){
        return false; 
    
    } else {
        var nombre=/^[A-Z][a-z]+/;

        if(!nombre.test(campo.value)){
            alert("El nombre " + campo.value + " es incorrecto.");
            campo.focus();
            campo.select();
            return true;
        }
        return false;
    }
}

function TLFmal(campo){
    var camp=campo.value;
    
    if(camp.length==0){
        return false; 
    
    } else {
        var telefono=/^[0-9]{9}$/;

        if(!telefono.test(campo.value)){
            alert("El telefono " + campo.value + " es incorrecto.");
            campo.focus();
            campo.select();
            return true;
        }
        return false;
    }
}

function DNImal(campo){
    var camp=campo.value;
    
    if(camp.length==0){
        return false; 
    
    } else {
        var dni=/^[0-9]{8}[A-Z]$/;

        if(!dni.test(campo.value)){
            alert("El DNI " + campo.value + " es incorrecto.");
            campo.focus();
            campo.select();
            return true;
        }

        var dnie=campo.value;
        var letra=dnie.charAt(8);
        var numeros=dnie.substring(0,8);
        var numDni=23;
        var resto= numeros%23;

        switch(letra){
            case "T":
                numDni= 0;
                break;
            case "R":
                numDni= 1;
                break;
            case "W":
                numDni= 2;
                break;
            case "A":
                numDni= 3;
                break;
            case "G":
                numDni= 4;
                break;
            case "M":
                numDni= 5;
                break;
            case "Y":
                numDni= 6;
                break;
            case "F":
                numDni= 7;
                break;
            case "P":
                numDni= 8;
                break;
            case "D":
                numDni= 9;
                break;
            case "X":
                numDni= 10;
                break;
            case "B":
                numDni= 11;
                break;
            case "N":
                numDni= 12;
                break;
            case "J":
                numDni= 13;
                break;
            case "Z":
                numDni= 14;
                break;
            case "S":
                numDni= 15;
                break;
            case "Q":
                numDni= 16;
                break;
            case "V":
                numDni= 17;
                break;
            case "H":
                numDni= 18;
                break;
            case "L":
                numDni= 19;
                break;
            case "C":
                numDni= 20;
                break;
            case "K":
                numDni= 21;
                break;
            case "E":
                numDni= 22;
                break;
        }

        if(numDni!=resto){
            alert("Los numeros y la letra del DNI " + campo.value + " no coinciden.");
            campo.focus();
            campo.select();
            return true;
        }

        return false;
    }
}

function Fechamal(campo){
    var camp=campo.value;
    
    if(camp.length==0){
        return false; 
    
    } else {
        var fecha=/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
        

        var hoy= new Date();
        var añohoy=hoy.getFullYear(); 
        var meshoy=hoy.getMonth()+1;
        var diahoy=hoy.getDate();

        var fechae=campo.value;
        var año=fechae.substring(0,4);
        var mes=fechae.substring(5,7);
        var dia=fechae.substring(8,10);
        
        var comprobacion=new Date(año, mes, 0);
        var comprobacionDia=comprobacion.getDate();

        if(!fecha.test(campo.value) || añohoy-año<0 || dia>comprobacionDia){
            alert("La fecha de nacimiento " + campo.value + " es incorrecta.");
            campo.focus();
            campo.select();
            return true;
        }

        if(añohoy-año<18){
            alert("Eres menor de edad por " + (18-(añohoy-año))+ " año/años.");
            campo.focus();
            campo.select();
            return true;
        } else if(añohoy-año==18){
            if(mes>meshoy){
                alert("Eres menor de edad por " + -(meshoy-mes)+ " mes/meses." );
                campo.focus();
                campo.select();
                return true;
            } else if(mes=meshoy){
                if(dia>diahoy){
                    alert("Eres menor de edad por "+ -(diahoy-dia)+ " dia/dias." );
                    campo.focus();
                    campo.select();
                    return true; 
                }
            }
        }

        return false;
    }
}