#!/bin/bash

ACTION=$1

if [ $ACTION == "ON" ]
then
	openstack firewall group policy add rule fwcnvr "fw_rule_admin"
fi

if [ $ACTION == "OFF" ]
then
	openstack firewall group policy remove rule fwcnvr "fw_rule_admin"
fi
