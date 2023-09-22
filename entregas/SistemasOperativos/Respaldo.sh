#!/bin/bash

# COPIAR /etc
function copy_etc() {
    etc_destino="home/root/copias/etc"
    mkdir -p "$etc_destino"
    cp -r /etc/. "$etc_destino"
    echo "Copiando /etc..."
    sleep 4
    echo "/etc Copiado"
    read -p "PRESIONE ENTER PARA CONTINUAR..."
}

# COPIAR BASE DE DATOS
function copy_db() {
    db_destino="/home/root/copias/database"
    mkdir -p "$db_destino"
    read -p "Ingrese nombre de la base de datos" db_name
    mysqldump "$db_name" > "$db_destino/$db_name.sql"
    echo "copiando base de datos..."
    sleep 4
    echo "base de datos copiada"
    read -p "PRESIONE ENTER PARA CONTINUAR..."
    }

# COPIAR /var
function copy_var() {
    var_destino="/home/root/copias/var"
    mkdir "$var_destino"
    cp -r /var/. "$var_destino"
    echo "Copiando /var"
    sleep 4
    echo "/var Copiado"
    read -p "PRESIONE ENTER PARA CONTINUAR..."
    }

#FUNCION PARA SINCRONIZAR
function sincronizar() {
    destino_remoto="usuario@servidor:/ruta/destino/remoto"

    #/etc
    rsync -avz /home/root/copias/etc/*.tar.gz "$destino_remoto/etc/"

    # base de datos
    rsync -avz /home/root/copias/database/*.sql "$destino_remoto/db/"

    #/var
    rsync -avz /home/root/copias/var/*.tar.gz "$destino_remoto/var/"
}

# Menú principal
while true; do
    clear
    echo "Bienvenido al Centro de Cómputo"
    echo "0) salir"
    echo "1) Copiar directorio /etc"
    echo "2) Copiar base de datos"
    echo "3) Copiar directorio /var "
    read -p "Seleccione opción:" opcion
     

    case $opcion in
        0) exit;;
        1) copy_etc;;
        2) copy_db;;
        3) copy_var;;
        *) echo "OPCIÓN NO VÁLIDA";;
    esac
    sincronizar
done
