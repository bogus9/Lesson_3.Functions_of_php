<?php

//    если поставить Debian с настройками на puphpet в Locale/Timezone в Default Locale - ru_RU.UTF-8, 
//    то я так понял русский текст станет отображаться в браузере корректно
//    в иных случаях - команда для корректного отображения кодировки текста в браузере
//    header("Content-Type: text/html; charset=windows-1251");
    
    error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
    ini_set('display_errors', 1);

    

    
    # -----------
    # Задание 1,2
    # -----------
    # Создайте массив $date с пятью элементами
    # C помощью генератора случайных чисел забейте массив $date юниксовыми метками
    # ---------
    
    // Создаем индексный массив
    $Dates = array();
    
    // Создаем переменные с минимальным и максимальным значением дат для последующей конфигурации созданного массива.
    $min = strtotime('1970-01-01 00:00:00'); 
    $max = strtotime('2030-01-01 00:00:00');
    
    // Создаем в массиве 5 элементов, каждый из которых с помощью ГСЧ забиваем юниксовыми метками.
    for($i=0;$i<5;$i++){$Dates[$i] = rand($min, $max);}
 
    // Проверяем созданный массив
    var_dump($Dates);

    
    
    
    # ---------
    # Задание 3
    # ---------
    # Сделайте вывод сообщения на экран о том, какой день в сгенерированном массиве получился наименьшим, а какой месяц наибольшим
    # ---------
       
    // Определяем новый массив.
    $Days = array();
    
    // Перебираем массив $Dates с заранее подготовленными датами. 
    // Берем из каждого элемента массива $Dates день и помещаем его в массив $Days.
    for ($i = 0; $i < count($Dates); $i++){$Days[$i] = date('d l', $Dates[$i]);}

    // Если в функции date (строка 44) указать символ d с символом l в такой последовательности - 'l d', 
    // то функция min будет сортировать элементы массива $Days по названиям дней l, а не по нумерации d.
    // Выводим минимум из массива $Days.
    echo 'Наименьший день - '.min($Days).'.'.'<br />';

    echo '<br />';
    
    // Определяем новый массив.
    $Months = array();
    
    // Перебираем массив $Dates с заранее подготовленными датами. 
    // Берем из каждого элемента массива $Dates месяц и помещаем его в массив $Months.
    for ($i=0; $i < count($Dates); $i++){$Months[$i] = date('m F', $Dates[$i]);}

    // Если в функции date (строка 58) указать символ m с символом F в такой последовательности - 'F m', 
    // то функция max будет сортировать элементы массива $Months по названиям месяцев F, а не по нумерации m.
    // Выводим максимум из массива $Months.
    echo 'Наибольший месяц - '.max($Months).'.';
    
    
    
    
    # ---------
    # Задание 4
    # ---------
    # Отсортируйте массив по возрастанию дат
    # ---------
    
    // Сортировка дат в возрастающем порядке
    array_multisort($Dates, SORT_ASC);
    
    var_dump($Dates);
    
    
    
    
    # ---------
    # Задание 5
    # ---------
    # С помощью функции для работы с массивами извлеките последний элемент массива в новую переменную $selected
    # ---------
    
    // Извлекаем последний элемент массива $Dates в новую переменную
    $selected = array_slice($Dates, -1, 1);
    
    // Проверяем результат
    var_dump($selected);
    
    
    
        
    # ---------
    # Задание 6
    # ---------
    # C помощью функции date() выведите $selected на экран в формате "дд.мм.ГГ ЧЧ:ММ:СС"
    # ---------
    
    // Выводим элемента массива $selected на экран в заданном формате.
    echo 'Время из массива $selected: '.date('d-m-Y H:i:s', $selected[0]).'<br />';
    
    
    
        
    # ---------
    # Задание 7
    # ---------
    # C помощью функции date() выведите $selected на экран в формате "дд.мм.ГГ ЧЧ:ММ:СС"
    # ---------
    
    // Выставляем часовой пояс Нью-Йорка
    date_default_timezone_set('America/New_York');
    echo '<br />';
    
    // Выводим элемент массива $selected на экран
    echo 'Время из массива $selected: '.date('d-m-Y H:i:s', $selected[0]).'<br />';
    
?>