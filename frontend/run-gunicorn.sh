#!/usr/bin/env bash
gunicorn app:app -w 2 --bind 0.0.0.0:8300 --reload --log-level debug

