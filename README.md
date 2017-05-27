# Journey Doctor

![StyleCI Shield](https://styleci.io/repos/92410773/shield)
[![Build Status](https://travis-ci.org/dtisgodsson/journey-doctor.svg?branch=master)](https://travis-ci.org/dtisgodsson/journey-doctor)

## Installation guide

This project ships with a Vagrantfile, which, in conjunction with Vagrant & VirtualBox, allows Developers to launch a pre-configured VirtualMachine.

With Vagrant & VirtualBox downloaded and installed, navigate to the root of the project and run;

`vagrant up`

This might take some time, but when it's done, all dependencies should be installed and the project should be ready to run.

## Tests

### phpUnit

I've used phpUnit for unit testing and also a single integration tests which shows all of the components working together.

### Running the tests

To run the unit tests, SSH into the vagrant box via the root of the project:

`vagrant ssh`

Then navigate to the vagrant folder once inside the Virtual Machine:

`cd /vagrant`

Then simply run:

`vendor/bin/phpunit`

## Running the code

An example of how this code may be run is as follows:

```
$builder                = new BoardingPassCollectionBuilder;
$boardingPassCollection = $builder->fromJson(file_get_contents('sampledata.json'))->build();
$sorted                 = (new BoardingPassCollectionSorter($boardingPassCollection))->sort();

$journey                = new Journey($sorted);
echo $journey;
```

## Extending the code

### Adding more boarding pass types

To add a new Boarding Pass, you would simply create a new class insside the `BoardingPass/` directory. This class should extend the `AbstractBoardingPass` base class which, in turn, implements the `BoardingPassInterface`. The `BoardingPassInterface` ensures that all boarding passes provide a method of returning the start location, the end location and optionally, a seat.

## Code design

### Telescoping constructor anti pattern

When constructing BoardingPasses, I've opted to use `builder` type methods rather than provide too many options to the class constructors. As defined in the `AbstractBoardingPass` class, the constructor simply accepts a start location, end location and a seat number as generic information that could be applied to any means of transport.

## Assumptions

* This assumes an unbroken chain of boarding cards.
* This assumes all boarding passes have a start & end location.

## Time spent

I admittedly spend nearly 5 hours on this.
