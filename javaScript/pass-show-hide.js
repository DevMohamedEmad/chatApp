const pswfield = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");
toggleBtn.onclick = ()=>{
    if(pswfield.type == "password"){
        pswfield.type ="text";
        toggleBtn.classList.add("active");
    }else{
        pswfield.type ="password";
        toggleBtn.classList.remove("active");
    }
}
