<?php

namespace YukataRm\EnvLoader;

/**
 * Base Env Loader
 * 
 * @package YukataRm\EnvLoader
 */
abstract class BaseEnvLoader
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * path to .env file
     * 
     * @var string
     */
    protected string $path = __DIR__ . "/../../../../../";

    /**
     * constructor
     */
    function __construct()
    {
        $dotenv = Dotenv::createImmutable($this->path);

        $dotenv->safeLoad();

        $this->setEnv();
    }

    /**
     * set environment variables
     * 
     * @return void
     */
    abstract protected function setEnv(): void;

    /*----------------------------------------*
     * Get Environment Variable
     *----------------------------------------*/

    /**
     * load environment variable
     * 
     * @param string $key
     * @return string|null
     */
    protected function getEnv(string $key): string|null
    {
        return $_ENV[$key] ?? null;
    }

    /**
     * get environment variable as string
     * 
     * @param string $key
     * @param string $default
     * @return string
     */
    protected function getEnvString(string $key, string $default = ""): string
    {
        return $this->getEnv($key) ?? $default;
    }

    /**
     * get environment variable as string
     * if key does not exist, return null
     * 
     * @param string $key
     * @return string|null
     */
    protected function getEnvStringNullable(string $key): string|null
    {
        return $this->getEnv($key);
    }

    /**
     * get environment variable as integer
     * 
     * @param string $key
     * @param int $default
     * @return int
     */
    protected function getEnvInt(string $key, int $default = 0): int
    {
        $value = $this->getEnv($key);

        return is_null($value) ? $default : intval($value);
    }

    /**
     * get environment variable as integer
     * if key does not exist, return null
     * 
     * @param string $key
     * @return int|null
     */
    protected function getEnvIntNullable(string $key): int|null
    {
        $value = $this->getEnv($key);

        return is_null($value) ? null : intval($value);
    }

    /**
     * get environment variable as boolean
     * 
     * @param string $key
     * @param bool $default
     * @return bool
     */
    protected function getEnvBool(string $key, bool $default = false): bool
    {
        $value = $this->getEnv($key);

        return is_null($value) ? $default : boolval($value);
    }

    /**
     * get environment variable as boolean
     * if key does not exist, return null
     * 
     * @param string $key
     * @return bool|null
     */
    protected function getEnvBoolNullable(string $key): bool|null
    {
        $value = $this->getEnv($key);

        return is_null($value) ? null : boolval($value);
    }

    /**
     * get environment variable as floating point number
     * 
     * @param string $key
     * @param float $default
     * @return float
     */
    protected function getEnvFloat(string $key, float $default = 0.0): float
    {
        $value = $this->getEnv($key);

        return is_null($value) ? $default : floatval($value);
    }

    /**
     * get environment variable as floating point number
     * if key does not exist, return null
     * 
     * @param string $key
     * @return float|null
     */
    protected function getEnvFloatNullable(string $key): float|null
    {
        $value = $this->getEnv($key);

        return is_null($value) ? null : floatval($value);
    }
}
