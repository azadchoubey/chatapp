document.getElementById("chatroom").addEventListener("click", (e) => {
    e.preventDefault();
    var chatroom = document.getElementById("name").value;
    if (chatroom == "") {
        alert("Please enter room name");
    } else {
        fetch("http://localhost/pro/chat/admin/chatroom.php", {
            method: "POST",
            header: {
                "Content-type": "application/json",   
            },
            body: JSON.stringify({
                data: chatroom,
            }),
        }).then((response) => {
                return response.json();
            }).then((data) => {
                if (data.code == 1) {
                    window.location.href = "chat.php";
                } else {
                    alert(data.msg);
                }
            }).catch((error) => {
                console.log(error);
            });
    }
});

