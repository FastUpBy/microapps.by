// Глобальная функция для показа ошибки поля
function showFieldError(field) {
  if (!field) return;
  
  field.classList.add('error-shake');
  
  setTimeout(() => {
    field.classList.remove('error-shake');
  }, 2000);
}

// Валидация группы обязательных полей
function validateFields(fields) {
  let isValid = true;
  
  fields.forEach(field => {
    if (!field || !field.value.trim()) {
      showFieldError(field);
      isValid = false;
    }
  });
  
  return isValid;
}
