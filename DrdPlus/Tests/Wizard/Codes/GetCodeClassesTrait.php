<?php
declare(strict_types = 1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace DrdPlus\Tests\Wizard\Codes;

use DrdPlus\Wizard\Codes\WizardCode;

/**
 * @method array|string[] scanForCodeClasses(string $rootDir, string $rootNamespace)
 */
trait GetCodeClassesTrait
{
    private static $codeClasses;

    /**
     * @return array|WizardCode[]
     */
    protected function getCodeClasses(): array
    {
        if (self::$codeClasses === null) {
            /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
            $codeReflection = new \ReflectionClass(WizardCode::class);
            $rootDir = dirname($codeReflection->getFileName());
            $rootNamespace = $codeReflection->getNamespaceName();

            self::$codeClasses = $this->scanForCodeClasses($rootDir, $rootNamespace);
        }

        return self::$codeClasses;
    }
}