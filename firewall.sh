#!/bin/bash

#Recogida de IP privada LB
IPLB=`openstack stack output show -c output_value -f value stackscenario lb_private_ip`

#Recogida del puerto del gateway de la subnet1
PORT=`openstack port list --fixed-ip subnet=subnet1,ip-address=10.1.1.1 -c ID -f value`


#Creacion de Rules
openstack firewall group rule create --protocol tcp --destination-port 80 --destination-ip-address $IPLB --action allow --name fw_rule_lb
openstack firewall group rule create --protocol tcp --destination-port 2020 --destination-ip-address 10.1.1.13 --action allow --name fw_rule_admin
openstack firewall group rule create --protocol any --source-ip-address 10.1.1.0/24 --action allow --name fw_rule_net1

#Creacion de policy
openstack firewall group policy create --firewall-rule "fw_rule_lb" fwcnvr

#Creacion de grupo de firewall
openstack firewall group create --ingress-firewall-policy "fwcnvr" --port $PORT --enable

#Adicción de reglas obligatorias
openstack firewall group policy add rule fwcnvr "fw_rule_admin"
openstack firewall group policy add rule fwcnvr "fw_rule_net1"
