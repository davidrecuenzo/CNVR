#!/bin/bash
cd /mnt/tmp
/lab/cnvr/bin/get-openstack-tutorial.sh
cd openstack_lab-stein_4n_classic_ovs-v06/
sudo vnx -f openstack_lab.xml --create
sudo vnx -f openstack_lab.xml -x start-all,load-img
#Recogida de red que conecta con el exterior en el lab
EXT=`ip a | grep 138.4 | awk '{print $7}'`
sudo vnx_config_nat ExtNet $EXT


