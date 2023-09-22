#!/bin/bash

#ALTA USUARIO
function alta_usuario(){
    read -p "Ingrese nombre del nuevo usuario: " username
    read -sp "Ingrese contraseña del nuevo usuario: " password
    echo
    sudo useradd -m -d /home/$username -s /bin/bash $username
    echo "$username:$password" | sudo chpasswd
    echo "El usuario ha sido creado con éxito"
    read -p "PRESIONE ENTER PARA CONTINUAR..."
}

#BAJA USUARIO
function baja_usuario(){
    read -p "Ingrese nombre del usuario que desee eliminar: " username
    echo
    if id "$username" &>/dev/home; then
    echo 
    sudo userdel -r "$username"
    else
    echo "Usuario '$username' inexistente"
    fi
    read -p "PRESIONE ENTER PARA CONTINUAR..."
}

#MODIFICAR USUARIO
function modificar_usuario (){
    read -p "Ingrese nombre del usuario que desee modificar: " username
    read -p "Ingrese nuevo nombre: " new_username
    if id "$username" &>/dev/null; then
    if [ -n "$new_username" ]; then
    sudo usermod -l "$new_username:$username"
    fi
    echo "El usuario '$username' cambió a '$new_username'"
    else 
    echo "El usuario '$username' no existe. No se pudo modificar"
    fi
    read -p "PRESIONE ENTER PARA CONTINUAR..."
}

# MENÚ PRINCIPAL
while true; do 
clear
echo "GESTIÓN DE USUARIOS"
echo "0) Salir"
echo "1) Alta usuario"
echo "2) Baja usuario"
echo "3) Modificar usuario"
read -p "Seleccione opción: " opcion
# LLAMADA A FUNCIONES
case $opcion in
0) exit;;
1) alta_usuario;;
2) baja_usuario;;
3) modificar_usuario;;
*) echo "OPCIÓN NO VALIDA"
esac
done

