<?php

namespace App\Helpers;

class ViewHelper
{
    /**
     * Dictionary for translation of database data to the view
     *
     * @var array
     */
    private array $dictionary = [
        'name' => 'имя',
        'surname' => 'фамилия',
        'street' => 'улица',
        'city' => 'город',
        'zipcode' => 'почтовый индекс',
        'phone' => 'телефон',

        'ins_number' => 'номер страховки',
        'ins_cat' => 'вид страхования',
        'startdate' => 'действителен с',
        'enddate'    => 'действителен до',
        'ins_status' => 'статус',

        'event_num' => 'номер страхового случая',
        'event_date' => 'Дата создания',
        'status' => 'статус',

        'pay_ammount' => 'страховой взнос',
        'pay_until' => 'действителен до' ,
        'pay_via' => 'способ оплаты',
        'frequency' => 'периодичность взноса',
        'pay_to' => 'платеж на счет №.',
        'pay_status' => 'статус платежа',

        'amount' => 'сумма к оплате',
        'payuntil' => 'платить до',
        'freq' => 'частота платежей',

    ];

    /**
     * Translate data passed from the controller to the view according to the $dictionary
     * Get column names of database data in a view
     * Return translated values
     *
     * @param array $userData data passed to View from Controller
     * @return array
     */
    public function translate($userData)
    {
        $dataColumns = $this->getColumnNames($userData);
    
        $translated = [];

        foreach ($dataColumns as $word) {
            $wordFromDictionary = strtr($word, $this->dictionary);
            array_push($translated, $wordFromDictionary);
        }
        return $translated;
    }


    /**
     * Get column names from array of user data and turn them into a single array of unique values
     * Check for multiple nesting of array data
     * Iterrate over multidimensional array to remove several layers of nesting and join values into a single array
     * Remove duplicate values
     *
     * @param array $userData
     * @return array $simpleArray
     */
    private function getColumnNames(array $userData)
    {
            $simpleArray = []; 
     
            if (!is_array($userData)) { 
              return $userData; 
            } 
    
            foreach ($userData as $key => $value) { 
              
                if (!is_array($value)) { 
                $key = array_push($simpleArray, $key);
                
                } else {
                $simpleArray = array_merge($simpleArray, $this->getColumnNames($value)); 

                }
            } 

            return array_unique($simpleArray); 
    }
}