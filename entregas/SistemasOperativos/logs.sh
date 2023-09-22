#!/bin/bash

#COMANDOS
mostrar_menu() {
    clear
    echo "Gestión de Comandos de Auditoría y Logs"
    echo "---------------------------------------"
    echo "0) Salir"
    echo "1) who"
    echo "2) w"
    echo "3) last"
    echo "4) lastlog"
    echo "5) lastb"
}

# EJECUTAR
ejecutar_comando() {
    read -p "Seleccione opcion: " opcion

    case $opcion in
        
        0)
            echo "¡Hasta luego!"
            exit
            ;;
        1)
            echo "Ejecutando 'who'..."
            who
            ;;
        2)
            echo "Ejecutando 'w'..."
            w
            ;;
        3)
            echo "Ejecutando 'last'..."
            last
            ;;
        4)
            echo "Ejecutando 'lastlog'..."
            lastlog
            ;;
        5)
            echo "Ejecutando 'lastb'..."
            lastb
            ;;
        
        *)
            echo "Opción no válida. Por favor, seleccione una opción válida."
            ;;
    esac

    read -p "Presione Enter para continuar..."
}

#MENU
while true; do
    mostrar_menu
    ejecutar_comando
done
