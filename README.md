Teto Collection Validator
=========================

This repository is experimental.

## Benchmark

Suffix `_10`/`_1000` means *length of the Array*.

```
% php --version
PHP 7.0.3 (cli) (built: Feb  6 2016 03:16:24) ( NTS )
Copyright (c) 1997-2016 The PHP Group
Zend Engine v3.0.0, Copyright (c) 1998-2016 Zend Technologies

% php ./vendor/bin/athletic -p ./tests/

Teto\CollectionValidator\StringBench
    Method Name             Iterations    Average Time      Ops/second
    ---------------------  ------------  --------------    -------------
    foreach_callable_10  : [     1,000] [0.0000009810925] [1,019,271.93196]
    foreach_if_10        : [     1,000] [0.0000008912086] [1,122,071.69609]
    typehint_10          : [     1,000] [0.0000005047321] [1,981,248.93718]
    foreach_callable_1000: [       100] [0.0000671696663] [   14,887.67259]
    foreach_if_1000      : [       100] [0.0000663876534] [   15,063.04184]
    typehint_1000        : [       100] [0.0000161123276] [   62,064.27937]


Teto\CollectionValidator\StringFailBench
    Method Name             Iterations    Average Time      Ops/second
    ---------------------  ------------  --------------    -------------
    foreach_callable_10  : [     1,000] [0.0000004541874] [2,201,734.38320]
    foreach_if_10        : [     1,000] [0.0000001759529] [5,683,338.75339]
    typehint_10          : [     1,000] [0.0000481393337] [   20,773.03366]
    foreach_callable_1000: [       100] [0.0000003933907] [2,542,002.42424]
    foreach_if_1000      : [       100] [0.0000002026558] [4,934,475.29412]
    typehint_1000        : [       100] [0.0426092553139] [       23.46908]

```

`typehint` validator win if if all the elements are valid.  However, it will very slow when the array has an invalid elements.  When `typehint` throw a TypeError exception, it will generate a huge back-trace.  When the number of elements too many, PHP will waste memory.

In addition, this benchmark indicates that the show is a high throughput more obvious if statement in the loop than call the callable object. (Since the future of PHP may show different performance, you should not be blind faith this result.)
