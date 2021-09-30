document.getElementById('chatroom').addEventListener('click', (e) => {
    e.preventDefault();

    var chatroom = document.getElementById('name').value;

    if (chatroom == '') {
        alert("Please enter room name");
    } else {
        fetch("http://localhost/pro/chat/admin/chatroom.php", {
            method: "POST",
            header: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                "data": chatroom
            })
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data);
        }).catch((error) => {
            console.log(error);
        })
    }

})