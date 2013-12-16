#!/bin/bash

if [[ -f bootstrap_lafayette_lib_dss.info  ]] ; then

    mv bootstrap_lafayette_lib_dss.info bootstrap_dss_digital.info
fi

sed -i 's/bootstrap_lafayette_lib_dss/bootstrap_dss_digital/' template.php
sed -i 's/bootstrap_lafayette_lib_dss/bootstrap_dss_digital/' includes/*inc
