<?php

interface WidgetRealizationInterface
{
    public function getId(): int;
    public function getTitle(): string;
    public function getDescription();
}

class ProductWidgetRealization implements WidgetRealizationInterface
{
    private Product $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getId(): int
    {
        return $this->entity->id;
    }

    public function getTitle(): string
    {
        return $this->entity->name;
    }

    public function getDescription()
    {
        return $this->entity->description;
    }

}

class CategoryWidgetRealization implements WidgetRealizationInterface
{
    private Category $entity;

    public function __construct(Category $category)
    {
        $this->entity = $category;
    }

    public function getId(): int
    {
        return $this->entity->id;
    }

    public function getTitle(): string
    {
        return $this->entity->name;
    }

    public function getDescription()
    {
        return $this->entity->description;
    }
}

class ClientWidgetRealization implements WidgetRealizationInterface
{
    private Client $entity;

    public function __construct(Client $client)
    {
        $this->entity = $client;
    }

    public function getId(): int
    {
        return $this->entity->id;
    }

    public function getTitle(): string
    {
        return $this->entity->name;
    }

    public function getDescription()
    {
        return $this->entity->bio;
    }
}

abstract class WidgetAbstract
{
    protected WidgetRealizationInterface $realization;

    public function setRealization(WidgetRealizationInterface $realization): void
    {
        $this->realization = $realization;
    }

    protected function viewLogic($viewData): void
    {
        $method = get_class($this) . '::' . __FUNCTION__;
        echo $method . " " . $viewData . "<br>";
    }
}

class WidgetBigAbstraction extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization): void
    {
        $this->setRealization($realization);
        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    private function getViewData(): string
    {
        return $this->realization->getId() . '::::' . $this->getFullTitle() . '::::' . $this->realization->getDescription();
    }

    private function getFullTitle()
    {
        return $this->realization->getId() . ' --- ' . $this->realization->getTitle();
    }
}

class WidgetMiddleAbstraction extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization): void
    {
        $this->setRealization($realization);
        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    private function getViewData(): string
    {
        return $this->realization->getId() . ':' . $this->getFullTitle() . ':' . $this->realization->getDescription();
    }

    private function getFullTitle()
    {
        return $this->realization->getId() . ' - ' . $this->realization->getTitle();
    }
}

class WidgetSmallAbstraction extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization): void
    {
        $this->setRealization($realization);
        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    private function getViewData(): string
    {
        return $this->realization->getId() . '::' . $this->getFullTitle() . '::' . $this->realization->getDescription();
    }

    private function getFullTitle()
    {
        return $this->realization->getId() . ' -- ' . $this->realization->getTitle();
    }
}

class Product
{
    public int $id = 1;
    public string $name = 'Product name';
    public string $description = 'Product description';
}

class Category
{
    public int $id = 5;
    public string $name = 'Category name';
    public string $description = 'Category description';
}

class Client
{
    public int $id = 100;
    public string $name = 'Client name';
    public string $bio = 'Client biography';
}