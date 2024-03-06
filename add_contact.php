<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "root", "", "contacts");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Получение данных из POST запроса
$name = $_POST['name'];
$phone = $_POST['phone'];
$relation = $_POST['relation'];

// Подготовка SQL запроса
$stmt = $mysqli->prepare("INSERT INTO contacts (name, phone, relation) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $phone, $relation);

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
