<?php

abstract class WidgetAbstract
{
    protected function viewLogic($viewData): void
    {
        $method = get_class($this) . '::' . __FUNCTION__;
        echo $method . " " . $viewData . "<br>";
    }
}

class WidgetBigProduct extends WidgetAbstract
{
    public function run(Product $product): void
    {
        $viewData = $this->getRealizationLogic($product);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic($product)
    {
        $id = $product->id;
        $fullTitle = $product->id . ' --- ' . $product->name;
        $description = $product->description;
        return $id . '::::' . $fullTitle . '::::' . $description;
    }
}

class WidgetMiddleProduct extends WidgetAbstract
{
    public function run(Product $product): void
    {
        $viewData = $this->getRealizationLogic($product);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic($product)
    {
        $id = $product->id;
        $middleTitle = $product->id . ' -- ' . $product->name;
        $description = $product->description;
        return $id . ' :: ' . $middleTitle . ' :: ' . $description;
    }
}

class WidgetSmallProduct extends WidgetAbstract
{
    public function run(Product $product): void
    {
        $viewData = $this->getRealizationLogic($product);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic($product)
    {
        $id = $product->id;
        $smallTitle = $product->id . ' - ' . $product->name;
        $description = $product->description;
        return $id . ' : ' . $smallTitle . ' : ' . $description;
    }
}

class WidgetBigCategory extends WidgetAbstract
{
    public function run(Category $category): void
    {
        $viewData = $this->getRealizationLogic($category);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic($category)
    {
        $id = $category->id;
        $fullTitle = $category->id . ' --- ' . $category->name;
        $description = $category->description;
        return $id . '::::' . $fullTitle . '::::' . $description;
    }
}

class WidgetMiddleCategory extends WidgetAbstract
{
    public function run(Category $category): void
    {
        $viewData = $this->getRealizationLogic($category);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic($category)
    {
        $id = $category->id;
        $middleTitle = $category->id . ' -- ' . $category->name;
        $description = $category->description;
        return $id . ' :: ' . $middleTitle . ' :: ' . $description;
    }
}

class WidgetSmallCategory extends WidgetAbstract
{
    public function run(Category $category): void
    {
        $viewData = $this->getRealizationLogic($category);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic($category)
    {
        $id = $category->id;
        $smallTitle = $category->id . ' - ' . $category->name;
        $description = $category->description;
        return $id . ' : ' . $smallTitle . ' : ' . $description;
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