<?php

abstract class calculator_abstract
{
    abstract public function calculate();
    abstract public function setVar();
}

class calculator_loan extends calculator_abstract
{
    private $class_amount;
    private $class_interest_rate;
    private $class_loan_period;
    private $class_payment_method;

    public function __construct()
    {
        $this->class_amount = $_POST['amount'];
        $this->class_interest_rate = $_POST['interest_rate'] / 100;
        $this->class_loan_period = $_POST['loan_period'];
        $this->class_payment_method = $_POST['payment_method'];
    }

    public function setVar()
    {
        if (isset($_POST['amount']) && isset($_POST['interest_rate']) && isset($_POST['loan_period']) && isset($_POST['payment_method']))
        {
            $this->class_amount = $_POST['amount'];
            $this->class_interest_rate = $_POST['interest_rate'] / 100;
            $this->class_loan_period = $_POST['loan_period'];
            $this->class_payment_method = $_POST['payment_method'];
        }
    }

    function calculate()
    {
        $amount = $this->class_amount;
        $interest_rate = $this->class_interest_rate;
        $loan_period = $this->class_loan_period;
        $payment_method = $this->class_payment_method;

        if ($payment_method === 'equal_installments') {
            // Obliczanie równych rat
            $monthly_interest_rate = $interest_rate / 12;
            $num_payments = $loan_period * 12;
            $monthly_payment = ($amount * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$num_payments));
            $total_payment = $monthly_payment * $num_payments;

            //getTextInLanguage("Calculator_investment", getLanguageCookie(), "Kalkulator lokat");
            echo '<div class="result">';
            echo  getTextInLanguage("Monthly_payment", getLanguageCookie(), "Miesięczna rata").': '.number_format($monthly_payment, 2) . ' PLN<br>';
            echo  getTextInLanguage("Total_interest", getLanguageCookie(), "Całkowita kwota do spłaty") . ': '. number_format($total_payment, 2) . ' PLN';
            echo '</div>';
        } elseif ($payment_method === 'decreasing_installments') {
            // Obliczanie malejących rat
            $monthly_interest_rate = $interest_rate / 12;
            $num_payments = $loan_period * 12;
            $principal_payment = $amount / $num_payments;
            $total_payment = 0;

            echo '<div class="result">';
            echo getTextInLanguage("Decreasing_installments", getLanguageCookie(), "Malejące raty").':<br>';

            echo '<div class="scroll">';
            for ($i = 1; $i <= $num_payments; $i++) {
                $interest_payment = $amount * $monthly_interest_rate;
                $monthly_payment = $principal_payment + $interest_payment;
                $amount -= $principal_payment;
                $total_payment += $monthly_payment;

                echo getTextInLanguage("Payment", getLanguageCookie(), "Rata") . " " . $i . ': ' . number_format($monthly_payment, 2) . ' PLN<br>';
            }
            echo '</div>';
            echo  getTextInLanguage("Total_Interest", getLanguageCookie(), "Całkowita kwota do spłaty").': ' . number_format($total_payment, 2) . ' PLN';
            echo '</div>';
        }
    }
}

class calculator_investment extends calculator_abstract
{
    private $class_investment_amount;
    private $class_interest_rate;
    private $class_compounding_period;
    private $class_investment_period;
    public function __construct()
    {
        echo "construct";
        $this->class_investment_amount = $_POST['investment_amount'];
        $this->class_interest_rate = $_POST['interest_rate'] / 100;;
        $this->class_compounding_period = $_POST['compounding_period'];
        $this->class_investment_period = $_POST['investment_period'];
    }

    public function setVar()
    {
        if (isset($_POST['investment_amount']) && isset($_POST['interest_rate']) && isset($_POST['compounding_period']) && isset($_POST['investment_period']))
        {
            $this->class_investment_amount = $_POST['investment_amount'];
            $this->class_interest_rate = $_POST['interest_rate'] / 100;;
            $this->class_compounding_period = $_POST['compounding_period'];
            $this->class_investment_period = $_POST['investment_period'];
        }
    }

