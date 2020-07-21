<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/21
 * Time: 16:20
 */

namespace Cmd;


use League\Container\Container;
use League\Container\ContainerAwareInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use League\Container\ServiceProvider\ServiceProviderInterface;
use Psr\Container\ContainerInterface;

class ContiProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @return void
     */
    public function boot()
    {
        // TODO: Implement boot() method.
    }

    /**
     * Set a container
     *
     * @param ContainerInterface $container
     *
     * @return self
     */
    public function setContainer(ContainerInterface $container): self
    {
        // TODO: Implement setContainer() method.
    }

    /**
     * Get the container
     *
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        // TODO: Implement getContainer() method.
    }

    /**
     * Set a container. This will be removed in favour of setContainer receiving Container in next major release.
     *
     * @param Container $container
     *
     * @return self
     */
    public function setLeagueContainer(Container $container): self
    {
        // TODO: Implement setLeagueContainer() method.
    }

    /**
     * Get the container. This will be removed in favour of getContainer returning Container in next major release.
     *
     * @return Container
     */
    public function getLeagueContainer(): Container
    {
        // TODO: Implement getLeagueContainer() method.
    }

    /**
     * Returns a boolean if checking whether this provider provides a specific
     * service or returns an array of provided services if no argument passed.
     *
     * @param string $service
     *
     * @return boolean
     */
    public function provides(string $service): bool
    {
        // TODO: Implement provides() method.
    }

    /**
     * Use the register method to register items with the container via the
     * protected $this->leagueContainer property or the `getLeagueContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    /**
     * Set a custom id for the service provider. This enables
     * registering the same service provider multiple times.
     *
     * @param string $id
     *
     * @return self
     */
    public function setIdentifier(string $id): ServiceProviderInterface
    {
        // TODO: Implement setIdentifier() method.
    }

    /**
     * The id of the service provider uniquely identifies it, so
     * that we can quickly determine if it has already been registered.
     * Defaults to get_class($provider).
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        // TODO: Implement getIdentifier() method.
    }
}