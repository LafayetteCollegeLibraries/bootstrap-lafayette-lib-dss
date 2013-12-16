#!/bin/bash

if [[ -f bootstrap_dss_islandora_dev.info  ]] ; then
    mv bootstrap_dss_islandora_dev.info bootstrap_lafayette_lib_dss.info
fi

sed -i 's/bootstrap_dss_islandora_dev/bootstrap_lafayette_lib_dss/' template.php
sed -i 's/bootstrap_dss_islandora_dev/bootstrap_lafayette_lib_dss/' includes/*inc
