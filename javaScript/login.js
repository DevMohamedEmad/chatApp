/*  */
const form = document.querySelector(".form form");
const continueBtn = document.querySelector(".btn input");
const errorText = document.querySelector(".error-txt");

form.onsubmit=(e)=>{
   e.preventDefault(); // preventing form from submitting
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
                            
              if(data == "success"){
                location.href="users.php";

              }else {
                  errorText.textContent=data;
                  errorText.style.display="block";

              }
          }
      }
    }

    // we have to send the form data through ajax to php
    let formData= new FormData(form); // creating new formData Object
    xhr.send(formData); // sending the data ti php
}