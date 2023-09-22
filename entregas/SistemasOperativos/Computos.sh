#!/bin/bash

#FUNCION LOGIN
function login (){
    echo
    sh login.sh
}

#FUNCION LOGS
function logs (){
    echo 
    sh logs.sh
}

#FUNCION RESPALDO
function respaldo (){
    echo 
    sh Respaldo.sh
}

#FUNCION ABMusuarios
function abm (){
    echo
    sh ABMusuarios.sh
}

# MENÚ PRINCIPAL
while true; do 
clear
echo "CENTRO DE COMPUTOS"
echo "------------------"
echo "0) Salir"
echo "1) login"
echo "2) logs"
echo "3) Respaldo"
echo "4) Gestion de usuarios"
read -p "Seleccione opción: " opcion

# LLAMADA A FUNCIONES
case $opcion in
0) exit;;
1) login;;
2) logs;;
3) respaldo;;
4) abm;;
*) echo "OPCIÓN NO VALIDA"
esac
done
