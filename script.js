// Функция для открытия диалогового окна для добавления контакта
function openForm() {
  document.getElementById("addModal").style.display = "block";
}

// Функция для закрытия диалогового окна
function closeForm() {
  document.getElementById("addModal").style.display = "none";
}

// AJAX запрос для добавления контакта
document.getElementById("addContactForm").addEventListener("submit", function(event) {
  event.preventDefault();
  var formData = new FormData(this);
  fetch("add_contact.php", {
      method: "POST",
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          // Если добавление прошло успешно, обновляем список контактов
          loadContacts();
          closeForm();
          // Очистка данных ввода после отправки
          document.getElementById("addContactForm").reset();
      } else {
          alert("Ошибка при добавлении контакта!");
      }
  })
  .catch(error => {
      console.error("Ошибка:", error);
  });
});

// Функция для загрузки списка контактов
function loadContacts() {
  fetch("get_contacts.php")
  .then(response => response.json())
  .then(data => {
      var contactsList = document.getElementById("contacts-list");
      contactsList.innerHTML = "";
      data.forEach(contact => {
          var row = document.createElement("tr");
          row.innerHTML = `
              <td>${contact.name}</td>
              <td>${contact.phone}</td>
              <td>${contact.relation}</td>
              <td>
                  <button onclick="editContact(${contact.id})">Редактировать</button>
                  <button onclick="deleteContact(${contact.id})">Удалить</button>
              </td>
          `;
          contactsList.appendChild(row);
      });
  })
  .catch(error => {
      console.error("Ошибка:", error);
  });
}

// Функция для удаления контакта
function deleteContact(id) {
  fetch("delete_contact.php?id=" + id, {
      method: "DELETE"
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          // Если удаление прошло успешно, обновляем список контактов
          loadContacts();
      } else {
          alert("Ошибка при удалении контакта!");
      }
  })
  .catch(error => {
      console.error("Ошибка:", error);
  });
}

// При загрузке страницы загружаем список контактов
loadContacts();
