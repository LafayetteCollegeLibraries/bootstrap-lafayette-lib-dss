#!/bin/bash

mv bootstrap_dss_islandora_dev.info bootstrap_lafayette_lib_dss.info

sed -i 's/bootstrap_dss_islandora_dev/bootstrap_lafayette_lib_dss/' template.php
sed -i 's/bootstrap_dss_islandora_dev/bootstrap_lafayette_lib_dss/' includes/*inc
