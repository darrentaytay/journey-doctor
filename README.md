# Journey Doctor

## Installation Guide

This project ships with a Vagrantfile, which, in conjunction with Vagrant & VirtualBox, allows Developers to launch a pre-configured VirtualMachine.

With Vagrant & VirtualBox downloaded and installed, navigate to the root of the project and run;

`vagrant up`

This might take some time, but when it's done, all dependencies should be installed and the project should be ready to run.

## Running Tests

To run the unit tests, SSH into the vagrant box via the root of the project:

`vagrant ssh`

Then navigate to the vagrant folder once inside the Virtual Machine:

`cd /vagrant`

Then simply run:

`vendor/bin/phpunit`
