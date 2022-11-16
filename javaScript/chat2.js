const form = document.querySelector("form"),
inputField = document.querySelector(".input"),
sendBtn = document.querySelector("form button"),
chatBox = document.querySelector(".chat-box") ;

form.onsubmit=(e)=>{
    e.preventDefault(); // preventing form from submitting
 }

chatBox.onmouseenter = ()=>{
  chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");
}

 function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}

sendBtn.onclick= ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/chat.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
          inputField.value= "";
          if(!chatBox.classList.contains("active")){
                 scrollToBottom();
          }
      }
    }
  }  
  let formData= new FormData(form); 
  xhr.send(formData); 
}


setInterval(()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getchat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              chatBox.innerHTML = data;
              if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }  
          }
      }
    }

    // we have to send the form data through ajax to php
    let formData= new FormData(form); // creating new formData Object
    xhr.send(formData); // sending the data ti php
},50000) // this function will run after 500ms


