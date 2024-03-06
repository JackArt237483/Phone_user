<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "root", "", "contacts");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Подготовка SQL запроса
$result = $mysqli->query("SELECT * FROM contacts");

// Массив для хранения данных контактов
$contacts = array();

// Получение данных из результата запроса
while ($row = $result->fetch_assoc()) {
    $contacts[] = $row;
}

// Возвращаем данные в формате JSON
echo json_encode($contacts);

// Закрытие соединения
$mysqli->close();
?>

