<?php
abstract class Button {
  protected $html;

  public function getHtml(){
    return $this->html;
  }
}

class ImageButton extends Button
{
  protected $html = "This is an Image Button";
}

class InputButton extends Button
{
  protected $html = "This is an Input Button";
}

class FlashButton extends Button
{
  protected $html = "This is an Flash Button";
}

/**
 *
 */
class ButtonFactory
{
  public static function createButton($type){
    $baseClass = 'Button';
    $targetClass = ucfirst($type).$baseClass;

    if (class_exists($targetClass) && is_subclass_of($targetClass, $baseClass)) {
      return new $targetClass;
    }else {
    	trigger_error("The button type of '$type' is not recognized.", E_USER_NOTICE);
      //throw new Exception("The button type of '$type' is not recognized.");

    }
  }
}

$instance = ButtonFactory::createButton("flash");
echo $instance->getHtml();
echo "<p>Button Created.</p>";
