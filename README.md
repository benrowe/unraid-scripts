# Unraid Scripts

This is a command line interface (cli) utility for running
`symfony/console` commands within a docker container.

You can easily write your own command's using the `symfony/console` package constructs. These commands will be available via the `./cli` script which will run the command inside a docker container.

If your commands require additional dependancies, you can specify them in the composer.json file provided.

In addition to this, the command will boot a docker container that provides a webhook interface to remotely execute the commands you build. This can be configured by the provided `config.yml`

## Requirements

This script has been designed to run from unraid, however you can use this utility on any nix* based system with docker installed (untested currently)

## Installation

Firstly create a new directory where you would like to install the cli tool

### WGET

```bash
wget https://raw.githubusercontent.com/benrowe/unraid-scripts/master/cli
chmod +x cli
./cli init
```
### CURL

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

- commands beginning with `cli:` are reserved for the cli system, do not build commands that start with this prefix.
