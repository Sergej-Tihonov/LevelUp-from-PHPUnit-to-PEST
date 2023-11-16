# LevelUp-from-PHPUnit-to-PEST

# Websites
- https://phpunit.de/
- https://github.com/sebastianbergmann/phpunit
- https://packagist.org/packages/phpunit/phpunit

---

- https://pestphp.com/
- https://github.com/pestphp/pest
- https://packagist.org/packages/pestphp/pest

---

- https://jestjs.io/
- https://github.com/jestjs/jest


# Part 1

## Output
`./vendor/bin/phpunit`

`./vendor/bin/pest`

- compare success
- compare failure

---

## Filtering

- https://docs.phpunit.de/en/10.4/textui.html#selection
- https://pestphp.com/docs/filtering-tests
```
./vendor/bin/pest --bail
./vendor/bin/pest --retry
```

## Watch
https://pestphp.com/docs/plugins#content-watch
`composer require pestphp/pest-plugin-watch --dev`

```
./vendor/bin/pest --watch
```


## Test optimizing
https://pestphp.com/docs/optimizing-tests

Compact
```
./vendor/bin/pest --compact
```

Profiling
```
./vendor/bin/pest --profile
```

Parallel
```
./vendor/bin/pest --parallel
./vendor/bin/pest --parallel --processes=2
```

## Code coverage
- https://docs.phpunit.de/en/10.4/code-coverage.html
- https://pestphp.com/docs/test-coverage
- https://pestphp.com/docs/cli-api-reference#content-code-coverage

```
./vendor/bin/phpunit --help
./vendor/bin/phpunit --coverage-php test-coverage.php
./vendor/bin/pest --coverage
./vendor/bin/pest --coverage --min=90
```

## Type coverage
https://pestphp.com/docs/type-coverage
`composer require pestphp/pest-plugin-type-coverage --dev`

```
./vendor/bin/pest --type-coverage
./vendor/bin/pest --type-coverage --min=100
```

---

## Installation & Setup
- https://pestphp.com/docs/installation
- https://pestphp.com/docs/editor-setup
`./vendor/bin/pest --init`

```
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\CreatesApplication;

uses(Illuminate\Foundation\Testing\TestCase::class, CreatesApplication::class, LazilyRefreshDatabase::class)
    ->in('Feature');
uses(PHPUnit\Framework\TestCase::class)->in('Unit');
```

```
<?php

it('creates an empty test');

it('creates a test with content', function () {
    $this->assertTrue(true);
});
```

## Skipping

https://pestphp.com/docs/skipping-tests

```
it('has home', function () {
//
})->skip();
```

```
it('has home')->todo();
```

## Filtering 2

- https://docs.phpunit.de/en/10.4/textui.html#selection
- https://pestphp.com/docs/filtering-tests
- https://pestphp.com/docs/grouping-tests

```
->group('feature');
./vendor/bin/pest --group=integration,browser
./vendor/bin/pest --exclude-group=integration,browser
```


# Part 2

## Hooks
https://pestphp.com/docs/hooks

- beforeEach / after Each
- beforeAll / afterAll

PHPStorm live templates (custom)
- before
- after
- pest_freeze

## Describe blocks

https://pestphp.com/docs/pest-spicy-summer-release#content-describe-blocks
```
describe('guest', function () {
    test('can login', function () {
        // ...
    });
 
    // ...
});
```

## Exceptions
https://pestphp.com/docs/expectations#content-tothrow
```
expect(fn() => throw new Exception('Something happened.'))
  ->toThrow(Exception::class);
expect(fn() => throw new Exception('Something happened.'))
  ->toThrow('Something happened.');
expect(fn() => throw new Exception('Something happened.'))
  ->toThrow(Exception::class, 'Something happened.');
expect(fn() => throw new Exception('Something happened.'))
  ->toThrow(new Exception('Something happened.'));
```

## Datasets
https://pestphp.com/docs/datasets
```
it('has emails', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with(['first@example.com', 'other@example.com']);
```

## Expectations
https://pestphp.com/docs/expectations

```
test('sum', function () {
    $value = sum(1, 2);
 
    expect($value)->toBe(3); // Assert that the value is 3...
});

expect($value)
    ->toBeInt()
    ->toBe(3);

expect($value)
    ->toBeInt()
    ->toBe(3)
    ->not->toBeString()
    ->not->toBe(4);
```

## Migration
https://pestphp.com/docs/migrating-from-phpunit-guide
`composer require pestphp/pest-plugin-drift --dev`

```
./vendor/bin/pest --drift
```

# Part 3

## Architecture Tests
https://pestphp.com/docs/arch-testing

```
test('app')
    ->expect('App\Models')
    ->toBeClasses();
```

https://pestphp.com/docs/snapshot-testing
```
it('has a contact page', function () {
    $response = $this->get('/contact');
 
    expect($response)->toMatchSnapshot();
});
```

## Videos Nuno Maduro
PEST v1
- https://www.youtube.com/watch?v=MqiGA34ZrQU&ab_channel=GrUSP
- https://www.youtube.com/watch?v=A8uOxiSTvVQ&ab_channel=LaravelPodcast

PEST v2
- https://www.youtube.com/watch?v=9EGPo_enEc8&ab_channel=NunoMaduro
- https://www.youtube.com/watch?v=AkDMDHAs09U&ab_channel=Laravel
