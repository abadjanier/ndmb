#!/bin/bash
# -*- ENCONDING: UTF-8 -*-
cd ..
app/console doctrine:database:drop --force
app/console doctrine:database:create
app/console doctrine:schema:create


app/console cache:clear
app/console assets:install

#app/console -n doctrine:migrations:migrate


exit