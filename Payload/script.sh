#!/bin/bash
git pull origin `git rev-parse --abbrev-ref HEAD` 2>&1 | tee Payload/log.txt 
