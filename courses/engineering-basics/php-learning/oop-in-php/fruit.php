
<?php

class Fruit {
    public string $name;
    public string $color;
    private string $id;

    function setName(string $name) {
        $this->name = $name;
    }

    function setColor(string $color) {
        $this->color = $color;
    }
}