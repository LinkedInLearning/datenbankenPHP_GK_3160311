<?php
class kunde
{
    private string $name;
    public string $farbschema;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function begruessen(): void
    {
        echo 'Hallo ' . $this->name . ' <br>';
    }
}

$fritz = new Kunde('Fritz');
$fritz->begruessen();
$fritz->farbschema = 'hell';
echo 'Farbschema: ' . $fritz->farbschema;
