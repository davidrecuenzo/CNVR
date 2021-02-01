#!/bin/bash

#Subida de imágenes
cd /mnt/tmp/openstack_lab-stein_4n_classic_ovs-v06
source bin/admin-openrc.sh
echo "Subiendo la imagen de los server..."
glance image-create --name "image-xenial-server" --file Imagenes/image-xenial-server --disk-format qcow2 --container-format bare --visibility public --progress
echo "Subiendo la imagen del admin..."
glance image-create --name "image-xenial-admin" --file Imagenes/image-xenial-admin --disk-format qcow2 --container-format bare --visibility public --progress
echo "Subiendo la imagen de la BBDD..."
glance image-create --name "image-xenial-bbdd" --file Imagenes/image-xenial-bbdd --disk-format qcow2 --container-format bare --visibility public --progress

#Lanzamiento de stack
source bin/demo-openrc.sh
echo "Creación del Stack del escenario..."
openstack stack create -t trabajofinalcnvr.yml stackscenario
sleep 150

#Creación de firewall
echo "Configuramos el Firewall..."
./firewall.sh

#Devolucion de IP Flotantes del Proyecto
IPFLB=`openstack stack output show -c output_value -f value stackscenario lb_floating_ip`
IPFADMIN=`openstack stack output show -c output_value -f value stackscenario server_admin_floating_ip`
echo "La IP FLotante del Balanceador de carga es: $IPFLB"
echo "La IP Flotante del ADMIN es $IPFADMIN"



