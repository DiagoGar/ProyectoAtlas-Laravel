#!/bin/bash
 
# Función para mostrar intentos de inicio de sesión fallidos
function mostrar_intentos_fallidos() {
    echo "Intentos de inicio de sesión fallidos:"
    echo "-------------------------------------"
    grep "FAILED LOGIN" /var/log/secure | awk '{print "Fecha:", $1, $2, "Hora:",$3, "Usuario:", $12}'
    read -p "Presione Enter para continuar..."
}

# Función para mostrar intentos de inicio de sesión exitosos
function mostrar_intentos_exitosos() {
    echo "Intentos de inicio de sesión exitosos:"
    echo "--------------------------------------"
    grep "session opened" /var/log/secure | awk '{print "Fecha:", $1, $2 , "Hora:",$3, "Usuario:", $11}'
    read -p "Presione Enter para continuar..."
}

# Menú principal
while true; do
    clear
    echo "Registro de Intentos de Inicio de Sesión"
    echo "---------------------------------------"
    echo "0). Salir"
    echo "1) Mostrar intentos de inicio de sesión fallidos"
    echo "2) Mostrar intentos de inicio de sesión exitosos"  
    
    read -p "Seleccione una opción: " opcion

    case $opcion in
        1) mostrar_intentos_fallidos;;
        2) mostrar_intentos_exitosos;;
        0) exit;;
        *) echo "Opción inválida. Intente nuevamente.";;
    esac

    
done
