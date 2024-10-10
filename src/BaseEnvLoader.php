<?php

namespace YukataRm\EnvLoader;

use YukataRm\Entity\ArrayEntity;

use Dotenv\Dotenv;

/**
 * Base Env Loader
 * 
 * @package YukataRm\EnvLoader
 */
abstract class BaseEnvLoader extends ArrayEntity
{
    /*----------------------------------------*
     * Constants
     *----------------------------------------*/

    /**
     * key name prefix default value
     * 
     * @var string
     */
    const KEY_PREFIX_DEFAULT = "YR_";

    /*----------------------------------------*
     * Properties
     *----------------------------------------*/

    /**
     * path to .env file
     * 
     * @var string
     */
    protected string $path = __DIR__ . "/../../../../../";

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     */
    public function __construct()
    {
        $this->init();

        $this->setData($_ENV);

        $this->bind();
    }

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * init Dotenv
     * 
     * @return void
     */
    protected function init(): void
    {
        $dotenv = Dotenv::createImmutable($this->path);

        $dotenv->safeLoad();
    }

    /**
     * bind .env parameters
     * 
     * @return void
     */
    abstract protected function bind(): void;

    /**
     * get property
     * 
     * @param string $name
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        return $this->$name();
    }
}
