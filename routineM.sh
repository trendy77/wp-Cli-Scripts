#! /bin/bash

ssh organ151@organisemybiz.com
cd Scripts  
php routineM.php
ssh ckww@customkitsworldwide.com
cd Scripts
php routineCK.php
    echo -e "\n ALL DONE \n"
exit 0
fi