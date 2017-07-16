#!/bin/bash

vendor/bin/phpunit test --coverage-html=coverage

if [ -z "$SHOW_COVERAGE" ]; then
    echo "Not Displaying Coverage"
else
    firefox coverage/index.html
fi