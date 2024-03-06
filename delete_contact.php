<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "root", "", "contacts");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Получение ID контакта для удаления из GET запроса
$id = $_GET['id'];

// Подготовка SQL запроса
$stmt = $mysqli->prepare("DELETE FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);

// Выполнение запроса
if ($stmt->execute()) {
    // Если запрос выполнен успешно, возвращаем успешный ответ
    echo json_encode(array("success" => true));
} else {
    // Если произошла ошибка, возвращаем ошибку
    echo json_encode(array("success" => false));
}

// Закрытие соединения
$stmt->close();
$mysqli->close();
?>
