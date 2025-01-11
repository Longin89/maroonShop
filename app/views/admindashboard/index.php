<?php $this->start('body'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма ввода данных</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"] {
            width: 200px;
            margin-bottom: 10px;
            padding: 5px;
        }
        #output {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            max-height: 150px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <form id="inputForm">
        <h2>Введите текст:</h2>
        <input type="text" id="textInput" placeholder="Введи текст...">
        <button type="submit">Отправить</button>
    </form>

    <div id="output"></div>

    <script src="script.js"></script>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('inputForm');
    const textInput = document.getElementById('textInput');
    const outputDiv = document.getElementById('output');

    form.addEventListener('keyup', function(e) {
        e.preventDefault();
        
        const inputValue = textInput.value.trim();
        const pElement = document.getElementById('output');

        if (inputValue !== '') {
            pElement.textContent = inputValue;
            
            // Скролл вниз автоматически
            outputDiv.scrollTop = outputDiv.scrollHeight;
        } else {
            pElement.textContent = '';
            alert('Пожалуйста, введите текст.');
        }
    });

    // Дополнительная функция для очистки вывода
    function clearOutput() {
        outputDiv.innerHTML = '';
    }

    // Добавляем кнопку очистки
    const clearBtn = document.createElement('button');
    clearBtn.textContent = 'Очистить';
    clearBtn.onclick = clearOutput;
    outputDiv.appendChild(clearBtn);
});
</script>
<?php $this->end(); ?>