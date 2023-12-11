document.addEventListener('DOMContentLoaded', function () {
    loadUsers();
    loadMessages();
    // Evento de clic para mostrar/ocultar el panel de chat
    document.getElementById('chatIcon').addEventListener('click', function () {
        document.getElementById('chatPanel').classList.toggle('open');
    });

    let chatIcon = document.getElementById('chatIcon');
    let chatPanel = document.getElementById('chatPanel');
    let closeChat = document.getElementById('closeChat');

    // Evento para mostrar el chat
    chatIcon.addEventListener('click', function() {
        chatPanel.classList.add('open');
        chatIcon.style.display = 'none'; // Ocultar el ícono del chat
    });

    // Evento para cerrar el chat
    closeChat.addEventListener('click', function() {
        chatPanel.classList.remove('open');
        chatIcon.style.display = 'block'; // Mostrar el ícono del chat
    });
});

function loadUsers() {
    fetch('../controller/get_users.php')
        .then(response => response.json())
        .then(users => {
            const userSelect = document.getElementById('userSelect');
            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.textContent = user.name;
                userSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error loading users:', error));
}

function loadMessages() {
    fetch('../controller/get_messages.php')
        .then(response => response.json())
        .then(messages => {
            const messageList = document.getElementById('messageList');
            messageList.innerHTML = '';
            messages.forEach(message => {
                const li = document.createElement('li');
                li.textContent = `${message.sender}: ${message.text}`;
                messageList.appendChild(li);
            });
        })
        .catch(error => console.error('Error loading messages:', error));
}
document.getElementById('sendMessageForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const selectedUser = document.getElementById('userSelect').value;
    const messageText = document.getElementById('messageText').value;

    fetch('../controller/enviar_mensajes.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ recipient: selectedUser, text: messageText })
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('messageText').value = ''; // Limpiar el campo de texto
            loadMessages(); // Recargar los mensajes
        })
        .catch(error => console.error('Error sending message:', error));
});
