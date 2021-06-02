Lamoda CRPT ISMP Api Client
==========================

[![Build Status](https://travis-ci.org/lamoda/crpt-ismp-api-client.svg?branch=master)](https://travis-ci.org/lamoda/crpt-ismp-api-client)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lamoda/crpt-ismp-api-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/lamoda/crpt-ismp-api-client/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/lamoda/crpt-ismp-api-client/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lamoda/crpt-ismp-api-client/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/lamoda/crpt-ismp-api-client/badges/build.png?b=master)](https://scrutinizer-ci.com/g/lamoda/crpt-ismp-api-client/build-status/master)
[![Build Status](https://github.com/lamoda/crpt-ismp-api-client/workflows/CI/badge.svg?branch=master)](https://github.com/lamoda/crpt-ismp-api-client/workflows/CI/badge.svg?branch=master)

## Installation

### Composer

```sh
composer require lamoda/crpt-ismp-api-client
```

## Description

This library implements API client for the Labeling and Traceability Information System
(or "Информационная система маркировки и прослеживаемости" in Russian, ISMP) of the CRPT (https://markirovka.crpt.ru)

Library implements V3 and V4 version of ISMP Api's

Currently this client implements just a subset of the ISMP Api methods.

## Usage

```php
<?php

use GuzzleHttp\Client;
use Lamoda\IsmpClient\Impl\Serializer\SymfonySerializerAdapterFactory;
use Lamoda\IsmpClient\V3\IsmpApi;

$client = new Client([
    // Uri to your OMS
    'base_uri' => 'http://ismp_uri',
    'timeout'  => 2.0,
]);

$serializer = SymfonySerializerAdapterFactory::create();

$api = new IsmpApi($client, $serializer);

// Call api methods...

```
