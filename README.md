# PROYECTO FINAL DE LA ASIGNATURA CNVR
# DESPLIEGUE AUTOMÁTICO DE UN ESCENARIO EN LA PLATAFORMA OPENSTACK MEDIANTE LA ORQUESTACIÓN BASADA EN PLANTILLAS HEAT

El proyecto ha sido elaborado por los integrantes del grupo 7 de la asignatura:
- David Recuenzo Bermejo
- Adriana de Pablo Moreno
- Alejandro Rodríguez González

### Despliegue del escenario

Para comenzar a desplegar el escenario debemos ejecutar el script ```cnvrLaunchOpenstack.sh``` con el que se desplegará y configurará la plataforma Openstack.
```sh
$ cd TrabajoFinalCNVRGrupo07
$ ./cnvrLaunchOpenstack.sh
```

Antes de continuar, ha de copiarse en el directorio “openstack_lab-stein_4n_classic_ovs-v06" los siguientes scripts y directorios:
- Directorio Imágenes que contiene las imágenes ```image-xenial-server```, ```image-xenial-bbdd``` e ```image-xenial-admin```.
- Directorio cloud_init que contiene los scripts “admin.yaml”, ```server1.yaml```, ```server2.yaml``` y ```server3.yaml``` que contiene la configuración del user_data.
- Plantilla HEAT del escenario que se va a desplegar, ```trabajofinalcnvr.yml```.
- Script para configurar el firewall, ```firewall.sh```.
- Script para habilitar/deshabilitar la regla de acceso ssh a la instancia del administrador, ```ssh_rule_fw.sh```.

Finalmente, se debe ejecutar el script ```cnvrLaunchScenario.sh``` con el que se desplegará y configurará el escenario implementado mediante la orquestación con plantillas HEAT.
```sh
$ ./cnvrLaunchScenario.sh
```

Para cambiar la configuración de la regla de acceso mediante SSH a la instancia del administrador hay que ejecutar el script ```ssh_rule_fw.sh``` seguido del parámetro ON/OFF si se quiere habilitar o deshabilitar la regla del firewall:

```sh
$ cd /mnt/tmp/openstack_lab-stein_4n_classic_ovs-v06
$ ./ssh_rule_fw.sh ON
$ ./ssh_rule_fw.sh OFF
```