    function calculate()
    {
        $investment_amount = $this->class_investment_amount;
        $interest_rate = $this->class_interest_rate;
        $compounding_period = $this->class_compounding_period;
        $investment_period= $this->class_investment_period;

        $num_compoundings = $investment_period * 12 / $compounding_period;
        $compound_interest = $investment_amount * pow(1 + ($interest_rate / $compounding_period), $num_compoundings);
        $total_value = round($compound_interest, 2);

        echo '<div class="result">';
        echo  getTextInLanguage("Future_value", getLanguageCookie(), "Przyszła wartość inwestycji"). ': ' . number_format($total_value, 2) . ' PLN';
        echo '</div>';
    }
}

class calculator_currency extends calculator_abstract
{
    private $class_amount;
    private $class_from_currency;
    private $class_to_currency;

    public function __construct()
    {
        $this->class_amount = $_POST['currency_amount'];
        $this->class_from_currency = $_POST['from_currency'];
        $this->class_to_currency = $_POST['to_currency'];
    }

    public function setVar()
    {
        if (isset($_POST['currency_amount']) && isset($_POST['from_currency']) && isset($_POST['to_currency']))
        {
            $this->class_amount = $_POST['currency_amount'];
            $this->class_from_currency = $_POST['from_currency'];
            $this->class_to_currency = $_POST['to_currency'];
        }
    }

    private function kurstWalutaPln($waluta)
    {
        if (!$_SESSION['currency_db'])
        {
            switch ($waluta)
            {
                case 'USD':
                {
                    return 4.00;
                }
                case 'EUR':
                {
                    return 4.40;
                }
                default:
                {
                    return 1;
                }
            }
        }

        $con = mysqli_connect('localhost', 'root', '', 'currency_db');
        $sql = 'SELECT exchange_rate FROM currencies WHERE currency = '."\"$waluta\"";
        $result = mysqli_query($con, $sql);

        return floatval(implode(mysqli_fetch_all($result)[0]));
    }

    private function kurstPlnWaluta($waluta)
    {
        switch ($waluta)
        {
            case 'USD':
            {
                return 0.25;
            }
            case 'EUR':
            {
                return 0.23;
            }
            default:
            {
                return 1;
            }
        }

        $con = mysqli_connect('localhost', 'root', '', 'currency_db');
        $sql = 'SELECT exchange_rate FROM currencies WHERE currency = '."\"$waluta\"";
        $result = mysqli_query($con, $sql);

        return round(1/floatval(implode(mysqli_fetch_all($result)[0]))*100)/100;
    }

    function calculate()
    {
        $amount = $this->class_amount;
        $from_currency = $this->class_from_currency;
        $to_currency = $this->class_to_currency;

        if ($from_currency == $to_currency)
        {
            echo '<div class="result">';
            echo  getTextInLanguage("Converted_amount", getLanguageCookie(), "Przeliczona kwota").': ' . $amount . ' ' . $from_currency . ' = ' . $amount . ' ' . $to_currency;
            echo '</div>';

            return;
        }

        // Przeliczanie waluty
        $conversion_rates = [
            'PLN-USD' => $this->kurstPlnWaluta('USD'), // Kurs waluty PLN do USD
            'USD-PLN' => $this->kurstWalutaPln('USD'), // Kurs waluty USD do PLN
            'PLN-EUR' => $this->kurstPlnWaluta('EUR'), // Kurs waluty PLN do EUR
            'EUR-PLN' => $this->kurstWalutaPln('EUR'),  // Kurs waluty EUR do PLN
            'EUR-USD' => round($this->kurstWalutaPln('EUR')/$this->kurstWalutaPln('USD')*100)/100,  // Kurs waluty EUR do USD
            'USD-EUR' => round($this->kurstWalutaPln('USD')/$this->kurstWalutaPln('EUR')*100)/100  // Kurs waluty USD do EUR
        ];

        $currency_pair = $from_currency . '-' . $to_currency;
        $converted_amount = $amount * $conversion_rates[$currency_pair];

        echo '<div class="result">';
        echo 'Przeliczona kwota: ' . $amount . ' ' . $from_currency . ' = ' . $converted_amount . ' ' . $to_currency;
        echo '</div>';
    }
}
