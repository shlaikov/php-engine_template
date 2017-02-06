<?php

class Engine {

    private $_page_file = null;
    private $_error = null;

    public function __construct() {
        if (isset($_GET["page"])) {

            $this->_page_file = $_GET["page"]; 

            $this->_page_file = str_replace(".", null, $_GET["page"]);
            $this->_page_file = str_replace("/", null, $_GET["page"]);
            $this->_page_file = str_replace("", null, $_GET["page"]);

            if (!file_exists("templates/" . $this->_page_file . ".php")) {
                $this->_setError("Шаблон не найден");
                $this->_page_file = "main";
            }
        }
        else $this->_page_file = "main";
    }
    /**
     * Записывает ошибку в переменную _error
     * @param string $error - текст ошибки
     */
    private function _setError($error) {
        $this->_error = $error;
    }
    /**
     * Возвращает текст ошибки
     */
    public function getError() {
        return $this->_error;
    }
    /**
     * Возвращает текст открытой страницы
     */
    public function getContentPage() {
        return file_get_contents("templates/" . $this->_page_file . ".php");
    }
    /**
     * Возвращает тег заголовок открытой страницы
     * @return string 
     */
    public function getTitle() {
        switch ($this->_page_file) {
            case "main":
                return 'Главная';
                break;
            default:
                break;
        }
    }

}
?>