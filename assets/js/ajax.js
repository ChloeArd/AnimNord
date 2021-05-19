let buttonSend = document.getElementById('buttonSend');
let messagesUser = document.getElementById('messagesUser');

/**
 * My in "messagesUser", all messages enter in DB by registered users.
 */
let xhr = new XMLHttpRequest();
xhr.onload = function () {
    const messages = JSON.parse(xhr.responseText);
    messages.forEach(message => {
        messagesUser.innerHTML += `
        <div id='${message.id}' class='flexColumn messages'>
            <div class='flexRow width_100'>
               <p class='width_30 colorBlue bold'>${message.sender['firstname']}</p>
               <p class='colorGrey'>${message.date}</p>
            </div>
            <p class='text'>${message.message}</p>
        </div>
        `;
    });
}

xhr.open('GET', '/api/messages');
xhr.send();

/**
 * Adding a message to the database.
 */
if (buttonSend) {
    buttonSend.addEventListener('click', function (e) {
        e.preventDefault();
        let inputSender = document.getElementById('inputSender').value;
        let inputRecipient = document.getElementById('inputRecipient').value;
        let inputMessage = document.getElementById('inputMessage').value;
        let dateMessage = document.getElementById('inputDate').value;
        let inputFirstname = document.getElementById('inputFirstname').value;

        if (!inputSender || !inputRecipient || !inputMessage) {
            console.log("All data are not set");
        }
        else {
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                const response = JSON.parse(xhr.responseText);
                if (response.hasOwnProperty('error') && response.hasOwnProperty('message')) {
                    const div = document.createElement('div');
                    div.classList.add('alert', `alert-${response.error}`);
                    div.setAttribute('role', 'alert');
                    div.innerHTML = response.message;
                    document.body.appendChild(div);
                    setInterval(function () {
                        div.style.display = 'none';
                    }, 5000);
                }
            }
            const messageData = {
                'message': inputMessage,
                'date': dateMessage.toLocaleString(),
                'user': inputFirstname,
            }
            xhr.open('POST', '/api/messages');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify(messageData));
        }
        document.getElementById("inputMessage").value = "";
    });
}

if ($("#messagesUser")) {
    charger();
}

// We check if there are no new messages in BDD every 2s, what makes the code dynamic.
function charger() {
    setTimeout(function () {
        let lastIdMessage = $('.messages:first').attr('id'); // We get the last ID
        $.ajax({
            'type': 'GET',
            'url': "/api/charger/index.php?id=" + lastIdMessage, // We pass the last ID to the load file
            'success': function (html) {
                $('#messagesUser').prepend(html); // We add the new message at first
            }
        });
        charger();
    }, 1000);
}