<?php
/**
 * 
 */
function getImageNames() {
  $sql = "SELECT `name_image` FROM `images` WHERE `id`>0";
  getAssocResult($sql);
}

/*
	Функция замены значений в шаблоне по массиву замен variables
	Если массив variables двумерный то замена происходит по дополнительному шаблону
	Например variables:
	[
		"newsfeed"=>[
						"news1"=>"Текст новости 1",
						"news1"=>"Текст новости 1",
						"news1"=>"Текст новости 1"		
					]
	]
	тогда поле {{newsfeed}} будет заменено не просто текстом, а по шаблону из файла
	news_newsfeed_item.tpl имя которого система постоит сама
*/
function pasteValues($variables, $page_name, $templateContent)    {
	//перебираем массив замен
    foreach ($variables as $key => $value) {
		//Если массив двумерный, т.е. не одно значение для подстановки
		//то выполним подстановку через дополнительный шаблон
        if ($value != null) {
            // собираем ключи
            $p_key = '{{' . strtoupper($key) . '}}';

            if(is_array($value)){
                // замена массивом
                $result = "";
                foreach ($value as $value_key => $item){
					//сформируем имя дополнительного шаблона
                    $itemTemplateContent = file_get_contents(TPL_DIR . "/" . $page_name ."_".$key."_item.tpl");
                    
					//выполним замену по дополнительному шаблону
                    foreach($item as $item_key => $item_value){
                        $i_key = '{{' . strtoupper($item_key) . '}}';

                        $itemTemplateContent = str_replace($i_key, $item_value, $itemTemplateContent);
                    }
					//формируем общую строку с шаблоном уже с подставленными значениями
                    $result .= $itemTemplateContent;
                }
            }
            else
				//если подставляется просто значение, его и вернем
                $result = $value;
			//произведем основную замену элементов в шаблоне
            $templateContent = str_replace($p_key, $result, $templateContent);
        }
    }
	//вернем строку с готовым шаблоном со вставленными элементами
    return $templateContent;
}