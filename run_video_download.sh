#!/bin/bash

# Activate the virtual environment
source /home/neeraj/Public/neeraj/laravel_11/Laravel-python/magicTools/python-scripts/.venv/bin/activate

# Run the Python script with the provided URL
python3 /home/neeraj/Public/neeraj/laravel_11/Laravel-python/magicTools/python-scripts/tools/url_to_video.py "$1"
