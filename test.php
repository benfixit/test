<?php
interface Observer{
  public function addCurrency(Currency $currency);
}

class priceSimulator implements Observer{
  private $currencies;

  public function __construct(){
    $this->currencies = array();
  }

  public function addCurrency(Currency $currency){
    array_push($this->currencies, $currency);
  }

  public function updatePrice(){
    foreach ($this->currencies as $currency) {
      $currency->update();
    }
  }
}

interface Currency{
  public function update();
  public function getPrice();
}

class Pound implements Currency{
  private $price;

  public function __construct($price){
    $this->price = $price;
    echo "<p>Pound Original Price: {$price}</p>";
  }

  public function update(){
    $this->price = $this->getPrice();
    echo "<p>Pound Updated Price : {$this->price}</p>";
  }

  public function getPrice(){
    return f_rand(0.65, 0.71);
  }
}
