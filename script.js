// Получаем элементы модального окна и изображения внутри него
var modal = document.getElementById("myModal");
var modalImg = document.getElementById("modalImg");

// Функция для открытия модального окна с изображением
function openModal(imgSrc) {
  modal.style.display = "block"; // Показываем модальное окно
  modalImg.src = imgSrc; // Устанавливаем src для изображения в модальном окне
}

// Функция для закрытия модального окна
function closeModal() {
  modal.style.display = "none"; // Скрываем модальное окно
}

// Закрываем модальное окно при клике вне изображения
window.onclick = function (event) {
  if (event.target == modal) {
    closeModal(); // Закрываем модальное окно
  }
};
