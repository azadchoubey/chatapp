
document.getElementById('sendmsg').addEventListener('click', (e) =>{
    var msg = document.getElementById('chatmsg').value;
    
    function createFormData(form, key, dataform) {
        if (dataform === Object(dataform) || Array.isArray(dataform)) {
            for (var i in dataform) {
                createFormData(form, key + '[' + i + ']', dataform[i]);
            }
        } else {
            form.append(key, dataform);
        }
    }
    var dataform={"msg":msg,'room':room,'ip':ip};

    var  form=new FormData();
   
    createFormData(form, 'data', dataform);
    if(msg==''){
        document.getElementById('chatmsg').style.border="3px solid red";
    }else{
        fetch("http://localhost/pro/chat/admin/chatroom.php",{
            method: 'POST',
            body:form,
            header: {
                "Content-type": "application/x-www-form-urlencoded",
            },
        }).then((response)=>{
            return response.json();
        }).then((data)=>{
            console.log(data)
        }).catch((error)=>{
            console.log(error);

        })
    }

})