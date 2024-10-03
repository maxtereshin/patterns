<?php

interface ButtonInterface
{
    public function draw();
}
interface CheckBoxInterface
{
    public function draw();
}

interface GuiFactoryInterface
{
    /**
     * @return ButtonInterface
     */
    public function buildButton(): ButtonInterface;
    /**
     * @return CheckBoxInterface
     */
    public function buildCheckBox(): CheckBoxInterface;
}
class GuiKitFactory
{

    /**
     * @param string $type
     * @return GuiFactoryInterface
     * @throws Exception
     */
    public function getFactory(string $type): GuiFactoryInterface
    {
        return match ($type) {
            'bootstrap' => new BootstrapFactory(),
            'semanticui' => new SemanticUIFactory(),
            default => throw new Exception("Unknown factory type [{$type}]"),
        };
    }

}

class BootstrapFactory implements GuiFactoryInterface
{

    /**
     * @return ButtonInterface
     */
    public function buildButton(): ButtonInterface
    {
        return new ButtonBootstrap();
    }

    /**
     * @return CheckBoxInterface
     */
    public function buildCheckBox(): CheckBoxInterface
    {
        return new CheckBoxBootstrap();
    }
}

class SemanticUIFactory implements GuiFactoryInterface
{
    /**
     * @return ButtonInterface
     */
    public function buildButton(): ButtonInterface
    {
        return new ButtonSemanticUI();
    }

    /**
     * @return CheckBoxInterface
     */
    public function buildCheckBox(): CheckBoxInterface
    {
        return new CheckBoxSemanticUI();
    }
}

class ButtonBootstrap implements ButtonInterface
{
    public function draw()
    {
        echo 'Draw Button Bootstrap<br>';
        return "<button class='btn btn-success'>Button</button>";
    }

}

class CheckBoxBootstrap implements CheckBoxInterface
{
    public function draw()
    {
        echo 'Draw CheckBox Bootstrap<br>';
        return "<div class='form-check'>
                    <input type='checkbox' class='form-check-input' id='exampleCheck1'>
                    <label class='form-check-label' for='exampleCheck1'>Check me out</label>
                </div>";
    }
}

class ButtonSemanticUI implements ButtonInterface
{
    public function draw()
    {
        echo 'Draw Button SemanticUI<br>';
        return "<button class='ui green button'>Button</button>";
    }
}

class CheckBoxSemanticUI implements CheckBoxInterface
{
    public function draw()
    {
        echo 'Draw CheckBox SemanticUI<br>';
        return "<div class='ui checkbox checked'>
                    <input type='checkbox' tabindex='0' class='hidden'>
                    <label>I agree to the Terms and Conditions</label>
                </div>";
    }
}
