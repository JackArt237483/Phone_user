<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Телефонный справочник</title>

</head>
<body>

<div class="container">
    <h1>Телефонный справочник</h1>
    <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Телефон</th>
                <th>Кем приходится</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody id="contacts-list">
            <!-- Данные будут динамически добавлены с помощью JavaScript -->
        </tbody>
    </table>
    <button class="add-btn" onclick="openForm()">Добавить</button>
</div>

<!-- Диалоговое окно для добавления контакта -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeForm()">&times;</span>
        <h2>Добавить контакт</h2>
        <form id="addContactForm">
            <input type="text" name="name" placeholder="ФИО" required><br><br>
            <input type="text" name="phone" placeholder="Телефон" required><br><br>
            <input type="text" name="relation" placeholder="Кем приходится"><br><br>
            <button type="submit">Добавить</button>
        </form>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
.