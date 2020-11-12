<?php

namespace Kusabi\Container;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    /**
     * The items in the container
     *
     * @var array
     */
    protected $items = [];

    /**
     * Delete an item in the container
     *
     * @param string $id
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     *
     * @return void
     */
    public function delete(string $id)
    {
        if (!isset($this->items[$id])) {
            throw new NotFoundException($id);
        }
        unset($this->items[$id]);
    }

    /**
     * {@inheritDoc}
     *
     * @see ContainerInterface::get()
     */
    public function get($id)
    {
        if (!isset($this->items[$id])) {
            throw new NotFoundException($id);
        }
        if (is_callable($this->items[$id])) {
            return $this->items[$id]($this);
        }
        return $this->items[$id];
    }

    /**
     * {@inheritDoc}
     *
     * @see ContainerInterface::has()
     */
    public function has($id)
    {
        return isset($this->items[$id]);
    }

    /**
     * Set an item in the container
     *
     * @param string $id
     * @param mixed $value
     *
     * @return void
     */
    public function set(string $id, $value)
    {
        $this->items[$id] = $value;
    }

    /**
     * Set an item in the container
     *
     * @param string $id
     * @param mixed $value
     *
     * @return void
     */
    public function setReference(string $id, &$value)
    {
        $this->items[$id] = &$value;
    }
}
