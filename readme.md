# Unraid Scripts

This is a cli utility for running unraid based utility scripts via php & docker

## Requirements

This script has been designed to run from unraid, however you can use this utility on any nix* based system with docker installed (untested currently)

## Installation

Firstly create a new directory where you would like to install the cli tool

wget

```bash
curl -O https://raw.githubusercontent.com/benrowe/unraid-scripts/master/cli
chmod +x cli
./cli init
```
## How to use

    ./cli

from the installed directory

## How to add your own scripts/contribute

## Notes

- commands begging with `cli:` are reserved for the cli system, do not build commands that start with this prefix.
