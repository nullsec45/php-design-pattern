<?php


class Calculation{
    private $expression;

    public function __construct(string $expression){
        $this->expression=$expression;
    }

    public function getExpression(): string{
        return $this->expression;
    }
}

class LegacyCalculator{
    public function calculate(string $expression){
        try {
            $result = eval("return $expression;");
            return $result;
        } catch (ParseError $e) {
            return null; 
        }
    }
}

class CalculatorAdapter{
    private $calculator;

    public function __construct(LegacyCalculator $calculator){
        $this->calculator=$calculator;
    }

    public function calculate(Calculation $calculation){
        $expression=$calculation->getExpression();
        $result=$this->calculator->calculate($expression);
        return (int)$result;
    }
}

$calculation = new Calculation("2 + 3 * 4");
$calculator=new LegacyCalculator();
$adapter=new CalculatorAdapter($calculator);
$result=$adapter->calculate($calculation);

echo $result.PHP_EOL;