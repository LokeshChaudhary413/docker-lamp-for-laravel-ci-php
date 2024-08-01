#!/bin/bash

args="$@"
command="php $args"
echo "$command"
docker exec -it -u devuser php-container bash -c "$command;"
