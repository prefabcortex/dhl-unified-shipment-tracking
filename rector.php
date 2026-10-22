<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\BooleanNot\NegatedAndsToPositiveOrsRector;
use Rector\CodeQuality\Rector\BooleanNot\SimplifyDeMorganBinaryRector;
use Rector\CodeQuality\Rector\ClassMethod\LocallyCalledStaticMethodToNonStaticRector;
use Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector;
use Rector\CodingStyle\Rector\ClassLike\NewlineBetweenClassLikeStmtsRector;
use Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\NarrowObjectReturnTypeRector;

// Automated refactoring checks for this package.
//
// The generated code passes this configuration with nothing to change. If `composer rector-check`
// proposes a change, the finding belongs upstream in the generator, not in a skip here — the next
// generation replaces every file it would touch.
return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/examples',
        __DIR__ . '/tests',
    ])
    ->withSkip([
        StringClassNameToClassConstantRector::class => [
            // The PSR-18 clients this package looks for are optional packages, named as text;
            // a `::class` would make it reference classes it does not require.
            __DIR__ . '/src/Http/HttpClientResolver.php',
        ],
        ClassPropertyAssignToConstructorPromotionRector::class => [
            // `$servers` carries a docblock of its own, which a promoted property would have to
            // carry inside the parameter list.
            __DIR__ . '/src/ClientConfig.php',
        ],
        // A return type states the role of what comes back, not the class a method happens to
        // build today; narrowed to that class, it would hold every caller to it.
        NarrowObjectReturnTypeRector::class,
        // `!($a && $b)` names one case — not both of these — and De Morgan dissolves it into
        // its parts.
        NegatedAndsToPositiveOrsRector::class,
        SimplifyDeMorganBinaryRector::class,
        // `private static` says that a helper touches no state of the object.
        LocallyCalledStaticMethodToNonStaticRector::class,
        // A caught exception is named for what it means where it is caught, not after its type.
        CatchExceptionNameMatchingTypeRector::class,
        // Blank lines are the code style fixer's to decide (`composer cs-check`); two tools with
        // rules of their own would keep undoing each other.
        NewlineAfterStatementRector::class,
        NewlineBetweenClassLikeStmtsRector::class,
        NewlineBeforeNewAssignSetRector::class,
    ])
    ->withParallel(600, 4, 48)
    ->withPhpSets()
    ->withSets([
        SetList::DEAD_CODE,
        SetList::CODING_STYLE,
        SetList::TYPE_DECLARATION,
        SetList::TYPE_DECLARATION_DOCBLOCKS,
        SetList::CODE_QUALITY,
        SetList::PRIVATIZATION,
    ]);
